<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\BIblockElement */

//use common\models\bitrix\BIblock;
//$b = new CIBlockPriceTools();

?>

<div class="bx_catalog_item">
    <div class="bx_catalog_item_container" id="<?= $model->ID ?>">

        <? $picture = $model->detailPictureFile; ?>
        <? if ($picture != null) { ?>
        <a id="<?= $picture->ID ?>"
            href="<?= Url::to(['product/view', 'id' => $model->ID]) ?>"
            class="bx_catalog_item_images"
            style="background-image: url('<?= $picture->getSrc() ?>')"
            title="<?= $model->NAME ?>"
        >
        </a>
        <? } ?>

        <div class="bx_catalog_item_title">
            <a href="<?= Url::to(['product/view', 'id' => $model->ID]) ?>" title="<?= $model->NAME ?>">
                <?= $model->NAME ?>
            </a>
        </div>


        <?

            $price = $model->catalogProduct->getPrice();
        ?>
        <div class="bx_catalog_item_price">
            <div class="bx_price">
                <?
                Yii::$app->formatter->decimalSeparator = ',';
                Yii::$app->formatter->thousandSeparator = ' ';
                ?>
                <?= Yii::$app->formatter->asDecimal($price) . ' руб.' ?>
            </div>
        </div>

    </div>

</div>
