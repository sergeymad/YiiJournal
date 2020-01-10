<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GradesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Grades');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grades-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (Yii::$app->user->identity->role_id != 1) { ?>
    <p>
        <?= Html::a(Yii::t('app', 'Create Grades'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php } ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'semester',
            'year',
            [
                'label' => 'Group',

                'value' => function ($model) {

                    $group = (new \yii\db\Query())
                        ->select("name")
                        ->from('groups')->where(["id"=>$model['group_id']])
                        ->one();

                    return $group['name'];


                }
            ],
            //'journal:ntext',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
