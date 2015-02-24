<?php
/* @var $this DefaultController */
  $this->breadcrumbs = [
  Yii::t('plantravelModule.country', 'country') => ['/plantravel/countryBackend/index'],
  Yii::t('plantravelModule.country', 'Create'),
  ];

  $this->pageTitle = Yii::t('plantravelModule.country', 'Create');

  $this->menu = [
  [
  'icon'  => 'fa fa-fw fa-list-alt',
  'label' => Yii::t('plantravelModule.country', 'Management'),
  'url'   => ['/plantravel/countryBackend/index']
  ],
  [
  'icon'  => 'fa fa-fw fa-plus-square',
  'label' => Yii::t('plantravelModule.country', 'Create'),
  'url'   => ['/plantravel/countryBackend/create']
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
  '_countryForm',
  ['model' => $model]
); ?>