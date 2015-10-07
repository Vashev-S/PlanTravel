<?php
/* @var $this DefaultController */
  $this->breadcrumbs = [
  Yii::t('plantravelModule.country', 'Flight') => ['/plantravel/FlightBackend/index'],
  Yii::t('plantravelModule.country', 'Create'),
  ];

  $this->pageTitle = Yii::t('plantravelModule.plantravel', 'Flight Create');

  $this->menu = [
  [
  'icon'  => 'fa fa-fw fa-list-alt',
  'label' => Yii::t('plantravelModule.plantravel', 'Flight Management'),
  'url'   => ['/plantravel/FlightBackend/index']
  ],
  [
  'icon'  => 'fa fa-fw fa-plus-square',
  'label' => Yii::t('plantravelModule.plantravel', 'Airport Create'),
  'url'   => ['/plantravel/AirportBackend/create']
  ],
  ];
  ?>
  <div class="page-header">
    <h1>
      <?php echo Yii::t('plantravelModule.flight', 'Flight'); ?>
      <small><?php echo Yii::t('plantravelModule.flight', 'Create'); ?></small>
    </h1>
  </div>
<?php echo $this->renderPartial(
  '_flightForm',
  ['model' => $model]
); ?>