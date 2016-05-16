<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_posting_email".
 *
 * @property integer $ID
 * @property integer $POSTING_ID
 * @property string $STATUS
 * @property string $EMAIL
 * @property integer $SUBSCRIPTION_ID
 * @property integer $USER_ID
 */
class BPostingEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_posting_email';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID', 'STATUS', 'EMAIL'], 'required'],
            [['POSTING_ID', 'SUBSCRIPTION_ID', 'USER_ID'], 'integer'],
            [['STATUS'], 'string', 'max' => 1],
            [['EMAIL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'STATUS' => Yii::t('app', 'Status'),
            'EMAIL' => Yii::t('app', 'Email'),
            'SUBSCRIPTION_ID' => Yii::t('app', 'Subscription '),
            'USER_ID' => Yii::t('app', 'User '),
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
