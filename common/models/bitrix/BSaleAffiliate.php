<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_affiliate".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property integer $USER_ID
 * @property integer $AFFILIATE_ID
 * @property integer $PLAN_ID
 * @property string $ACTIVE
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property string $PAID_SUM
 * @property string $APPROVED_SUM
 * @property string $PENDING_SUM
 * @property integer $ITEMS_NUMBER
 * @property string $ITEMS_SUM
 * @property string $LAST_CALCULATE
 * @property string $AFF_SITE
 * @property string $AFF_DESCRIPTION
 * @property string $FIX_PLAN
 */
class BSaleAffiliate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_affiliate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'USER_ID', 'PLAN_ID', 'TIMESTAMP_X', 'DATE_CREATE'], 'required'],
            [['USER_ID', 'AFFILIATE_ID', 'PLAN_ID', 'ITEMS_NUMBER'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CREATE', 'LAST_CALCULATE'], 'safe'],
            [['PAID_SUM', 'APPROVED_SUM', 'PENDING_SUM', 'ITEMS_SUM'], 'number'],
            [['AFF_DESCRIPTION'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['ACTIVE', 'FIX_PLAN'], 'string', 'max' => 1],
            [['AFF_SITE'], 'string', 'max' => 200],
            [['USER_ID', 'SITE_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'SITE_ID'], 'message' => 'The combination of Site  and User  has already been taken.']
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
            'USER_ID' => Yii::t('app', 'User '),
            'AFFILIATE_ID' => Yii::t('app', 'Affiliate '),
            'PLAN_ID' => Yii::t('app', 'Plan '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'PAID_SUM' => Yii::t('app', 'Paid  Sum'),
            'APPROVED_SUM' => Yii::t('app', 'Approved  Sum'),
            'PENDING_SUM' => Yii::t('app', 'Pending  Sum'),
            'ITEMS_NUMBER' => Yii::t('app', 'Items  Number'),
            'ITEMS_SUM' => Yii::t('app', 'Items  Sum'),
            'LAST_CALCULATE' => Yii::t('app', 'Last  Calculate'),
            'AFF_SITE' => Yii::t('app', 'Aff  Site'),
            'AFF_DESCRIPTION' => Yii::t('app', 'Aff  Description'),
            'FIX_PLAN' => Yii::t('app', 'Fix  Plan'),
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
