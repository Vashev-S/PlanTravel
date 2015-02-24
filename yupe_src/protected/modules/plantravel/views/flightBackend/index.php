<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.flight', 'Flight Management');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.plantravel', 'Flight management'),
    'url'   => ['/plantravel/FlightBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create Flight'),
    'url'   => ['/plantravel/FlightBackend/create']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create airport'),
    'url'   => ['/plantravel/AirportBackend/create']
  ],
];
?>
<div class="page-header">
  <h1>
    <?php echo Yii::t('PlantravelModule.plantravel', 'Plantravel'); ?>
    <small><?php echo Yii::t('PlantravelModule.plantravel', 'management'); ?></small>
  </h1>
</div>

<?php $this->widget(
  'yupe\widgets\CustomGridView',
  [
    'id'           => 'flight-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
      'price_adult', 'price_child', 'start', 'finish', 'available_from', 'available_to',
      [
        'name' => 'from_port',
        'type' => 'raw',
        'value' => '$data->fromAirport->name',
        'filter' => CHtml::listData(Airport::model()->findAll(), 'id', 'name')
      ],
      [
        'name' => 'to_port',
        'type' => 'raw',
        'value' => '$data->toAirport->name',
        'filter' => CHtml::listData(Airport::model()->findAll(), 'id', 'name')
      ],
      [
        'name' => 'flight_type',
        'type' => 'raw',
        'value' => '$data->flightType->name',
        'filter' => CHtml::listData(TypeOfFlight::model()->findAll(), 'id', 'name')
      ],
      [
        'class' => 'yupe\widgets\CustomButtonColumn'
      ],
    ],
  ]
); ?>
