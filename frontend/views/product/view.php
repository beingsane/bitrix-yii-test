<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\helpers\UrlHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->NAME;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => UrlHelper::previous()];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>

            <div class="col-sm-4">
                <div class="pull-right">
                    <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>

                    <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->ID], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ID',
            'TIMESTAMP_X:datetime',
            'MODIFIED_BY',
            'DATE_CREATE:datetime',
            'CREATED_BY',
            'IBLOCK_ID',
            'IBLOCK_SECTION_ID',
            'ACTIVE',
            'ACTIVE_FROM:datetime',
            'ACTIVE_TO:datetime',
            'SORT',
            'NAME',
            'PREVIEW_PICTURE',
            'PREVIEW_TEXT:ntext',
            'PREVIEW_TEXT_TYPE',
            'DETAIL_PICTURE',
            'DETAIL_TEXT:ntext',
            'DETAIL_TEXT_TYPE',
            'SEARCHABLE_CONTENT:ntext',
            'WF_STATUS_ID',
            'WF_PARENT_ELEMENT_ID',
            'WF_NEW',
            'WF_LOCKED_BY',
            'WF_DATE_LOCK:datetime',
            'WF_COMMENTS:ntext',
            'IN_SECTIONS',
            'XML_ID',
            'CODE',
            'TAGS',
            'TMP_ID',
            'WF_LAST_HISTORY_ID',
            'SHOW_COUNTER',
            'SHOW_COUNTER_START:datetime',
        ],
    ]) ?>

</div>
