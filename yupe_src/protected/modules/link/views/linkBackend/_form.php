<ul class="nav nav-tabs">
    <li class="active"><a href="#link" data-toggle="tab"><?php echo Yii::t("LinkModule.link", "Ссылка"); ?></a></li>
    <li><a href="#history" data-toggle="tab"><?php echo Yii::t("LinkModule.link", "История переходов"); ?></a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="link">
        <?php
        /* @var $model Link */
        $form = $this->beginWidget(
            'bootstrap.widgets.TbActiveForm',
            [
                'id' => 'link-form',
                'enableAjaxValidation' => false,
                'enableClientValidation' => true,
                'htmlOptions' => ['class' => 'well'],
            ]
        );
        ?>
        <div class="alert alert-info">
            <?php echo Yii::t('LinkModule.link', 'Поля, отмеченные'); ?>
            <span class="required">*</span>
            <?php echo Yii::t('LinkModule.link', 'обязательны.'); ?>
        </div>

        <div class="row">
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $form->textFieldGroup($model, 'code'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $form->textFieldGroup($model, 'url'); ?>
                    </div>
                </div>

                <div class="row hide">
                    <div class="col-sm-4">
                        <?php echo $form->dropDownListGroup(
                            $model,
                            'type',
                            [
                                'widgetOptions' => [
                                    'data' => $model->getTypeList(),
                                ],
                            ]
                        ); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $form->textAreaGroup($model, 'data',
                            [
                                'widgetOptions' => [
                                    'htmlOptions' => ['rows' => 5],
                                ]
                            ]); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $form->textFieldGroup($model, 'data_url'); ?>
                    </div>
                </div>
            </div>
            <?php
            $type=strtolower($model->getTypeTitle());
            ?>
            <div class="col-sm-4">
                <ul class="nav nav-tabs">
                    <li class="<?=$type=='redirect'?"active":""?>" onclick="$('#Link_type').val('0')"><a href="#redirect" data-toggle="tab">REDIRECT</a></li>
                    <li class="<?=$type=='cookie'?"active":""?>" onclick="$('#Link_type').val('3')"><a href="#cookie" data-toggle="tab">COOKIE</a></li>
                    <li class="<?=$type=='get'?"active":""?>" onclick="$('#Link_type').val('1')"><a href="#get" data-toggle="tab">GET</a></li>
                    <li class="<?=$type=='post'?"active":""?>" onclick="$('#Link_type').val('2')"><a href="#post" data-toggle="tab">POST</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane <?=$type=='redirect'?"active":""?>" id="redirect">
                        Простой редирект по ссылке<br><br>
                    </div>
                    <div class="tab-pane <?=$type=='cookie'?"active":""?>" id="cookie">
                        Добавить куки при переходе<br><br>
                        <?php echo $this->renderPartial('_cookie_baker', ['model' => $model]); ?>
                    </div>
                    <div class="tab-pane <?=$type=='get'?"active":""?>" id="get">GET</div>
                    <div class="tab-pane <?=$type=='post'?"active":""?>" id="post">POST</div>
                </div>
            </div>
        </div>

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            [
                'buttonType' => 'submit',
                'context' => 'primary',
                'label' => Yii::t('LinkModule.link', 'Сохранить и продолжить'),
            ]
        );
        ?>

        <?php $this->widget(
            'bootstrap.widgets.TbButton',
            [
                'buttonType' => 'submit',
                'htmlOptions' => ['name' => 'submit-type', 'value' => 'index'],
                'label' => Yii::t('LinkModule.link', 'Сохранить и вернуться к списку'),
            ]
        );
        ?>

        <?php $this->endWidget(); ?>
    </div>

    <div class="tab-pane panel-body" id="history">
        <?php
        if (!$model->isNewRecord) {
            $history = new LinkHistory('search');
            $history->unsetAttributes();
            $history->link_id = $model->id;
            $this->widget(
                'yupe\widgets\CustomGridView',
                [
                    'id' => 'history-grid',
                    'type' => 'condensed',
                    'dataProvider' => $history->search(),
                    'filter' => $history,
                    'columns' => [
                        'link_code',
                        'link_info',
                        'referrer',
                        'visit',
                        'ip',
                    ],
                ]
            );
        }
        ?>
    </div>
</div>
