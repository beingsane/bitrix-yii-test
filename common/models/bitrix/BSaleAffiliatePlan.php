<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_affiliate_plan".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property string $BASE_RATE
 * @property string $BASE_RATE_TYPE
 * @property string $BASE_RATE_CURRENCY
 * @property string $MIN_PAY
 * @property string $MIN_PLAN_VALUE
 * @property string $VALUE_CURRENCY
 */
class BSaleAffiliatePlan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_affiliate_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'NAME', 'TIMESTAMP_X'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['TIMESTAMP_X'], 'safe'],
            [['BASE_RATE', 'MIN_PAY', 'MIN_PLAN_VALUE'], 'number'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 250],
            [['ACTIVE', 'BASE_RATE_TYPE'], 'string', 'max' => 1],
            [['BASE_RATE_CURRENCY', 'VALUE_CURRENCY'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'BASE_RATE' => Yii::t('app', 'Base  Rate'),
            'BASE_RATE_TYPE' => Yii::t('app', 'Base  Rate  Type'),
            'BASE_RATE_CURRENCY' => Yii::t('app', 'Base  Rate  Currency'),
            'MIN_PAY' => Yii::t('app', 'Min  Pay'),
            'MIN_PLAN_VALUE' => Yii::t('app', 'Min  Plan  Value'),
            'VALUE_CURRENCY' => Yii::t('app', 'Value  Currency'),
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
