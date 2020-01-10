<?php

/* @var $this yii\web\View */

$this->title = 'Web Grade Book';

use yii\grid\GridView; ?>
<div class="container-fluid">

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Основная информация</h6>
                        </div>
                        <div class="card-body row">
                            <div class="col-lg-6 mb-4">
                                <div class="card bg-secondary text-white shadow">
                                    <div class="card-body">
                                        Имя
                                        <div class="text-white-50 small"><?php echo Yii::$app->user->identity->fio; ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th><a href="/web/grades/index?sort=name" data-sort="name">Name</a></th>
            <th><a href="/web/grades/index?sort=semester" data-sort="semester">Semester</a></th>
            <th><a href="/web/grades/index?sort=year" data-sort="year">Year</a></th>
            <th class="action-column">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($dataProvider as $item){?>
        <tr data-key="3">

            <td><?php echo $item['name'];?></td>
            <td><?php echo $item['semester'];?></td>
            <td><?php echo $item['year']?></td>
            <td><a href="/web/grades/view?id=<?php echo $item['id'];?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a></td>
        </tr>
        <?php }?>
        </tbody>
    </table>

</div>

