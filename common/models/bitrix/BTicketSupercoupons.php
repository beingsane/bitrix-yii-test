<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_supercoupons".
 *
 * @property string $ID
 * @property integer $COUNT_TICKETS
 * @property string $COUPON
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property integer $CREATED_USER_ID
 * @property integer $UPDATED_USER_ID
 * @property string $ACTIVE
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property integer $SLA_ID
 * @property integer $COUNT_USED
 */
class BTicketSupercoupons extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_supercoupons';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COUNT_TICKETS', 'CREATED_USER_ID', 'UPDATED_USER_ID', 'SLA_ID', 'COUNT_USED'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CREATE', 'ACTIVE_FROM', 'ACTIVE_TO'], 'safe'],
            [['COUPON'], 'string', 'max' => 255],
            [['ACTIVE'], 'string', 'max' => 1],
            [['COUPON'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'COUNT_TICKETS' => Yii::t('app', 'Count  Tickets'),
            'COUPON' => Yii::t('app', 'Coupon'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_USER_ID' => Yii::t('app', 'Created  User '),
            'UPDATED_USER_ID' => Yii::t('app', 'Updated  User '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'SLA_ID' => Yii::t('app', 'Sla '),
            'COUNT_USED' => Yii::t('app', 'Count  Used'),
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
