<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_ebay_cat_var".
 *
 * @property integer $ID
 * @property integer $CATEGORY_ID
 * @property string $NAME
 * @property string $VALUE
 * @property string $REQUIRED
 * @property integer $MIN_VALUES
 * @property integer $MAX_VALUES
 * @property string $SELECTION_MODE
 * @property string $ALLOWED_AS_VARIATION
 * @property string $DEPENDENCY_NAME
 * @property string $DEPENDENCY_VALUE
 * @property string $HELP_URL
 */
class BSaleTpEbayCatVar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_ebay_cat_var';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CATEGORY_ID', 'NAME', 'VALUE', 'REQUIRED', 'MIN_VALUES', 'MAX_VALUES', 'SELECTION_MODE', 'ALLOWED_AS_VARIATION', 'DEPENDENCY_NAME', 'DEPENDENCY_VALUE', 'HELP_URL'], 'required'],
            [['CATEGORY_ID', 'MIN_VALUES', 'MAX_VALUES'], 'integer'],
            [['NAME', 'VALUE', 'SELECTION_MODE', 'DEPENDENCY_NAME', 'DEPENDENCY_VALUE', 'HELP_URL'], 'string', 'max' => 255],
            [['REQUIRED', 'ALLOWED_AS_VARIATION'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CATEGORY_ID' => Yii::t('app', 'Category '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'REQUIRED' => Yii::t('app', 'Required'),
            'MIN_VALUES' => Yii::t('app', 'Min  Values'),
            'MAX_VALUES' => Yii::t('app', 'Max  Values'),
            'SELECTION_MODE' => Yii::t('app', 'Selection  Mode'),
            'ALLOWED_AS_VARIATION' => Yii::t('app', 'Allowed  As  Variation'),
            'DEPENDENCY_NAME' => Yii::t('app', 'Dependency  Name'),
            'DEPENDENCY_VALUE' => Yii::t('app', 'Dependency  Value'),
            'HELP_URL' => Yii::t('app', 'Help  Url'),
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
