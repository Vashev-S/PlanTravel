<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $city_id
 */
class Airport extends yupe\models\YModel
{
  const STATUS_ACTIVE = 1;
  const STATUS_NOT_ACTIVE = 0;

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return '{{pt_airport}}';
  }

  public static function model($className = __CLASS__)
  {
    return parent::model($className);
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules()
  {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return [
      ['name, code, city_id', 'required'],
      ['name, code', 'unique'],
      ['name', 'length', 'max' => 45],
      ['code', 'length', 'max' => 7],
      ['id', 'numerical', 'integerOnly' => true],
      ['city_id', 'numerical', 'integerOnly' => true],
    ];
  }

  /**
   * @return array
   */
  public function relations()
  {
    return array(
      'city_airport'=>array(self::BELONGS_TO, 'City', 'city_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('PlanTravelModule.airport', 'ID'),
      'name' => Yii::t('PlanTravelModule.airport', 'Название аэропорта'),
      'code' => Yii::t('PlanTravelModule.airport', 'Код аэропорта'),
      'city_id' => Yii::t('PlanTravelModule.airport', 'Город базирования'),
    ];
  }

  public function search()
  {
    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('name', $this->name, true);
    $criteria->compare('code', $this->code, true);
    $criteria->compare('city_id', $this->city_id, true);

    return new CActiveDataProvider(
      $this, [
        'criteria' => $criteria,
        'sort' => ['defaultOrder' => 't.id']
      ]
    );
  }
}
