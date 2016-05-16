<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\Render;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php
        $form = ActiveForm::begin();

        $render = new Render($form, $model);
    ?>

    <?= $render->dateField('TIMESTAMP_X') ?>

    <?= $form->field($model, 'MODIFIED_BY')->textInput() ?>

    <?= $render->dateField('DATE_CREATE') ?>

    <?= $form->field($model, 'CREATED_BY')->textInput() ?>

    <?= $form->field($model, 'IBLOCK_ID')->textInput() ?>

    <?= $form->field($model, 'IBLOCK_SECTION_ID')->textInput() ?>

    <?= $form->field($model, 'ACTIVE')->textInput(['maxlength' => true]) ?>

    <?= $render->dateField('ACTIVE_FROM') ?>

    <?= $render->dateField('ACTIVE_TO') ?>

    <?= $form->field($model, 'SORT')->textInput() ?>

    <?= $form->field($model, 'NAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PREVIEW_PICTURE')->textInput() ?>

    <?= $form->field($model, 'PREVIEW_TEXT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'PREVIEW_TEXT_TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DETAIL_PICTURE')->textInput() ?>

    <?= $form->field($model, 'DETAIL_TEXT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'DETAIL_TEXT_TYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEARCHABLE_CONTENT')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'WF_STATUS_ID')->textInput() ?>

    <?= $form->field($model, 'WF_PARENT_ELEMENT_ID')->textInput() ?>

    <?= $form->field($model, 'WF_NEW')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WF_LOCKED_BY')->textInput() ?>

    <?= $render->dateField('WF_DATE_LOCK') ?>

    <?= $form->field($model, 'WF_COMMENTS')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'IN_SECTIONS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'XML_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TAGS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TMP_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'WF_LAST_HISTORY_ID')->textInput() ?>

    <?= $form->field($model, 'SHOW_COUNTER')->textInput() ?>

    <?= $render->dateField('SHOW_COUNTER_START') ?>

    <div class="form-group m-t-md">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
