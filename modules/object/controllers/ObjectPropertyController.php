<?php

namespace app\modules\object\controllers;

use Yii;
use app\modules\object\models\ObjectProperty;
use yii\data\ActiveDataProvider;
use yii\db\Migration;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ObjectPropertyController implements the CRUD actions for ObjectProperty model.
 */
class ObjectPropertyController extends Controller
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
     * Lists all ObjectProperty models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ObjectProperty::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ObjectProperty model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ObjectProperty model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int $object_type_id
     * @return mixed
     */
    public function actionCreate($object_type_id)
    {
        $model = new ObjectProperty();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            (new Migration())->insert('object_type_object_property',[ // ToDo пенести в модель
                'object_type_id' => $object_type_id,
                'object_property_id' => $model->id
            ]);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ObjectProperty model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ObjectProperty model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if($this->findModel($id)->delete()){
            (new Migration())->delete('object_type_object_property',[ // ToDo пенести в модель
                //'object_type_id' => $object_type_id, // ToDo добавить условие типа свойства, что бы одно свойтво можно было привязывать к нескольким типам объектов
                'object_property_id' => $this->id
            ]);
        }
        return $this->redirect(['index']);
    }

    /**
     * Finds the ObjectProperty model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ObjectProperty the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ObjectProperty::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
