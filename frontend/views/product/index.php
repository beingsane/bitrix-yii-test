<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile(Url::to('/bitrix/cache/css/s1/eshop_bootstrap_yellow/kernel_main/kernel_main.css'));
$this->registerCssFile(Url::to('/bitrix/cache/css/s1/eshop_bootstrap_yellow/page_cd1a4d21ec5860c18243ca3688d0ee3f/page_cd1a4d21ec5860c18243ca3688d0ee3f.css'));
$this->registerCssFile(Url::to('/bitrix/cache/css/s1/eshop_bootstrap_yellow/template_68efd8e8cb5aa666ba6bc5fc8ed49042/template_68efd8e8cb5aa666ba6bc5fc8ed49042.css'));
$this->registerCssFile(Url::to('/bitrix/themes/.default/pubstyles.min.css?146328974046822'));

?>
<div class="product-index">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><?= Html::encode($this->title) ?></h2>
            </div>

            <div class="col-sm-4">
                <div class="pull-right">
                    <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <?= Html::a(Yii::t('app', 'Filter'), '#filter', ['data-toggle' => 'collapse']) ?>
            <?= Html::a(Yii::t('app', 'Reset filter'), ['index'], ['class' => 'pull-right reset-filter']) ?>
        </div>
        <div id="filter" class="panel-collapse collapse <?= ($searchModel->isOpen() ? 'in' : '') ?>">
            <div class="panel-body">
                <?= $this->render('_search', ['model' => $searchModel]) ?>
            </div>
        </div>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['tag' => false],
        'layout' => '
            {summary}
            <div class="bx_catalog_list_home col3">
                {items}
            </div>
            <div class="clearfix"></div>
            {pager}
        ',
        'itemView' => '__product',
    ]) ?>

</div>
