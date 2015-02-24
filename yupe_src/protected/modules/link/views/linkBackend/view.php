<?php
/* @var $model Link */
$this->breadcrumbs = [
    Yii::t('LinkModule.link', 'Cсылки') => ['/link/linkBackend/index'],
    $model->code,
];

$this->pageTitle = Yii::t('LinkModule.link', 'Ссылки - просмотр');

$this->menu = [
    ['icon' => 'glyphicon glyphicon-list-alt', 'label' => Yii::t('LinkModule.link', 'Управление ссылками'), 'url' => ['/link/linkBackend/index']],
    ['icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('LinkModule.link', 'Добавить ссылку'), 'url' => ['/link/linkBackend/create']],
    ['label' => Yii::t('LinkModule.link', 'Ссылка') . ' «' . mb_substr($model->code, 0, 32) . '»'],
    [
        'icon' => 'glyphicon glyphicon-pencil',
        'label' => Yii::t('LinkModule.link', 'Редактирование ссылки'),
        'url' => [
            '/link/linkBackend/update',
            'id' => $model->id
        ]
    ],
    [
        'icon' => 'glyphicon glyphicon-eye-open',
        'label' => Yii::t('LinkModule.link', 'Просмотреть ссылку'),
        'url' => [
            '/link/linkBackend/view',
            'id' => $model->id
        ]
    ],
    [
        'icon' => 'glyphicon glyphicon-trash',
        'label' => Yii::t('LinkModule.link', 'Удалить ссылку'),
        'url' => '#',
        'linkOptions' => [
            'submit' => ['/link/linkBackend/delete', 'id' => $model->id],
            'confirm' => Yii::t('LinkModule.link', 'Вы уверены, что хотите удалить ссылку?'),
            'params' => [Yii::app()->getRequest()->csrfTokenName => Yii::app()->getRequest()->csrfToken],
            'csrf' => true,
        ]
    ],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('LinkModule.link', 'Просмотр') . ' ' . Yii::t('LinkModule.link', 'ссылки'); ?><br/>
        <small>&laquo;<?php echo $model->code; ?>&raquo;</small>
    </h1>
</div>

<?php $this->widget(
    'bootstrap.widgets.TbDetailView',
    [
        'data' => $model,
        'attributes' => [
            'id',
            'url',
            'code',
            'data_url',
            'data',
            [
                'name' => 'type',
                'value' => $model->getTypeTitle(),
            ],
        ],
    ]
); ?>
