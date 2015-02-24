<?php

class LinkBackendController extends yupe\components\controllers\BackController
{
    public function accessRules()
    {
        return [
            ['allow', 'roles' => ['admin'],],
            ['allow', 'actions' => ['create'], 'roles' => ['Link.LinkBackend.Create'],],
            ['allow', 'actions' => ['delete'], 'roles' => ['Link.LinkBackend.Delete'],],
            ['allow', 'actions' => ['update'], 'roles' => ['Link.LinkBackend.Update'],],
            ['allow', 'actions' => ['index'], 'roles' => ['Link.LinkBackend.Index'],],
            ['allow', 'actions' => ['view'], 'roles' => ['Link.LinkBackend.View'],],
            ['deny',],
        ];
    }


    public function actions()
    {
        return [
            'inline' => [
                'class'           => 'yupe\components\actions\YInLineEditAction',
                'model'           => 'Link',
                'validAttributes' => ['type']
            ]
        ];
    }

    public function actionView($id)
    {
        $this->render('view', ['model' => $this->loadModel($id)]);
    }

    public function actionCreate()
    {
        $model = new Link();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Link'])) {
            $model->attributes = $_POST['Link'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('LinkModule.link', 'Ссылка добавлена!')
                );

                if (!isset($_POST['submit-type'])) {
                    $this->redirect(['update', 'id' => $model->id]);
                } else {
                    $this->redirect([$_POST['submit-type']]);
                }
            }
        }
        $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Link'])) {
            $model->attributes = $_POST['Link'];

            if ($model->save()) {
                Yii::app()->user->setFlash(
                    yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                    Yii::t('LinkModule.link', 'Ссылка обновлена!')
                );

                if (!isset($_POST['submit-type'])) {
                    $this->redirect(['update', 'id' => $model->id]);
                } else {
                    $this->redirect([$_POST['submit-type']]);
                }
            }
        }
        $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        if (Yii::app()->getRequest()->getIsPostRequest()) {
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash(
                yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
                Yii::t('LinkModule.link', 'Ссылка удалена!')
            );

            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : ['index']);
            }
        } else {
            throw new CHttpException(400, Yii::t('LinkModule.link', 'Неверный запрос. Пожалуйста, больше не повторяйте такие запросы'));
        }
    }


    public function actionIndex()
    {
        $model = new Link('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Link'])) {
            $model->attributes = $_GET['Link'];
        }
        $this->render('index', ['model' => $model]);
    }


    public function loadModel($id)
    {
        $model = Link::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, Yii::t('LinkModule.link', 'Запрошенная страница не найдена.'));
        }
        return $model;
    }


    protected function performAjaxValidation(Link $model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'link-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
