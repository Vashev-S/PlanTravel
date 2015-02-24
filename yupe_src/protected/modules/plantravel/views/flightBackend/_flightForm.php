<?php
$form = $this->beginWidget(
  'bootstrap.widgets.TbActiveForm',
  [
    'id'                     => 'flight-form',
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
    <?php echo $form->labelEx($model, 'flight_type'); ?>
    <?php $this->widget(
      'bootstrap.widgets.TbSelect2',
      [
        'model' => $model,
        'attribute' => 'flight_type',
        'data' => CHtml::listData(TypeOfFlight::model()->findAll(), 'id', 'name'),
        'options' => [
          'placeholder' => Yii::t("PlantravelModule.flight", 'Flight Type'),
          'width' => '100%',
          'allowClear' => false,
        ]
      ]
    );?>
  </div>
</div>
<!--Price-->
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'price_adult'); ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'price_child'); ?>
  </div>
</div>
<!--Start/Finish-->
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->timePickerGroup(
      $model,
      'start',
      [
        'widgetOptions' => [
          'options' => [
            'showMeridian' => false,
            'autoclose' => true,
          ],
        ],
        'prepend' => '<i class="fa fa-calendar"></i>',
      ]
    );
    ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->timePickerGroup(
      $model,
      'finish',
      [
        'widgetOptions' => [
          'options' => [
            'showMeridian' => false,
            'autoclose' => true,
          ],
        ],
        'prepend' => '<i class="fa fa-calendar"></i>',
      ]
    );
    ?>
  </div>
</div>
<!--Available-->
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->datePickerGroup(
      $model,
      'available_from',
      [
        'widgetOptions' => [
          'options' => [
            'format' => 'dd.mm.yyyy',
            'weekStart' => 1,
            'autoclose' => true,

          ],
        ],
        'prepend' => '<i class="fa fa-calendar"></i>',
      ]
    );
    ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-7">
    <?php echo $form->datePickerGroup(
      $model,
      'available_to',
      [
        'widgetOptions' => [
          'options' => [
            'format' => 'dd.mm.yyyy',
            'weekStart' => 1,
            'autoclose' => true,

          ],
        ],
        'prepend' => '<i class="fa fa-calendar"></i>',
      ]
    );
    ?>
  </div>
</div>


<div class="row">
  <div class="col-sm-4">
    <?php echo $form->labelEx($model, 'from_port'); ?>
    <?php $this->widget(
      'bootstrap.widgets.TbSelect2',
      [
        'model' => $model,
        'attribute' => 'from_port',
        'data' => CHtml::listData(Airport::model()->findAll(), 'id', 'name'),
        'options' => [
          'placeholder' => Yii::t("PlantravelModule.airport", 'From Airport'),
          'width' => '100%',
          'allowClear' => false,
        ]
      ]
    );?>
  </div>
</div>
<div class="row">
  <div class="col-sm-4">
    <?php echo $form->labelEx($model, 'to_port'); ?>
    <?php $this->widget(
      'bootstrap.widgets.TbSelect2',
      [
        'model' => $model,
        'attribute' => 'to_port',
        'data' => CHtml::listData(Airport::model()->findAll(), 'id', 'name'),
        'options' => [
          'placeholder' => Yii::t("PlantravelModule.airport", 'To Airport'),
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
    'label'      => $model->isNewRecord ? Yii::t('plantravelModule.flight', 'Create and continue') : Yii::t(
      'plantravelModule.flight',
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
);
$this->endWidget(); ?>
