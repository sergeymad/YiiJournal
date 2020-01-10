<?php

namespace app\controllers;

use Yii;
use app\models\Grades;
use app\models\GradesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GradesController implements the CRUD actions for Grades model.
 */
class GradesController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Grades models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GradesSearch();
        if(Yii::$app->user->identity->role_id==1){
            $search = Yii::$app->request->queryParams;
            $search["GradesSearch"]['group_id']=Yii::$app->user->identity->group_id;
        }

        $dataProvider = $searchModel->search( $search);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Grades model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model  = $this->findModel($id);

        $users = (new \yii\db\Query())
            ->select("*")
            ->from('user')->where(["group_id"=>$model["group_id"]])
            ->all();
        return $this->render('view', [
            'users'=>$users,
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Grades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Grades();
        $groups = (new \yii\db\Query())
            ->select("*")
            ->from('groups')
            ->all();
        if(isset(Yii::$app->request->post()['grades'])){
            $data_array = Yii::$app->request->post();


            $data_array['grades']['journal'] =   "{}";
            $data_array['grades']['created_at'] =   "0";
            $data_array['grades']['updated_at'] =   "0";
            $data_array['grades']['disc_id'] =   "0";
            $data_array['grades']['created_by'] =   Yii::$app->user->identity->getId();

            if ($model->load($data_array) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

        }



        return $this->render('create', [
            'model' => $model,
            'groups' => $groups,
        ]);
    }

    /**
     * Updates an existing Grades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $users = (new \yii\db\Query())
            ->select("*")
            ->from('user')->where(["group_id"=>$model["group_id"]])
            ->all();

        if (isset(Yii::$app->request->post()['grades'])) {

            $model->journal=json_encode(Yii::$app->request->post()['grades']);
            $model->save();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        }
        }

        return $this->render('update', [
            'users' => $users,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Grades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Grades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Grades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Grades::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
