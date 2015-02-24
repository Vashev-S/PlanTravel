<?php

use yupe\components\WebModule;

class LinkModule extends WebModule
{
    const VERSION = '0.1';

    public function getDependencies()
    {
        return [];
    }

    public function getEditableParams()
    {
        return [];
    }

    public function getNavigation()
    {
        return [
            ['icon' => 'glyphicon glyphicon-list-alt', 'label' => Yii::t('LinkModule.link', 'Список ссылок'), 'url' => ['/link/linkBackend/index']],
            ['icon' => 'glyphicon glyphicon-plus-sign', 'label' => Yii::t('LinkModule.link', 'Добавить ссылку'), 'url' => ['/link/linkBackend/create']],

        ];
    }

    public function getAdminPageLink()
    {
        return '/link/linkBackend/index';
    }

    public function getVersion()
    {
        return self::VERSION;
    }

    public function getCategory()
    {
        return Yii::t('LinkModule.link', 'Сервисы');
    }

    public function getName()
    {
        return Yii::t('LinkModule.link', 'Ссылки');
    }

    public function getDescription()
    {
        return Yii::t('LinkModule.link', 'Создание ссылок');
    }

    public function getAuthor()
    {
        return Yii::t('LinkModule.link', 'Zmiulan');
    }

    public function getAuthorEmail()
    {
        return Yii::t('LinkModule.link', 'info@yohanga.biz');
    }

    public function getIcon()
    {
        return 'fa fa-fw fa-link';
    }

    public function init()
    {
        parent::init();

        $this->setImport(
            [
                'link.models.*',
            ]
        );
    }

    public function getAuthItems()
    {
        return [
            [
                'type' => AuthItem::TYPE_TASK,
                'name' => 'Link.LinkBackend.Management',
                'description' => Yii::t("LinkModule.link", 'Управление ссылками'),
                'items' => [
                    ['type' => AuthItem::TYPE_OPERATION, 'name' => 'Link.LinkBackend.Index', 'description' => Yii::t("LinkModule.link", 'Просмотр списка ссылок'),],
                    ['type' => AuthItem::TYPE_OPERATION, 'name' => 'Link.LinkBackend.Create', 'description' => Yii::t("LinkModule.link", 'Создание ссылки'),],
                    ['type' => AuthItem::TYPE_OPERATION, 'name' => 'Link.LinkBackend.Update', 'description' => Yii::t("LinkModule.link", 'Редактирование ссылки'),],
                    ['type' => AuthItem::TYPE_OPERATION, 'name' => 'Link.LinkBackend.View', 'description' => Yii::t("LinkModule.link", 'Просмотр ссылки'),],
                    ['type' => AuthItem::TYPE_OPERATION, 'name' => 'Link.LinkBackend.Delete', 'description' => Yii::t("LinkModule.link", 'Удаление ссылки'),],
                ],
            ],
        ];
    }
}
