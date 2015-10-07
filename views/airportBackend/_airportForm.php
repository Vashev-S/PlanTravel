<script type='text/javascript'>
  $(document).ready(function () {
    $('#menu_id').change(function () {
      $('.cityOfCountry')
        .find('option')
        .remove()
        .end();
      var countryId = parseInt($(this).val());
      if (countryId) {
        $.post('<?php echo Yii::app()->createUrl('/plantravel/cityBackend/Getjsonitems/') ?>', {
          '<?php echo Yii::app()->getRequest()->csrfTokenName;?>': '<?php echo Yii::app()->getRequest()->csrfToken;?>',
          'countryId': countryId
        }, function (response) {
          if (response.result) {
            var option = false;
            var current = <?php echo (int) 0; ?>;
            $.each(response.data, function (index, element) {
              if (index == current) {
                option = true;
              } else {
                option = false;
              }
              $('#Airport_city_id').append(new Option(element, index, option));
            })
            if (current) {
              $('#Airport_city_id').val(current);
            }
            $('#Airport_city_id').removeAttr('disabled');
            $('#pareData').show();
          }
        });
      }
    });

    if ($('#menu_id').val() > 0) {
      $('#menu_id').trigger('change');
    }
  })
</script>


<?php
$form = $this->beginWidget(
  'bootstrap.widgets.TbActiveForm',
  [
    'id'                     => 'airport-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
    'type'                   => 'vertical',
    'htmlOptions'            => ['class' => 'well', 'enctype' => 'multipart/form-data'],
  ]
); ?>
<div class="alert alert-info">
  <?php echo Yii::t('PlantravelModule.airport', 'Fields with'); ?>
  <span class="required">*</span>
  <?php echo Yii::t('PlantravelModule.airport', 'are required'); ?>
</div>

<?php echo $form->errorSummary($model); ?>

<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'name'); ?>
  </div>
</div>

<div class="row">
  <div class="col-sm-7">
    <?php echo $form->textFieldGroup($model, 'code'); ?>
  </div>
</div>

<!--!!!!!!!!!!!-->
<div class="row">
  <div class="col-sm-3">
    <div class="form-group">
      <?php echo CHtml::label(Yii::t('PlantravelModule.airport', 'Country'), 'country_id'); ?>
      <?php echo CHtml::dropDownList(
        'menu_id',
        0,
        CHtml::listData(Country::model()->findAll(['order' => 'name DESC']), 'id', 'name'),
        ['empty' => Yii::t('PlantravelModule.airport', '-choose-'), 'class' => 'form-control']
      ); ?>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="form-group cityOfCountry">
      <div id="pareData" style='display:none;'>
        <?php echo $form->labelEx($model, 'city_id'); ?>
        <?php echo CHtml::activeDropDownList(
          $model,
          'city_id',
          ['0' => Yii::t('PlantravelModule.airport', 'Root')],
          [
            'disabled' => true,
            'empty'    => Yii::t('PlantravelModule.airport', '-choose-'),
            'class'    => 'form-control'
          ]
        ); ?>
      </div>
    </div>
  </div>
</div>
<!--!!!!!!!!-->

<!--<div class="row">
  <div class="col-sm-4">
    <?php /*echo $form->labelEx($model, 'city_id'); */?>
    <?php /*$this->widget(
      'bootstrap.widgets.TbSelect2',
      [
        'model' => $model,
        'attribute' => 'city_id',
        'data' => CHtml::listData(City::model()->findAll(), 'id', 'name'),
        'options' => [
          'placeholder' => Yii::t("PlantravelModule.city", 'City'),
          'width' => '100%',
          'allowClear' => false,
        ]
      ]
    );*/?>
  </div>
</div>-->

<br/>

<?php $this->widget(
  'bootstrap.widgets.TbButton',
  [
    'buttonType' => 'submit',
    'context'    => 'primary',
    'label'      => $model->isNewRecord ? Yii::t('plantravelModule.airport', 'Create airport and continue') : Yii::t(
      'plantravelModule.airport',
      'Save change and continue'
    ),
  ]
); ?>

<?php $this->widget(
  'bootstrap.widgets.TbButton',
  [
    'buttonType'  => 'submit',
    'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
    'label'       => $model->isNewRecord ? Yii::t('planTravelModule.airport', 'Create and close') : Yii::t(
      'planTravelModule.airport',
      'Save change and close'
    ),
  ]
); ?>

<?php $this->endWidget(); ?>
