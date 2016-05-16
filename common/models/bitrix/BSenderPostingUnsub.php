<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_posting_unsub".
 *
 * @property integer $ID
 * @property integer $RECIPIENT_ID
 * @property integer $POSTING_ID
 * @property string $DATE_INSERT
 */
class BSenderPostingUnsub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_posting_unsub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RECIPIENT_ID', 'POSTING_ID'], 'required'],
            [['RECIPIENT_ID', 'POSTING_ID'], 'integer'],
            [['DATE_INSERT'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RECIPIENT_ID' => Yii::t('app', 'Recipient '),
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
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
