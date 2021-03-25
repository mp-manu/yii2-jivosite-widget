<?php


namespace app\components;


use app\models\UsersIntegrationsJivositeApi;
use yii\base\Widget;
use yii\helpers\Html;

class Jivositewidget extends Widget
{
    public $user_id;
    public $js = '';
    public function init(){
        parent::init();
        $data = UsersIntegrationsJivositeApi::find()->where(['user_id' => $this->user_id])->one();
        if(!empty($data)){
            $this->js = $data['js'];
        }
    }

    public function run(){
        return $this->js;
    }

}