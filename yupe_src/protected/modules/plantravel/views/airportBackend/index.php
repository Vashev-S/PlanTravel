<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.Airport', 'DATIS_Airport!');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.plantravel', 'Airport management'),
    'url'   => ['/plantravel/AirportBackend/index']
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
    <?php echo Yii::t('PlantravelModule.airport', 'Plantravel'); ?>
    <small><?php echo Yii::t('PlantravelModule.airport', 'Airport management'); ?></small>
  </h1>
</div>

<?php $this->widget(
  'yupe\widgets\CustomGridView',
  [
    'id'           => 'plantravel-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
      'id', 'name', 'code',
      [
        'name' => 'city_id',
        'type' => 'raw',
        'value' => '$data->city_airport->name',
        'filter' => CHtml::listData(City::model()->findAll(), 'id', 'name')
      ],
      [
        'class' => 'yupe\widgets\CustomButtonColumn'
      ],
    ],
  ]
); ?>
