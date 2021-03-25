<?php

namespace app\controllers;

use app\models\User;
use app\models\UsersIntegrationsJivositeApi;
use app\models\UsersIntegrationsJivositeApiSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->layout = 'main-login';
        if (!Yii::$app->user->isGuest) {
            return $this->redirect('/site/form');
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Добро пожаловать! ');
            return $this->redirect('/site/form');
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/site/login');
    }

    /**
     * Lists all UsersIntegrationsJivositeApi models.
     * @return mixed
     */
    public function actionList()
    {
        $searchModel = new UsersIntegrationsJivositeApiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Creates a new UsersIntegrationsJivositeApi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionForm()
    {
        $model = new UsersIntegrationsJivositeApi();
        $data = UsersIntegrationsJivositeApi::findOne(['user_id' => Yii::$app->user->id]);


        if ($model->load(Yii::$app->request->post())) {
            if(!empty($data)){
                $data->js = $model->js;
                $data->save();
            }else {
                $model->save();
            }
            return $this->redirect(['list']);
        }

        return $this->render('form', [
            'model' => $model,
            'data' => $data,
        ]);
    }

    /**
     * Updates an existing UsersIntegrationsJivositeApi model.
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

    protected function findModel($id)
    {
        if (($model = UsersIntegrationsJivositeApi::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
