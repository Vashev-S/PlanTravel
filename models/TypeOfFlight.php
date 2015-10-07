<?php

/**
 * @property integer $id
 * @property string $country_name
 * @property string $description
 */
class TypeOfFlight extends yupe\models\YModel
{
  const STATUS_ACTIVE = 1;
  const STATUS_NOT_ACTIVE = 0;

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return '{{pt_typeOfFlight}}';
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
      ['name', 'required'],
      ['name', 'unique'],
      ['id', 'numerical', 'integerOnly' => true],
      ['name', 'length', 'max' => 45],
      ['id, name', 'safe', 'on' => 'search'],
    ];
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('PlanTravelModule.plantravel', 'ID'),
      'name' => Yii::t('PlanTravelModule.plantravel', 'Тип рейса')
    ];
  }

  public function search()
  {
    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('name', $this->name, true);

    return new CActiveDataProvider(
      $this, [
        'criteria' => $criteria,
        'sort' => ['defaultOrder' => 't.id']
      ]
    );
  }
}
