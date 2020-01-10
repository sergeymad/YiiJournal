<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use app\models\User;
use app\models\UsersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii2mod\user\models\UserModel;

/**
 * UsersController implements the CRUD actions for Users model.
 */
class UsersController extends Controller
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
     * Lists all Users models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Users model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Users model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $roles = (new \yii\db\Query())
            ->select("*")
            ->from('roles')
            ->all();
        $groups = (new \yii\db\Query())
            ->select("*")
            ->from('groups')
            ->all();

        $model = new User();

        if(isset(Yii::$app->request->post()['User'])){
            $data_array = Yii::$app->request->post();

            $data_array['User']['auth_key'] =   Yii::$app->getSecurity()->generateRandomString();
            $data_array['User']['password_reset_token'] =   Yii::$app->getSecurity()->generateRandomString() . '_' . time();
            $data_array['User']['status'] =   1;
            $data_array['User']['created_at'] =   0;
            $data_array['User']['updated_at'] =   0;
            $data_array['User']['password_hash']= Yii::$app->getSecurity()->generatePasswordHash($data_array['User']['password_hash']);
            Yii::$app->db->createCommand()->insert('User',   $data_array['User'])->execute();
            return $this->redirect(['view', 'id' => Yii::$app->db->getLastInsertID()]);


        }







        return $this->render('create', [
            'model' => $model,
            'groups' => $groups,
            'roles' => $roles,
        ]);



        return null;
    }

    /**
     * Updates an existing Users model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Users model.
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
     * Finds the Users model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Users the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Users::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
