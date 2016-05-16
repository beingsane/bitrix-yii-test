<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_online".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $TICKET_ID
 * @property integer $USER_ID
 * @property string $CURRENT_MODE
 */
class BTicketOnline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_online';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['TICKET_ID', 'USER_ID'], 'integer'],
            [['CURRENT_MODE'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TICKET_ID' => Yii::t('app', 'Ticket '),
            'USER_ID' => Yii::t('app', 'User '),
            'CURRENT_MODE' => Yii::t('app', 'Current  Mode'),
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
