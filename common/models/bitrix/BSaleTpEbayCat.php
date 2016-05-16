<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_ebay_cat".
 *
 * @property integer $ID
 * @property string $NAME
 * @property integer $CATEGORY_ID
 * @property integer $PARENT_ID
 * @property integer $LEVEL
 * @property string $CONDITION_ID_VALUES
 * @property string $CONDITION_ID_DEFINITION_URL
 * @property string $ITEM_SPECIFIC_ENABLED
 * @property string $VARIATIONS_ENABLED
 * @property string $PRODUCT_CREATION_ENABLED
 * @property string $LAST_UPDATE
 */
class BSaleTpEbayCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_ebay_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'CATEGORY_ID', 'PARENT_ID', 'LEVEL', 'CONDITION_ID_VALUES', 'CONDITION_ID_DEFINITION_URL', 'ITEM_SPECIFIC_ENABLED', 'VARIATIONS_ENABLED', 'PRODUCT_CREATION_ENABLED', 'LAST_UPDATE'], 'required'],
            [['CATEGORY_ID', 'PARENT_ID', 'LEVEL'], 'integer'],
            [['LAST_UPDATE'], 'safe'],
            [['NAME', 'CONDITION_ID_VALUES', 'CONDITION_ID_DEFINITION_URL'], 'string', 'max' => 255],
            [['ITEM_SPECIFIC_ENABLED', 'VARIATIONS_ENABLED', 'PRODUCT_CREATION_ENABLED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'CATEGORY_ID' => Yii::t('app', 'Category '),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'LEVEL' => Yii::t('app', 'Level'),
            'CONDITION_ID_VALUES' => Yii::t('app', 'Condition  Id  Values'),
            'CONDITION_ID_DEFINITION_URL' => Yii::t('app', 'Condition  Id  Definition  Url'),
            'ITEM_SPECIFIC_ENABLED' => Yii::t('app', 'Item  Specific  Enabled'),
            'VARIATIONS_ENABLED' => Yii::t('app', 'Variations  Enabled'),
            'PRODUCT_CREATION_ENABLED' => Yii::t('app', 'Product  Creation  Enabled'),
            'LAST_UPDATE' => Yii::t('app', 'Last  Update'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
