<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_socialservices_message".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $SOCSERV_USER_ID
 * @property string $PROVIDER
 * @property string $MESSAGE
 * @property string $INSERT_DATE
 * @property string $SUCCES_SENT
 */
class BSocialservicesMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_socialservices_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SOCSERV_USER_ID', 'PROVIDER'], 'required'],
            [['USER_ID', 'SOCSERV_USER_ID'], 'integer'],
            [['INSERT_DATE'], 'safe'],
            [['PROVIDER'], 'string', 'max' => 100],
            [['MESSAGE'], 'string', 'max' => 1000],
            [['SUCCES_SENT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'SOCSERV_USER_ID' => Yii::t('app', 'Socserv  User '),
            'PROVIDER' => Yii::t('app', 'Provider'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'INSERT_DATE' => Yii::t('app', 'Insert  Date'),
            'SUCCES_SENT' => Yii::t('app', 'Succes  Sent'),
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
