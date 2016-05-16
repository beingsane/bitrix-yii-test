<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Url;
use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <div class="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h2><?= "<?=" ?> Html::encode($this->title) <?= "?>" ?></h2>
            </div>

            <div class="col-sm-4">
                <div class="pull-right">
                    <?= "<?=" ?> Html::a(<?= $generator->generateString('Create') ?>, ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>

<?php if(!empty($generator->searchModelClass)) { ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <?= "<?=" ?> Html::a(Yii::t('app', 'Filter'), '#filter', ['data-toggle' => 'collapse']) <?= "?>" ?>

            <?= "<?=" ?> Html::a(Yii::t('app', 'Reset filter'), ['index'], ['class' => 'pull-right reset-filter']) <?= "?>" ?>

        </div>
        <div id="filter" class="panel-collapse collapse <?= "<?=" ?> ($searchModel->isOpen() ? 'in' : '') <?= "?>" ?>">
            <div class="panel-body">
                <?= "<?=" ?> $this->render('_search', ['model' => $searchModel]) <?= "?>" ?>

            </div>
        </div>
    </div>
<?php } ?>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        $commentLine = (++$count <= 8 ? '' : '// ');
        echo "            $commentLine'" . $name . "',\n";
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        $commentLine = (++$count <= 8 ? '' : '// ');

        $attribute = $column->name;
        if ($generator->relationExists($attribute)) {
            $relationName = $generator->modelRelations[$attribute]['relationName'];
            $attribute = lcfirst($relationName) . '.name';
            $format = 'text';
        }

        echo "            $commentLine'" . $attribute . ($format === 'text' ? "" : ":" . $format) . "',\n";
    }
}
?>

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>
