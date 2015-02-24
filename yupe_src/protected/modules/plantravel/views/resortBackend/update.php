<?php
/* @var $this DefaultController */
$this->breadcrumbs = [
  Yii::t('plantravelModule.resort', 'Resort') => ['/plantravel/ResortBackend/index'],
  Yii::t('plantravelModule.resort', 'Update'),
];

$this->pageTitle = Yii::t('plantravelModule.resort', 'Resort create');

$this->menu = [
  [
    'icon'  => 'fa fa-fw fa-list-alt',
    'label' => Yii::t('plantravelModule.resort', 'Resort management'),
    'url'   => ['/plantravel/ResortBackend/index']
  ],
  [
    'icon'  => 'fa fa-fw fa-plus-square',
    'label' => Yii::t('plantravelModule.resort', 'Create'),
    'url'   => ['/plantravel/ResortBackend/create']
  ],
];
?>
  <div class="page-header">
    <h1>
      <?php echo Yii::t('plantravelModule.resort', 'Resort'); ?>
      <small><?php echo Yii::t('plantravelModule.resort', 'Update'); ?></small>
    </h1>
  </div>
<?php echo $this->renderPartial(
  '_resortForm',
  ['model' => $model]
); ?>