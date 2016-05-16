<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();

echo "<?php\n";
?>

use yii\helpers\Url;
use yii\helpers\Html;
use common\helpers\UrlHelper;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

<?php
    $str = 'Update ' . Inflector::camel2words(StringHelper::basename($generator->modelClass));
    if ($generator->enableI18N) {
        $title = "Yii::t('" . $generator->messageCategory . "', '" . $str . ": {modelName}', [\n"
            .  "    'modelName' => \$model->" . $generator->getNameAttribute() . ",\n"
            .  "])";
    } else {
        $title = "'".$str.": ' . \$model->" . $generator->getNameAttribute() . "";
    }
?>
$this->title = <?= $title ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => UrlHelper::previous()];
$this->params['breadcrumbs'][] = ['label' => $model-><?= $generator->getNameAttribute() ?>, 'url' => ['view', <?= $urlParams ?>]];
$this->params['breadcrumbs'][] = <?= $generator->generateString('Update') ?>;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-update">

    <div class="page-title">
        <h2><?= "<?= " ?>Html::encode($this->title) ?></h2>
    </div>

    <?= "<?= " ?>$this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
