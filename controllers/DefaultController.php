<?php


namespace app\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionView($uid){
        \Yii::$app->view->params['uid'] = $uid;
        return $this->render('/site/index');
    }
}