<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_messages".
 *
 * @property integer $IBLOCK_ID
 * @property string $MESSAGE_ID
 * @property string $MESSAGE_TEXT
 */
class BIblockMessages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_messages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'MESSAGE_ID'], 'required'],
            [['IBLOCK_ID'], 'integer'],
            [['MESSAGE_ID'], 'string', 'max' => 50],
            [['MESSAGE_TEXT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'MESSAGE_TEXT' => Yii::t('app', 'Message  Text'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
