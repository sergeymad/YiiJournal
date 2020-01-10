<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?php
    $groups_drop = [];
    foreach ($groups as $group){
        $groups_drop[$group['id']]=$group['name'];
    }
    echo $form->field($model, 'group_id')->dropDownList( $groups_drop);
    ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?php
    $roles_drop = [];
    foreach ($roles as $role){
        $roles_drop[$role['id']]=$role['name'];
    }
    echo $form->field($model, 'role_id')->dropDownList( $roles_drop);
    ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>




    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
