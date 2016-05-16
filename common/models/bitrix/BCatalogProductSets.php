<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_product_sets".
 *
 * @property integer $ID
 * @property integer $TYPE
 * @property integer $SET_ID
 * @property string $ACTIVE
 * @property integer $OWNER_ID
 * @property integer $ITEM_ID
 * @property double $QUANTITY
 * @property integer $MEASURE
 * @property double $DISCOUNT_PERCENT
 * @property integer $SORT
 * @property integer $CREATED_BY
 * @property string $DATE_CREATE
 * @property integer $MODIFIED_BY
 * @property string $TIMESTAMP_X
 * @property string $XML_ID
 */
class BCatalogProductSets extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_product_sets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TYPE', 'SET_ID', 'ACTIVE', 'OWNER_ID', 'ITEM_ID'], 'required'],
            [['TYPE', 'SET_ID', 'OWNER_ID', 'ITEM_ID', 'MEASURE', 'SORT', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['QUANTITY', 'DISCOUNT_PERCENT'], 'number'],
            [['DATE_CREATE', 'TIMESTAMP_X'], 'safe'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['XML_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TYPE' => Yii::t('app', 'Type'),
            'SET_ID' => Yii::t('app', 'Set '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'ITEM_ID' => Yii::t('app', 'Item '),
            'QUANTITY' => Yii::t('app', 'Quantity'),
            'MEASURE' => Yii::t('app', 'Measure'),
            'DISCOUNT_PERCENT' => Yii::t('app', 'Discount  Percent'),
            'SORT' => Yii::t('app', 'Sort'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'XML_ID' => Yii::t('app', 'Xml '),
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
