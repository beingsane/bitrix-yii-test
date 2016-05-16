<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing_trigger".
 *
 * @property integer $MAILING_CHAIN_ID
 * @property integer $IS_TYPE_START
 * @property string $NAME
 * @property string $EVENT
 * @property string $ENDPOINT
 */
class BSenderMailingTrigger extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing_trigger';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILING_CHAIN_ID', 'EVENT', 'ENDPOINT'], 'required'],
            [['MAILING_CHAIN_ID', 'IS_TYPE_START'], 'integer'],
            [['ENDPOINT'], 'string'],
            [['NAME', 'EVENT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MAILING_CHAIN_ID' => Yii::t('app', 'Mailing  Chain '),
            'IS_TYPE_START' => Yii::t('app', 'Is  Type  Start'),
            'NAME' => Yii::t('app', 'Name'),
            'EVENT' => Yii::t('app', 'Event'),
            'ENDPOINT' => Yii::t('app', 'Endpoint'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'MAILING_CHAIN_ID', 'NAME');
        return $list;
    }
}
