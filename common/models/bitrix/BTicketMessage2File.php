<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_message_2_file".
 *
 * @property integer $ID
 * @property string $HASH
 * @property integer $MESSAGE_ID
 * @property integer $FILE_ID
 * @property integer $TICKET_ID
 * @property string $EXTENSION_SUFFIX
 */
class BTicketMessage2File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_message_2_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MESSAGE_ID', 'FILE_ID', 'TICKET_ID'], 'integer'],
            [['HASH', 'EXTENSION_SUFFIX'], 'string', 'max' => 255],
            [['HASH'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'HASH' => Yii::t('app', 'Hash'),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'FILE_ID' => Yii::t('app', 'File '),
            'TICKET_ID' => Yii::t('app', 'Ticket '),
            'EXTENSION_SUFFIX' => Yii::t('app', 'Extension  Suffix'),
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
