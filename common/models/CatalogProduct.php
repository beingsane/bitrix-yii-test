<?php

namespace common\models;

use yii\helpers\ArrayHelper;
use \CIBlockPriceTools;

class CatalogProduct extends \common\models\bitrix\BCatalogProduct
{
    public function getPrice()
    {
        /*
        $vat = $this->bCatalogVat;

        $arItem = [
            'CATALOG_VAT' => $vat->rate,
            'CATALOG_VAT_INCLUDED' => $this->VAT_INCLUDED,
        ];
        $IBLOCK_ID = $this->product->IBLOCK_ID;

        $pricesInfo = CIBlockPriceTools::GetCatalogPrices($IBLOCK_ID, $PRICE_CODE = array(0 => "BASE"));
        foreach ($pricesInfo as $row) {
            $catalogPrice = bitrix\BCatalogPrice::findOne(['PRODUCT_ID' => $this->ID, 'CATALOG_GROUP_ID' => $row['ID']]);
            var_dump($catalogPrice);
            $arItem['CATALOG_PRICE_'.$row['ID']] = $catalogPrice->PRICE;
            $arItem['CATALOG_CURRENCY_'.$row['ID']] = $catalogPrice->CURRENCY;
        }

        $arItem["PRICES"] = CIBlockPriceTools::GetItemPrices($IBLOCK_ID, $pricesInfo, $arItem, false, []);
        if (!empty($arItem['PRICES'])) {
            $arItem['MIN_PRICE'] = CIBlockPriceTools::getMinPriceFromList($arItem['PRICES']);
        }

        $price = $arItem['MIN_PRICE'];
        return $price;
        */

        $price = 0;
        $propertyValue = bitrix\BIblockElementProperty::findOne(['IBLOCK_PROPERTY_ID' => 31, 'VALUE' => $this->ID]); // 31 - Элемент каталога
        if ($propertyValue) {
            $elementId = $propertyValue->IBLOCK_ELEMENT_ID;

            //TODO: add id from pricesInfo (CATALOG_GROUP_ID => ID)
            $catalogPrice = bitrix\BCatalogPrice::findOne(['PRODUCT_ID' => $elementId]);
            if ($catalogPrice) {
                $price = $catalogPrice->PRICE;
            }
        }

        return $price;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['ID' => 'ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBCatalogVat()
    {
        return $this->hasOne(bitrix\BCatalogVat::className(), ['ID' => 'VAT_ID']);
    }
}
