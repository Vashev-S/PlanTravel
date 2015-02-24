<?php
/* @var $this DefaultController */
  $this->breadcrumbs = [
  Yii::t('plantravelModule.airport', 'Airport') => ['/plantravel/AirportBackend/index'],
  Yii::t('plantravelModule.airport', 'Create'),
  ];

  $this->pageTitle = Yii::t('plantravelModule.airport', 'Create');

  $this->menu = [
  [
  'icon'  => 'fa fa-fw fa-list-alt',
  'label' => Yii::t('plantravelModule.airport', 'Airport management'),
  'url'   => ['/plantravel/AirportBackend/index']
  ],
  [
  'icon'  => 'fa fa-fw fa-plus-square',
  'label' => Yii::t('plantravelModule.airport', 'Create'),
  'url'   => ['/plantravel/AirportBackend/create']
  ],
  ];
  ?>
  <div class="page-header">
    <h1>
      <?php echo Yii::t('plantravelModule.airport', 'airport'); ?>
      <small><?php echo Yii::t('plantravelModule.airport', 'Create'); ?></small>
    </h1>
  </div>
<?php echo $this->renderPartial(
  '_airportForm',
  ['model' => $model, 'menuParentId' => 0, 'countryId' => 0,]
); ?>