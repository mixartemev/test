<?php

namespace app\modules\object\controllers;

use Yii;
use app\modules\object\models\ObjectPropertyVal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjectPropertyValController implements the CRUD actions for ObjectPropertyVal model.
 */
class ObjectPropertyValController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ObjectPropertyVal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ObjectPropertyVal::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjectPropertyVal model.
     * @param integer $object_id
     * @param integer $property_id
     * @return mixed
     */
    public function actionView($object_id, $property_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($object_id, $property_id),
        ]);
    }

    /**
     * Creates a new ObjectPropertyVal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param $object_id
     * @param $property_id
     * @return mixed
     */
    public function actionCreate($object_id, $property_id)
    {
        $model = new ObjectPropertyVal(['object_id' => $object_id, 'property_id' => $property_id]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['object/view', 'id' => $model->object_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjectPropertyVal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $object_id
     * @param integer $property_id
     * @return mixed
     */
    public function actionUpdate($object_id, $property_id)
    {
        $model = $this->findModel($object_id, $property_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['object/view', 'id' => $model->object_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ObjectPropertyVal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $object_id
     * @param integer $property_id
     * @return mixed
     */
    public function actionDelete($object_id, $property_id)
    {
        $this->findModel($object_id, $property_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ObjectPropertyVal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $object_id
     * @param integer $property_id
     * @return ObjectPropertyVal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($object_id, $property_id)
    {
        if (($model = ObjectPropertyVal::findOne(['object_id' => $object_id, 'property_id' => $property_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
