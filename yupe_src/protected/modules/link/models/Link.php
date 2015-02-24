<?php
/**
 * @property integer $id
 * @property string $url
 * @property string $code
 * @property string $data
 * @property string $data_url
 * @property integer $type
 *
 * @property LinkHistory[] $visits
 * @property integer $uniquecount
 */
class Link extends yupe\models\YModel
{
    const TYPE_REDIRECT = 0;
    const TYPE_GET = 1;
    const TYPE_POST = 2;
    const TYPE_COOKIE = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{link_links}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['url', 'required'],
            ['url', 'url'],
            ['data' , 'filter',
                'filter' => 'trim'],
            ['url, data_url, code', 'length', 'max' => 255],
            ['type', 'in', 'range' => array_keys($this->getTypeList())],
            ['code', 'unique'],
            ['id, url, code, type, data, data_url', 'safe', 'on' => 'search'],
        ];
    }

    public function relations()
    {
        return [
            'visits' => [self::HAS_MANY, 'LinkHistory', 'link_id', 'order' => 'visits.visit DESC'],
        ];
    }

    public function scopes()
    {
        return [

        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('LinkModule.link', 'ID'),
            'url' => Yii::t('LinkModule.link', 'Ссылка'),
            'code' => Yii::t('LinkModule.link', 'Код'),
            'data' => Yii::t('LinkModule.link', 'Данные'),
            'data_url' => Yii::t('LinkModule.link', 'URL для данных'),
            'type' => Yii::t('LinkModule.link', 'Тип'),
        ];
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('url', $this->url, true);
        $criteria->compare('code', $this->code, true);
        $criteria->compare('data', $this->data, true);
        $criteria->compare('data_url', $this->data_url, true);
        $criteria->compare('type', $this->type);

        return new CActiveDataProvider(
            $this, [
                'criteria' => $criteria,
            ]
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Link - the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function afterFind()
    {
        parent::afterFind();
    }

    public function beforeSave()
    {
        if($this->code==null)
        {
            while($this->getLinkByCode($code=Hash36::encode(rand(100000,999999))));
            $this->code=$code;
        }
        return parent::beforeSave();
    }

    public function getTypeList()
    {
        return [
            self::TYPE_GET => Yii::t("LinkModule.link", 'GET'),
            self::TYPE_POST => Yii::t("LinkModule.link", 'POST'),
            self::TYPE_REDIRECT => Yii::t("LinkModule.link", 'REDIRECT'),
            self::TYPE_COOKIE => Yii::t("LinkModule.link", 'COOKIE'),
        ];
    }

    public function getTypeTitle()
    {
        $data = $this->getTypeList();
        return isset($data[$this->type]) ? $data[$this->type] : Yii::t("LinkModule.link", '*неизвестен*');
    }

    public function getLinkByCode($code)
    {
        return $this->findByAttributes(['code' => $code]);
    }

    public function visit()
    {
        $visit=new LinkHistory();
        $visit->link_id=$this->id;
        $visit->save();
    }

    public function count()
    {
        return LinkHistory::model()->count([
            'condition' => 'link_id=:link_id',
            'params' => [
                ":link_id" => $this->id
            ],
        ]);
    }

    public function uniquecount()
    {
        return LinkHistory::model()->count([
            'condition' => 'link_id=:link_id',
            'select' => 'count(distinct ip)',
            'params' => [
                ":link_id" => $this->id
            ],
        ]);
    }

    public function reflink()
    {
        if($this->type==Link::TYPE_COOKIE)
        {
            $cookies=json_decode($this->data,true);
            $cookie=array_pop($cookies);
            if($cookie['name']=='ref')
                return $cookie['value'];
        }
        return false;
    }

}
