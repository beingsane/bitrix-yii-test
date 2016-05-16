<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla_2_criticality".
 *
 * @property integer $SLA_ID
 * @property integer $CRITICALITY_ID
 */
class BTicketSla2Criticality extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla_2_criticality';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'CRITICALITY_ID'], 'required'],
            [['SLA_ID', 'CRITICALITY_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SLA_ID' => Yii::t('app', 'Sla '),
            'CRITICALITY_ID' => Yii::t('app', 'Criticality '),
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
