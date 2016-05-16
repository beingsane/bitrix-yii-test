<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_supercoupons_log".
 *
 * @property string $TIMESTAMP_X
 * @property integer $COUPON_ID
 * @property integer $USER_ID
 * @property string $SUCCESS
 * @property integer $AFTER_COUNT
 * @property integer $SESSION_ID
 * @property integer $GUEST_ID
 * @property integer $AFFECTED_ROWS
 * @property string $COUPON
 */
class BTicketSupercouponsLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_supercoupons_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['COUPON_ID', 'USER_ID', 'AFTER_COUNT', 'SESSION_ID', 'GUEST_ID', 'AFFECTED_ROWS'], 'integer'],
            [['SUCCESS'], 'string', 'max' => 1],
            [['COUPON'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'COUPON_ID' => Yii::t('app', 'Coupon '),
            'USER_ID' => Yii::t('app', 'User '),
            'SUCCESS' => Yii::t('app', 'Success'),
            'AFTER_COUNT' => Yii::t('app', 'After  Count'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'AFFECTED_ROWS' => Yii::t('app', 'Affected  Rows'),
            'COUPON' => Yii::t('app', 'Coupon'),
        ];
    }

    public function getName()
    {
        return $this->TIMESTAMP_X;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TIMESTAMP_X', 'TIMESTAMP_X');
        return $list;
    }
}
