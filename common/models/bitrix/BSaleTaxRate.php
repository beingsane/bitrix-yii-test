<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tax_rate".
 *
 * @property integer $ID
 * @property integer $TAX_ID
 * @property integer $PERSON_TYPE_ID
 * @property string $VALUE
 * @property string $CURRENCY
 * @property string $IS_PERCENT
 * @property string $IS_IN_PRICE
 * @property integer $APPLY_ORDER
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 */
class BSaleTaxRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tax_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TAX_ID', 'VALUE', 'TIMESTAMP_X'], 'required'],
            [['TAX_ID', 'PERSON_TYPE_ID', 'APPLY_ORDER'], 'integer'],
            [['VALUE'], 'number'],
            [['TIMESTAMP_X'], 'safe'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['IS_PERCENT', 'IS_IN_PRICE', 'ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TAX_ID' => Yii::t('app', 'Tax '),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'VALUE' => Yii::t('app', 'Value'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'IS_PERCENT' => Yii::t('app', 'Is  Percent'),
            'IS_IN_PRICE' => Yii::t('app', 'Is  In  Price'),
            'APPLY_ORDER' => Yii::t('app', 'Apply  Order'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
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
