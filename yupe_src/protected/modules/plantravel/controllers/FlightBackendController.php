<?php

/**
 *
 */
class FlightBackendController extends yupe\components\controllers\BackController
{
  public function accessRules()
  {
    return [
      ['allow', 'roles' => ['admin']],
      ['allow', 'actions' => ['create'], 'roles' => ['travel.airportBackend.Create']],
      ['allow', 'actions' => ['delete'], 'roles' => ['travel.airportBackend.Delete']],
      ['allow', 'actions' => ['index'], 'roles' => ['travel.airportBackend.Index']],
      ['allow', 'actions' => ['inline'], 'roles' => ['travel.airportBackend.Update']],
      ['allow', 'actions' => ['update'], 'roles' => ['travel.airportBackend.Update']],
      ['allow', 'actions' => ['view'], 'roles' => ['travel.airportBackend.View']],
      ['deny']
    ];
  }

  public function actions()
  {
    return [
      'inline' => [
        'class'           => 'yupe\components\actions\YInLineEditAction',
        'model'           => 'Flight',
        'validAttributes' => ['id', 'name', 'price_adult', 'price_child', 'start', 'finish', 'available_from', 'available_to', 'from_point', 'to_point', 'flight_type']
      ]
    ];
  }

  /**
   * Displays a particular model.
   *
   * @param integer $id the ID of the model to be displayed
   *
   * @return void
   */
  public function actionView($id)
  {
    $this->render('flight', ['model' => $this->loadModel($id)]);
  }

  /**
   * Creates a new model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   *
   * @return void
   */
  public function actionCreate()
  {
    $model = new Flight();

    if (($data = Yii::app()->getRequest()->getPost('Flight')) !== null) {

      $model->setAttributes($data);

      if ($model->save()) {

        Yii::app()->user->setFlash(
          yupe\widgets\YFlashMessages::SUCCESS_MESSAGE, 'Перелет добавлен'
        );

        $this->redirect(
          (array)Yii::app()->getRequest()->getPost(
            'submit-type',
            ['create']
          )
        );
      }
    }

    $this->render('create', ['model' => $model]);
  }

  /**
   * Updates a particular model.
   * If update is successful, the browser will be redirected to the 'view' page.
   *
   * @param null $alias
   * @param integer $id the ID of the model to be updated
   *
   * @throws CHttpException
   *
   * @return void
   */
  public function actionUpdate($id)
  {
    $model = $this->loadModel($id);

    if (($data = Yii::app()->getRequest()->getPost('Flight')) !== null) {

      $model->setAttributes($data);

      if ($model->save()) {

        Yii::app()->user->setFlash(
          yupe\widgets\YFlashMessages::SUCCESS_MESSAGE, 'Изменения сохранены'
        );

        $this->redirect(
          Yii::app()->getRequest()->getIsPostRequest()
            ? (array)Yii::app()->getRequest()->getPost(
            'submit-type',
            ['update', 'id' => $model->id]
          )
            : ['view', 'id' => $model->id]
        );
      }
    }

    $this->render('update', ['model'=> $model]);
  }

  /**
   * Deletes a particular model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   *
   * @param null $alias
   * @param integer $id the ID of the model to be deleted
   *
   * @throws CHttpException
   *
   * @return void
   */
  public function actionDelete($id = null)
  {
    if (Yii::app()->getRequest()->getIsPostRequest()) {

      $this->loadModel($id)->delete();

      Yii::app()->user->setFlash(
        yupe\widgets\YFlashMessages::SUCCESS_MESSAGE,
        Yii::t('PlantravelModule.flight', 'Record was removed!')
      );

      // если это AJAX запрос ( кликнули удаление в админском grid view), мы не должны никуда редиректить
      Yii::app()->getRequest()->getParam('ajax') !== null || $this->redirect(
        (array)Yii::app()->getRequest()->getPost('returnUrl', 'index')
      );
    } else {
      throw new CHttpException(
        400,
        Yii::t('PlantravelModule.flight', 'Bad raquest. Please don\'t use similar requests anymore!')
      );
    }
  }

  /**
   * Manages all models.
   *
   * @return void
   */
  public function actionIndex()
  {
    $model = new Flight('search');

    $model->unsetAttributes(); // clear any default values
    if (isset($_GET['Flight'])) {
      $model->attributes = $_GET['Flight'];
    }
    $this->render('index', ['model' => $model]);
  }

  /**
   * Returns the data model based on the primary key given in the GET variable.
   * If the data model is not found, an HTTP exception will be raised.
   *
   * @param integer the ID of the model to be loaded
   *
   * @return void
   *
   * @throws CHttpException If record not found
   */
  public function loadModel($id)
  {
    if (($model = Flight::model()->findByPk($id)) === null) {
      throw new CHttpException(
        404,
        Yii::t('PlantravelModule.flight', 'Requested page was not found!')
      );
    }

    return $model;
  }
}
