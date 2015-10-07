<?php
/* @var $this DefaultController */
  $this->breadcrumbs = [
  Yii::t('plantravelModule.country', 'TypeOfFlight') => ['/plantravel/TypeOfFlightBackend/index'],
  Yii::t('plantravelModule.country', 'Create'),
  ];

  $this->pageTitle = Yii::t('plantravelModule.plantravel', 'Create');

  $this->menu = [
  [
  'icon'  => 'fa fa-fw fa-list-alt',
  'label' => Yii::t('plantravelModule.plantravel', 'TypeOfFlight management'),
  'url'   => ['/plantravel/TypeOfFlightBackend/index']
  ]
  ];
  ?>
  <div class="page-header">
    <h1>
      <?php echo Yii::t('plantravelModule.plantravel', 'TypeOfFlight'); ?>
      <small><?php echo Yii::t('plantravelModule.plantravel', 'Create'); ?></small>
    </h1>
  </div>
<?php echo $this->renderPartial(
  '_typeOfFlightForm',
  ['model' => $model]
); ?>