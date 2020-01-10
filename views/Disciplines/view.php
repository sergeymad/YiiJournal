<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Disciplines */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Disciplines'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="disciplines-view">

    <h1><?= Html::encode($this->title) ?></h1>

<?php    if(Yii::$app->user->identity->role_id!=1){?>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?php  }?><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'lecturer_id',
            'year',
            'semester',
            'hours',
            'credits',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
