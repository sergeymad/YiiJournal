<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roles-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php

    foreach ($actions as $key=>$action){
        ?>
        <p><?=$key?></p>
        <table class="table">
            <tr>
                <?php
                foreach ($action as $item){
                    ?>
                    <td>
                        <?php echo $item;?>
                    </td>
                    <?php
                }
                ?>
            </tr>
            <tr>
                <?php
                foreach ($action as $item){
                    ?>
                    <td>
                        <input type="checkbox" name="Roles[actions][<?=$key?>][<?=$item?>]" <?php if(json_decode($model->actions,1)[$key][$item]=="on"){echo "checked";}?>>

                    </td>
                    <?php
                }
                ?>
            </tr>

        </table>
    <?php
    }
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
