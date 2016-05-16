<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing_attachment".
 *
 * @property integer $CHAIN_ID
 * @property integer $FILE_ID
 */
class BSenderMailingAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHAIN_ID', 'FILE_ID'], 'required'],
            [['CHAIN_ID', 'FILE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CHAIN_ID' => Yii::t('app', 'Chain '),
            'FILE_ID' => Yii::t('app', 'File '),
        ];
    }

    public function getName()
    {
        return $this->CHAIN_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CHAIN_ID', 'CHAIN_ID');
        return $list;
    }
}
