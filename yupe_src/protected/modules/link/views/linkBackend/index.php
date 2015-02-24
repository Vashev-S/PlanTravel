<?php
$this->breadcrumbs = [
    Yii::t('LinkModule.link', 'Ссылки') => ['/link/linkBackend/index'],
    Yii::t('LinkModule.link', 'Управление'),
];

$this->pageTitle = Yii::t('LinkModule.link', 'Ссылки - управление');

$this->menu = [
    ['icon' => 'glyphicon glyphicon-list-alt', 'label' => Yii::t('LinkModule.link', 'Управление ссылками'), 'url' => ['/link/linkBackend/index']],
    ['icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('LinkModule.link', 'Добавить ссылку'), 'url' => ['/link/linkBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('LinkModule.link', 'Ссылки'); ?>
        <small><?php echo Yii::t('LinkModule.link', 'управление'); ?></small>
    </h1>
</div>


<?php
$this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id' => 'link-grid',
        'type' => 'condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => [
            [
                'name' => 'code',
                'type' => 'raw',
                'htmlOptions' => ['style'=>'min-width:320px'],
                'value' => 'CHtml::link("http://".$_SERVER["SERVER_NAME"]."/redirect/".$data->code, array("/redirect/".$data->code), ["target"=>"_blank"])',
            ],
            [
                'name' => 'url',
                'type' => 'raw',
                'value' => 'CHtml::link($data->url, $data->url, ["target"=>"_blank"])',
            ],
            [
                'name' => 'data',
                'type' => 'raw',
                'value' => '$data->reflink()?"Реферер: ".$data->reflink():$data->data'
            ],
            [
                'header' => 'Всего переходов',
                'type' => 'raw',
                'value' => '$data->count()'
            ],
            [
                'header' => 'Уникальных переходов',
                'type' => 'raw',
                'value' => '$data->uniquecount()'
            ],
            [
                'class'   => 'yupe\widgets\EditableStatusColumn',
                'name'    => 'type',
                'url'     => $this->createUrl('/link/linkBackend/inline'),
                'source'  => $model->getTypeList(),
                'options' => [
                    Link::TYPE_GET          => ['class' => 'label-primary'],
                    Link::TYPE_POST         => ['class' => 'label-primary'],
                    Link::TYPE_REDIRECT      => ['class' => 'label-info'],
                    Link::TYPE_COOKIE        => ['class' => 'label-success'],
                ],
            ],
            [
                'class' => 'bootstrap.widgets.TbButtonColumn',
                'template'    => '{view}{history}{update}{delete}',
                'buttons'     => [
                    'history'       => [
                        'icon'  => 'glyphicon glyphicon-list-alt',
                        'label' => Yii::t('LinkModule.link', 'История переходов'),
                        'url'   => 'array("/link/linkBackend/update", "id" => $data->id)',
                    ],
                    ],
            ],
        ],
    ]
); ?>
