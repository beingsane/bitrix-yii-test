<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_offers_tmp".
 *
 * @property string $ID
 * @property string $PRODUCT_IBLOCK_ID
 * @property string $OFFERS_IBLOCK_ID
 * @property string $TIMESTAMP_X
 */
class BIblockOffersTmp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_offers_tmp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_IBLOCK_ID', 'OFFERS_IBLOCK_ID'], 'required'],
            [['PRODUCT_IBLOCK_ID', 'OFFERS_IBLOCK_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PRODUCT_IBLOCK_ID' => Yii::t('app', 'Product  Iblock '),
            'OFFERS_IBLOCK_ID' => Yii::t('app', 'Offers  Iblock '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
