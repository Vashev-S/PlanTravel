<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.resort', 'Resort managment!');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.resort', 'Resort management'),
    'url'   => ['/plantravel/ResortBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Country management'),
    'url'   => ['/plantravel/CountryBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'City management'),
    'url'   => ['/plantravel/CityBackend/index']
  ],
];
?>
<div class="page-header">
  <h1>
    <?php echo Yii::t('PlantravelModule.resort', 'Resort'); ?>
    <small><?php echo Yii::t('PlantravelModule.resort', 'management'); ?></small>
  </h1>
</div>

<?php $this->widget(
  'yupe\widgets\CustomGridView',
  [
    'id'           => 'plantravel-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
      'id', 'name',
      [
        'name' => 'country_id',
        'type' => 'raw',
        'value' => '$data->country->name',
        'filter' => CHtml::listData(Country::model()->findAll(), 'id', 'name')
      ],
      [
        'class' => 'yupe\widgets\CustomButtonColumn'
      ],
    ],
  ]
); ?>
