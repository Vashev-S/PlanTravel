<?php
/* @var $this DefaultController */
  $this->breadcrumbs = [
  Yii::t('plantravelModule.country', 'City') => ['/plantravel/CityBackend/index'],
  Yii::t('plantravelModule.country', 'Create'),
  ];

  $this->pageTitle = Yii::t('plantravelModule.city', 'Create');

  $this->menu = [
  [
  'icon'  => 'fa fa-fw fa-list-alt',
  'label' => Yii::t('plantravelModule.city', 'Management'),
  'url'   => ['/plantravel/CityBackend/index']
  ],
  [
  'icon'  => 'fa fa-fw fa-plus-square',
  'label' => Yii::t('plantravelModule.country', 'Create'),
  'url'   => ['/plantravel/CityBackend/create']
  ],
  ];
  ?>
  <div class="page-header">
    <h1>
      <?php echo Yii::t('plantravelModule.country', 'country'); ?>
      <small><?php echo Yii::t('plantravelModule.country', 'Create'); ?></small>
    </h1>
  </div>
<?php echo $this->renderPartial(
  '_cityForm',
  ['model' => $model]
); ?>