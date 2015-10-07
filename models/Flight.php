<?php

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 */
class Flight extends yupe\models\YModel
{
  const STATUS_ACTIVE = 1;
  const STATUS_NOT_ACTIVE = 0;

  /**
   * @return string the associated database table name
   */
  public function tableName()
  {
    return '{{pt_flight}}';
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
      ['price_adult, price_child, start, finish, from_port, to_port, flight_type', 'required'],
      ['start, finish', 'type', 'type'=>'time'],
      ['available_from, available_to', 'length', 'max' => 10],
      ['price_adult, price_child', 'type', 'type'=>'float'],
      ['from_port, to_port, flight_type', 'numerical', 'integerOnly' => true]
    ];
  }

  /**
   * @return array
   */
  public function relations()
  {
    return array(
      'fromAirport'=>array(self::BELONGS_TO, 'Airport', 'from_port'),
      'toAirport'=>array(self::BELONGS_TO, 'Airport', 'to_port'),
      'flightType'=>array(self::BELONGS_TO, 'TypeOfFlight', 'flight_type'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels()
  {
    return [
      'id' => Yii::t('PlanTravelModule.plantravel', 'ID'),
      'price_adult' => Yii::t('PlanTravelModule.plantravel', 'Цена за взрослого'),
      'price_child' => Yii::t('PlanTravelModule.plantravel', 'Цена за ребенка'),
      'start' => Yii::t('PlanTravelModule.plantravel', 'Время вылета'),
      'finish' => Yii::t('PlanTravelModule.plantravel', 'Время прилета'),
      'available_from' => Yii::t('PlanTravelModule.plantravel', 'Доступен С'),
      'available_to' => Yii::t('PlanTravelModule.plantravel', 'Доступен ДО'),
      'from_port' => Yii::t('PlanTravelModule.plantravel', 'Вылетает ИЗ'),
      'to_port' => Yii::t('PlanTravelModule.plantravel', 'Прилетает В'),
      'flight_type' => Yii::t('PlanTravelModule.plantravel', 'Тип рейса'),
    ];
  }

  public function search()
  {
    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('price_adult', $this->price_adult, true);
    $criteria->compare('price_child', $this->price_child, true);
    $criteria->compare('start', $this->start, true);
    $criteria->compare('finish', $this->finish, true);
    $criteria->compare('available_from', $this->available_from, true);
    $criteria->compare('available_to', $this->available_to, true);
    $criteria->compare('from_port', $this->from_port, true);
    $criteria->compare('to_port', $this->to_port, true);
    $criteria->compare('flight_type', $this->flight_type, true);

    return new CActiveDataProvider(
      $this, [
        'criteria' => $criteria,
        'sort' => ['defaultOrder' => 't.id']
      ]
    );
  }
  public function beforeValidate()
  {
    if ($this->available_from) {
      $date = strtotime($this->available_from);
      $this->available_from = date("Y-m-d", $date);
    }
    if ($this->available_to) {
      $date = strtotime($this->available_to);
      $this->available_to = date("Y-m-d", $date);
    }
    Yii::log($this->available_to);
    return parent::beforeValidate();
  }
  public function afterFind()
  {
    $date = strtotime($this->available_from);
    $this->available_from = date("d.m.Y", $date);

    $date = strtotime($this->available_to);
    $this->available_to = date("d.m.Y", $date);

    $this->start = substr($this->start, 0, -3);
    $this->finish = substr($this->finish, 0, -3);
    return parent::afterFind();
  }
}
