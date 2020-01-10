<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Grades */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grades'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="grades-view">

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
    <?php  }?><table class="table table-striped table-bordered">
        <?php
        $journal = json_decode($model['journal'],1);

        ?>
        <tr class="">
            <td></td>
            <?php
            if(isset($journal['title']))
            foreach ($journal['title'] as $column){
                ?>
                <td>
                    <span> <?php echo $column;?></span>
                    <span>rework</span>

                </td>
                <?php
            }
            unset($journal['title']);
            ?>
        </tr>
        <?php

        foreach ($users as $user){
        if ($user['role_id'] == 1) {
            ?>
            <tr>
                <td><?php echo $user['fio'] ?></td>

                <?php
                if (isset($journal[$user['fio']]))
                    foreach ($journal[$user['fio']] as $grade) {
                        ?>
                        <td>
                            <span>       <?php echo $grade['grade']; ?></span>
                            <span>       <?php echo $grade['rework']; ?></span>

                        </td>
                    <?php } ?>

            </tr>
            <?php
        }
        }
        ?>



    </table>


</div>
