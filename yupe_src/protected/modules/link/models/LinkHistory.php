<?php
/**
 * @property integer $id
 * @property integer $link_id
 * @property string $link_code
 * @property string $link_info
 * @property string $ip
 * @property string referrer
 * @property string $visit
 *
 * @property Link $link
 */
class LinkHistory extends yupe\models\YModel
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return '{{link_history}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            ['link_id, link_code, ip, visit, referrer', 'safe', 'on' => 'search'],
        ];
    }

    public function relations()
    {
        return [
            'link' => [self::BELONGS_TO, 'Link', 'link_id'],
        ];
    }

    public function behaviors()
    {
        return [
            'CTimestampBehavior' => [
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'visit',
            ],
        ];
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('LinkModule.link', 'ID'),
            'link_id' => Yii::t('LinkModule.link', 'ID ссылки'),
            'link_code' => Yii::t('LinkModule.link', 'Код ссылки'),
            'link_info' => Yii::t('LinkModule.link', 'Данные'),
            'visit' => Yii::t('LinkModule.link', 'Время перехода'),
            'referrer' => Yii::t('LinkModule.link', 'Источник'),
            'ip' => Yii::t('LinkModule.link', 'IP'),
        ];
    }

    public function search()
    {
        $criteria = new CDbCriteria;

        $criteria->compare('link_id', $this->link_id);
        $criteria->compare('link_code', $this->link_code);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('visit', $this->visit, true);
        $criteria->compare('referrer',$this->referrer,true);

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
        $this->link_info=base64_decode($this->link_info);
        parent::afterFind();
    }

    public function beforeSave()
    {
        $this->link_code=$this->link->code;
        $info_array=[
            'type'=>$this->link->type,
            'url'=>$this->link->url,
            'data'=>$this->link->data,
            'data_url'=>$this->link->data_url
        ];
        unset($_GET['code']);
        if(count($_GET))
            $info_array['GET']=$_GET;
        $this->link_info=base64_encode(serialize($info_array));
        $this->ip=Yii::app()->getRequest()->userHostAddress;
        $this->referrer=Yii::app()->getRequest()->getUrlReferrer();
        return parent::beforeSave();
    }

}
