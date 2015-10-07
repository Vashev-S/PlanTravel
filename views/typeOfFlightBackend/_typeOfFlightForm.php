<?php
$form = $this->beginWidget(
  'bootstrap.widgets.TbActiveForm',
  [
    'id'                     => 'typeOfFlight-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
    'type'                   => 'vertical',
    'htmlOptions'            => ['class' => 'well', 'enctype' => 'multipart/form-data'],
  ]
); ?>
<div class="alert alert-info">
  <?php echo Yii::t('plantravelModule.plantravel', 'Fields with'); ?>
  <span class="required">*</span>
  <?php echo Yii::t('plantravelModule.plantravel', 'are required'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'name'); ?>
  </div>
</div>

<br/>

<?php $this->widget(
  'bootstrap.widgets.TbButton',
  [
    'buttonType' => 'submit',
    'context'    => 'primary',
    'label'      => $model->isNewRecord ? Yii::t('plantravelModule.country', 'Create and continue') : Yii::t(
      'plantravelModule.country',
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
