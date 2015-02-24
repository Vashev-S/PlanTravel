<?php

/**
 * @var $model Country
 * @var $this CountryBackendController
 */

$this->pageTitle = Yii::t('plantravelModule.TypeOfFlight', 'Type of flight!');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('PlantravelModule.plantravel', 'Type of flight management'),
    'url'   => ['/plantravel/TypeOfFlightBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('PlantravelModule.plantravel', 'Create type of flight'),
    'url'   => ['/plantravel/TypeOfFlightBackend/create']
  ],
];
?>
<div class="page-header">
  <h1>
    <?php echo Yii::t('PlantravelModule.plantravel', 'TypeOfFlight'); ?>
    <small><?php echo Yii::t('PlantravelModule.plantravel', 'Management'); ?></small>
  </h1>
</div>

<?php $this->widget(
  'yupe\widgets\CustomGridView',
  [
    'id'           => 'typeOfFlight-grid',
    'dataProvider' => $model->search(),
    'filter'       => $model,
    'columns'      => [
      'id', 'name',
      [
        'class' => 'yupe\widgets\CustomButtonColumn'
      ],
    ],
  ]
); ?>
