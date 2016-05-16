<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_affiliate_transact".
 *
 * @property integer $ID
 * @property integer $AFFILIATE_ID
 * @property string $TIMESTAMP_X
 * @property string $TRANSACT_DATE
 * @property string $AMOUNT
 * @property string $CURRENCY
 * @property string $DEBIT
 * @property string $DESCRIPTION
 * @property integer $EMPLOYEE_ID
 */
class BSaleAffiliateTransact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_affiliate_transact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AFFILIATE_ID', 'TIMESTAMP_X', 'TRANSACT_DATE', 'AMOUNT', 'CURRENCY', 'DESCRIPTION'], 'required'],
            [['AFFILIATE_ID', 'EMPLOYEE_ID'], 'integer'],
            [['TIMESTAMP_X', 'TRANSACT_DATE'], 'safe'],
            [['AMOUNT'], 'number'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['DEBIT'], 'string', 'max' => 1],
            [['DESCRIPTION'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'AFFILIATE_ID' => Yii::t('app', 'Affiliate '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TRANSACT_DATE' => Yii::t('app', 'Transact  Date'),
            'AMOUNT' => Yii::t('app', 'Amount'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DEBIT' => Yii::t('app', 'Debit'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
