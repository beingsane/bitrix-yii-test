<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla_2_mark".
 *
 * @property integer $SLA_ID
 * @property integer $MARK_ID
 */
class BTicketSla2Mark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla_2_mark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'MARK_ID'], 'required'],
            [['SLA_ID', 'MARK_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SLA_ID' => Yii::t('app', 'Sla '),
            'MARK_ID' => Yii::t('app', 'Mark '),
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
