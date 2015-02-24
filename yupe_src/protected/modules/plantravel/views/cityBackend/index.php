<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.City', 'DATISCITY!');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.plantravel', 'Plantravel management'),
    'url'   => ['/plantravel/CountryBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create country'),
    'url'   => ['/plantravel/CityBackend/create']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create city'),
    'url'   => ['/plantravel/CityBackend/create']
  ],
];
?>
<div class="page-header">
  <h1>
    <?php echo Yii::t('PlantravelModule.city', 'Plantravel'); ?>
    <small><?php echo Yii::t('PlantravelModule.city', 'management'); ?></small>
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
