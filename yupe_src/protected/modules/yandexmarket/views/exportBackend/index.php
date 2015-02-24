<?php
/* @var $model Export */
$this->breadcrumbs = [
    Yii::t('YandexMarketModule.default', 'Экспорт товаров') => ['/yandexmarket/exportBackend/index'],
    Yii::t('YandexMarketModule.default', 'Управление'),
];

$this->pageTitle = Yii::t('YandexMarketModule.default', 'Экспорт товаров - управление');

$this->menu = [
    ['icon' => 'fa fa-fw fa-list-alt', 'label' => Yii::t('YandexMarketModule.default', 'Управление экспортом'), 'url' => ['/yandexmarket/exportBackend/index']],
    ['icon' => 'fa fa-fw fa-plus-square', 'label' => Yii::t('YandexMarketModule.default', 'Добавить выгрузку'), 'url' => ['/yandexmarket/exportBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('YandexMarketModule.default', 'Выгрузки товаров'); ?>
        <small><?php echo Yii::t('YandexMarketModule.default', 'управление'); ?></small>
    </h1>
</div>

<?php $this->widget(
    'yupe\widgets\CustomGridView',
    [
        'id' => 'export-grid',
        'type' => 'condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => [
            [
                'name' => 'id',
            ],
            [
                'name' => 'name',
                'type' => 'raw',
                'value' => function ($data) {
                    return CHtml::link($data->name, ["/yandexmarket/exportBackend/update", "id" => $data->id]);
                },
            ],
            [
                'header' => 'URL',
                'type' => 'raw',
                'value' => function ($data) {
                    $url = Yii::app()->createAbsoluteUrl('/yandexmarket/export/view', ['id' => $data->id]);
                    return CHtml::link($url, $url);
                }
            ],
            [
                'class' => 'yupe\widgets\CustomButtonColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]
); ?>
