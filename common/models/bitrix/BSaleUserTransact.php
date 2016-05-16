<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_user_transact".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $TIMESTAMP_X
 * @property string $TRANSACT_DATE
 * @property string $AMOUNT
 * @property string $CURRENCY
 * @property string $DEBIT
 * @property integer $ORDER_ID
 * @property string $DESCRIPTION
 * @property string $NOTES
 * @property integer $PAYMENT_ID
 * @property integer $EMPLOYEE_ID
 */
class BSaleUserTransact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_user_transact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TIMESTAMP_X', 'TRANSACT_DATE', 'CURRENCY', 'DESCRIPTION'], 'required'],
            [['USER_ID', 'ORDER_ID', 'PAYMENT_ID', 'EMPLOYEE_ID'], 'integer'],
            [['TIMESTAMP_X', 'TRANSACT_DATE'], 'safe'],
            [['AMOUNT'], 'number'],
            [['NOTES'], 'string'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['DEBIT'], 'string', 'max' => 1],
            [['DESCRIPTION'], 'string', 'max' => 255]
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
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TRANSACT_DATE' => Yii::t('app', 'Transact  Date'),
            'AMOUNT' => Yii::t('app', 'Amount'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DEBIT' => Yii::t('app', 'Debit'),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'NOTES' => Yii::t('app', 'Notes'),
            'PAYMENT_ID' => Yii::t('app', 'Payment '),
            'EMPLOYEE_ID' => Yii::t('app', 'Employee '),
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
