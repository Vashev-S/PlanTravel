<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.Country', 'asdasdasdasd!');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.plantravel', 'Plantravel management'),
    'url'   => ['/plantravel/CountryBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create country'),
    'url'   => ['/plantravel/CountryBackend/create']
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
    <?php echo Yii::t('PlantravelModule.plantravel', 'Plantravel'); ?>
    <small><?php echo Yii::t('PlantravelModule.plantravel', 'management'); ?></small>
  </h1>
</div>

<?php $this->widget(
  'yupe\widgets\CustomGridView',
  [
    'id'           => 'country-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
      'id', 'name', 'description',
      [
        'class' => 'yupe\widgets\CustomButtonColumn'
      ],
    ],
  ]
); ?>
