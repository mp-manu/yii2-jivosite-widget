<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersIntegrationsJivositeApiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Скрипты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-integrations-jivosite-api-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить скрипт', ['form'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'js:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}',
                'buttons' => [
                    'update' => function ($url, $model) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/site/form',
                            [
                                'title' =>  'Обновить',
                            ]);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
