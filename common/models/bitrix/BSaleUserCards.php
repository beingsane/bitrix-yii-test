<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_user_cards".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $TIMESTAMP_X
 * @property integer $PAY_SYSTEM_ACTION_ID
 * @property string $CURRENCY
 * @property string $CARD_TYPE
 * @property string $CARD_NUM
 * @property string $CARD_CODE
 * @property integer $CARD_EXP_MONTH
 * @property integer $CARD_EXP_YEAR
 * @property string $DESCRIPTION
 * @property string $SUM_MIN
 * @property string $SUM_MAX
 * @property string $SUM_CURRENCY
 * @property string $LAST_STATUS
 * @property string $LAST_STATUS_CODE
 * @property string $LAST_STATUS_DESCRIPTION
 * @property string $LAST_STATUS_MESSAGE
 * @property string $LAST_SUM
 * @property string $LAST_CURRENCY
 * @property string $LAST_DATE
 */
class BSaleUserCards extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_user_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TIMESTAMP_X', 'PAY_SYSTEM_ACTION_ID', 'CARD_TYPE', 'CARD_NUM', 'CARD_EXP_MONTH', 'CARD_EXP_YEAR'], 'required'],
            [['USER_ID', 'SORT', 'PAY_SYSTEM_ACTION_ID', 'CARD_EXP_MONTH', 'CARD_EXP_YEAR'], 'integer'],
            [['TIMESTAMP_X', 'LAST_DATE'], 'safe'],
            [['CARD_NUM'], 'string'],
            [['SUM_MIN', 'SUM_MAX', 'LAST_SUM'], 'number'],
            [['ACTIVE', 'LAST_STATUS'], 'string', 'max' => 1],
            [['CURRENCY', 'SUM_CURRENCY', 'LAST_CURRENCY'], 'string', 'max' => 3],
            [['CARD_TYPE'], 'string', 'max' => 20],
            [['CARD_CODE', 'LAST_STATUS_CODE'], 'string', 'max' => 5],
            [['DESCRIPTION', 'LAST_STATUS_MESSAGE'], 'string', 'max' => 255],
            [['LAST_STATUS_DESCRIPTION'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'PAY_SYSTEM_ACTION_ID' => Yii::t('app', 'Pay  System  Action '),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'CARD_TYPE' => Yii::t('app', 'Card  Type'),
            'CARD_NUM' => Yii::t('app', 'Card  Num'),
            'CARD_CODE' => Yii::t('app', 'Card  Code'),
            'CARD_EXP_MONTH' => Yii::t('app', 'Card  Exp  Month'),
            'CARD_EXP_YEAR' => Yii::t('app', 'Card  Exp  Year'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SUM_MIN' => Yii::t('app', 'Sum  Min'),
            'SUM_MAX' => Yii::t('app', 'Sum  Max'),
            'SUM_CURRENCY' => Yii::t('app', 'Sum  Currency'),
            'LAST_STATUS' => Yii::t('app', 'Last  Status'),
            'LAST_STATUS_CODE' => Yii::t('app', 'Last  Status  Code'),
            'LAST_STATUS_DESCRIPTION' => Yii::t('app', 'Last  Status  Description'),
            'LAST_STATUS_MESSAGE' => Yii::t('app', 'Last  Status  Message'),
            'LAST_SUM' => Yii::t('app', 'Last  Sum'),
            'LAST_CURRENCY' => Yii::t('app', 'Last  Currency'),
            'LAST_DATE' => Yii::t('app', 'Last  Date'),
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
