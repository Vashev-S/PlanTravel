<div class="row">
    <div class="col-sm-12">
        <?= CHtml::ajaxButton('Реферальная печенька для заказов!','/link/bake',
            ['type'=>'post',
                'async'=>'false',
                'beforeSend' => 'function (jqXHR, settings ) {
                    swal({
                      title: "Введите ID реферера",
                      html: "<p>Вы можете ввести тут ID пользователя, если он есть в системе или просто текстовую метку<br><br><input id=\"refid\">",
                      showCancelButton: true,
                      cancelButtonText: "Отмена",
                      closeOnConfirm: false
                    },
                    function() {
                        swal.disableButtons();
                        $.ajax({
                            type: "POST",
                            url: "/link/bake",
                            data: { '.Yii::app()->getRequest()->csrfTokenName.':
                                  "'.Yii::app()->getRequest()->csrfToken.'",
                                cookie_value: $("#refid").val(),
                                cookie_name: "ref",
                                 cookie_expire: "86400"},
                            success: function(data, textStatus, jqXHR ){
                                    swal({
                                          title: "Ваша печенька!",
                                          html: "<p style=\'color: red\'>Скопируйте её в поле данные при создании ссылки</p><br><p>"+data["data"]+"</p>",
                                          imageUrl: "'.Yii::app()->getTheme()->getAssetsUrl().'/images/cookie.png",
                                        });
                            }
                        })
                    });
                    return false;
                    }'
            ],
            ['class'=>"btn btn-primary"]);?>
    </div>
</div>
<br>
<br>
<div class="row">
    <div class="col-sm-12">
        <?= CHtml::ajaxButton('Испечь особую печеньку!','/link/bake',
            ['type'=>'post',
                'success'=>'function(data, textStatus, jqXHR ){
                swal({
  title: "Ваша печенька!",
  html: "<p>"+data["data"]+"</p>",
  imageUrl: "'.Yii::app()->getTheme()->getAssetsUrl().'/images/cookie.png",
});
                }'],
            ['class'=>"btn btn-success"]);?>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <?=CHtml::label('Параметр куки','cookie_name'); ?><br>
        <?=CHtml::textField('cookie_name',''); ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?=CHtml::label('Значение куки','cookie_value'); ?><br>
        <?= CHtml::textField('cookie_value',''); ?>
    </div>
</div>
<br>
<?php $collapse = $this->beginWidget('booster.widgets.TbCollapse'); ?>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Дополнительно
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?=CHtml::label('Время истечения (сек)','cookie_expire'); ?><br>
                        <?= CHtml::textField('cookie_expire',''); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?=CHtml::label('Домен куки','cookie_domain'); ?><br>
                        <?= CHtml::textField('cookie_domain',''); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?=CHtml::label('Путь куки','cookie_path'); ?><br>
                        <?= CHtml::textField('cookie_path',''); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>
