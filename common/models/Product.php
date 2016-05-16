<?php

namespace common\models;

use yii\helpers\ArrayHelper;

class Product extends \common\models\bitrix\BIblockElement
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIblock()
    {
        return $this->hasOne(bitrix\BIblock::className(), ['ID' => 'IBLOCK_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIblockSection()
    {
        return $this->hasOne(bitrix\BIblockSection::className(), ['ID' => 'IBLOCK_SECTION_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreviewPictureFile()
    {
       return $this->hasOne(BitrixFile::className(), ['ID' => 'PREVIEW_PICTURE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPictureFile()
    {
       return $this->hasOne(BitrixFile::className(), ['ID' => 'DETAIL_PICTURE']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogProduct()
    {
        return $this->hasOne(CatalogProduct::className(), ['ID' => 'ID']);
    }
}
