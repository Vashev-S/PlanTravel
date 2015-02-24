<?php
$this->breadcrumbs = [
    Yii::t('LinkModule.link', 'Ссылки') => ['/link/linkBackend/index'],
    Yii::t('LinkModule.link', 'Добавить'),
];

$this->pageTitle = Yii::t('LinkModule.link', 'Ссылки - добавить');

$this->menu = [
    ['icon' => 'glyphicon glyphicon-list-alt', 'label' => Yii::t('LinkModule.link', 'Управление ссылками'), 'url' => ['/link/linkBackend/index']],
    ['icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('LinkModule.link', 'Добавить ссылку'), 'url' => ['/link/linkBackend/create']],
];
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('LinkModule.link', 'Ссылки'); ?>
        <small><?php echo Yii::t('LinkModule.link', 'добавить'); ?></small>
    </h1>
</div>

<?php echo $this->renderPartial('_form', ['model' => $model]); ?>
