<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class City extends yupe\models\YModel
{
  const STATUS_ACTIVE = 1;
  const STATUS_NOT_ACTIVE = 0;

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return '{{pt_city}}';
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
      ['name', 'length', 'max' => 127],
      ['id', 'numerical', 'integerOnly' => true],
      ['country_id', 'numerical', 'integerOnly' => true],
      ['country_id', 'required'],
    ];
  }

  /**
   * @return array
   */
  public function relations()
  {
    return array(
      'country'=>array(self::BELONGS_TO, 'Country', 'country_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('PlanTravelModule.plantravel', 'ID'),
      'name' => Yii::t('PlanTravelModule.plantravel', 'Название города'),
      'country_id' => Yii::t('PlanTravelModule.plantravel', 'Cтрана'),
    ];
  }

  public function search()
  {
    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('name', $this->name, true);
    $criteria->compare('country_id', $this->country_id, true);

    return new CActiveDataProvider(
      $this, [
        'criteria' => $criteria,
        'sort' => ['defaultOrder' => 't.id']
      ]
    );
  }
}
