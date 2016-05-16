<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\helpers\Render;
<?php
    foreach ($generator->modelRelations as $attribute => $relation) {
        echo 'use ' . $generator->getRelatedModelFullClassName($relation) . ';' . "\n";
    }
?>

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->searchModelClass, '\\') ?> */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-search">

    <?= "<?php" ?>

        $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'enableClientValidation' => false,
        ]);

        $render = new Render($form, $model);
    <?= "?>" ?>


    <div class="row">

<?php foreach ($generator->getColumnNames() as $attribute) { ?>
        <div class="col-sm-3">
            <?= '<?= ' . $generator->generateActiveSearchField($attribute) . ' ?>' . "\n" ?>
        </div>

<?php } ?>
    </div>

    <div class="form-group no-margin">
        <?= "<?= " ?>Html::submitButton(<?= $generator->generateString('Search') ?>, ['class' => 'btn btn-primary']) ?>
    </div>

    <?= "<?php " ?>ActiveForm::end(); ?>

</div>
