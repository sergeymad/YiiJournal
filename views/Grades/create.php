<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Grades */

$this->title = Yii::t('app', 'Create Grades');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_createform', [
        'model' => $model,
        'groups' => $groups,
    ]) ?>

</div>
