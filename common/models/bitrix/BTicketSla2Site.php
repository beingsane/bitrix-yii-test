<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_sla_2_site".
 *
 * @property integer $SLA_ID
 * @property string $SITE_ID
 */
class BTicketSla2Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_sla_2_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SLA_ID', 'SITE_ID'], 'required'],
            [['SLA_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SLA_ID' => Yii::t('app', 'Sla '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
