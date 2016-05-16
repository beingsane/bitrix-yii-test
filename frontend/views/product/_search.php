<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\Render;

/* @var $this yii\web\View */
/* @var $model frontend\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php
        $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'enableClientValidation' => false,
        ]);

        $render = new Render($form, $model);
    ?>

    <div class="row">

        <div class="col-sm-3">
            <?= $form->field($model, 'ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('TIMESTAMP_X') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'MODIFIED_BY') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('DATE_CREATE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'CREATED_BY') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'IBLOCK_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'IBLOCK_SECTION_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'ACTIVE') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('ACTIVE_FROM') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('ACTIVE_TO') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'SORT') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'NAME') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'PREVIEW_PICTURE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'PREVIEW_TEXT') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'PREVIEW_TEXT_TYPE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'DETAIL_PICTURE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'DETAIL_TEXT') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'DETAIL_TEXT_TYPE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'SEARCHABLE_CONTENT') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_STATUS_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_PARENT_ELEMENT_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_NEW') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_LOCKED_BY') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('WF_DATE_LOCK') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_COMMENTS') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'IN_SECTIONS') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'XML_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'CODE') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'TAGS') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'TMP_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'WF_LAST_HISTORY_ID') ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'SHOW_COUNTER') ?>
        </div>

        <div class="col-sm-3">
            <?= $render->dateField('SHOW_COUNTER_START') ?>
        </div>

    </div>

    <div class="form-group no-margin">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
