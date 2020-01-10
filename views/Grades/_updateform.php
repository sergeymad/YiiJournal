<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Grades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="grades-form">

    <?php $form = ActiveForm::begin(); ?>


    <table class="table table-striped table-bordered">
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
                <span><input type="text" name="grades[title][]" value="<?php echo $column;?>"></span>
                <span>rework</span>

            </td>
                <?php
            }
            unset($journal['title']);
            ?>
            <td class="button add_column"><div class='btn btn-success'>Add</div></td>
        </tr>
        <?php

        foreach ($users as $user) {
            if ($user['role_id'] == 1) {
                ?>
                <tr>
                    <td><?php echo $user['fio'] ?></td>

                    <?php

                    if (isset($journal[$user['fio']]))
                        $counter=0;
                        foreach ($journal[$user['fio']] as $grade) {
                            ?>
                            <td>
                                <div class="wrapper">
                                <span>
                                     <input type="text" name="grades[<?php echo $user['fio'] ?>][<?php echo $counter?>][grade]"
                                            value="<?php echo $grade['grade']; ?>">
                                </span>
                                <span>
                                     <input type="text" name="grades[<?php echo $user['fio'] ?>][<?php echo $counter?>][rework]"
                                            value="<?php echo $grade['rework']; ?>">
                                </span>
                                </div>
                            </td>
                        <?php
                        $counter++;
                        } ?>
                    <td class="empty"></td>
                </tr>
                <?php
            }
        }
        ?>

        <?php
        $journal = json_decode($model['journal'],1);

        ?>
        <tr class="sum">
            <td class="add_user button"></td>
            <?php
            if(isset($journal['title']))
                foreach ($journal['title'] as $column){
                    ?>
                    <td class='remove_col'><div class='btn btn-danger'>Remove column</div></td>
                    <?php
                }
            unset($journal['title']);
            ?>

        </tr>
    </table>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    $(document).ready(function () {
        var amount = $("tr:eq(0) td").length - 2
        $(document).on("click",".add_column",function () {
            $(this).before("<td><input type=\"text\" name=\"grades[title][]\"></td>")
            $("tr:not(.sum) .empty").each(function () {
                var name = $(this).parents("tr").find("td:eq(0)").text();
                $(this).before("<td><input name='grades["+name+"][]'></td>");
            })
            $("tr.sum").append("<td class='remove_col'><div class='btn btn-danger'>Remove column</div></td>")
        })

        $(document).on("click", ".remove_col", function () {

            var num = $(this).index()
            $("tr").each(function () {
                $(this).find("td").eq(num).remove()
            })
        })


    })
</script>