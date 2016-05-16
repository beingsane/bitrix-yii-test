<?php

use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\UrlHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = Yii::t('app', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => UrlHelper::previous()];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <div class="page-title">
        <h2><?= Html::encode($this->title) ?></h2>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
