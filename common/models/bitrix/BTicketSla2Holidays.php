<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla_2_holidays".
 *
 * @property integer $SLA_ID
 * @property integer $HOLIDAYS_ID
 */
class BTicketSla2Holidays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla_2_holidays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'HOLIDAYS_ID'], 'required'],
            [['SLA_ID', 'HOLIDAYS_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SLA_ID' => Yii::t('app', 'Sla '),
            'HOLIDAYS_ID' => Yii::t('app', 'Holidays '),
        ];
    }

    public function getName()
    {
        return $this->SLA_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SLA_ID', 'SLA_ID');
        return $list;
    }
}
