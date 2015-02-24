<?php
$form = $this->beginWidget(
  'bootstrap.widgets.TbActiveForm',
  [
    'id'                     => 'city-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
    'type'                   => 'vertical',
    'htmlOptions'            => ['class' => 'well', 'enctype' => 'multipart/form-data'],
  ]
); ?>
<div class="alert alert-info">
  <?php echo Yii::t('plantravelModule.city', 'Fields with'); ?>
  <span class="required">*</span>
  <?php echo Yii::t('plantravelModule.city', 'are required'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'name'); ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-4">
    <?php echo $form->labelEx($model, 'country_id'); ?>
    <?php $this->widget(
      'bootstrap.widgets.TbSelect2',
      [
        'model' => $model,
        'attribute' => 'country_id',
        'data' => CHtml::listData(Country::model()->findAll(), 'id', 'name'),
        'options' => [
          'placeholder' => Yii::t("PlantravelModule.country", 'Country'),
          'width' => '100%',
          'allowClear' => false,
        ]
      ]
    );?>
  </div>
</div>

<br/>

<?php $this->widget(
  'bootstrap.widgets.TbButton',
  [
    'buttonType' => 'submit',
    'context'    => 'primary',
    'label'      => $model->isNewRecord ? Yii::t('plantravelModule.city', 'Create country and continue') : Yii::t(
      'plantravelModule.city',
      'Save change and continue'
    ),
  ]
); ?>

<?php $this->widget(
  'bootstrap.widgets.TbButton',
  [
    'buttonType'  => 'submit',
    'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
    'label'       => $model->isNewRecord ? Yii::t('planTravelModule.country', 'Create and close') : Yii::t(
      'planTravelModule.country',
      'Save change and close'
    ),
  ]
); ?>

<?php $this->endWidget(); ?>
