<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_stored_auth".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $DATE_REG
 * @property string $LAST_AUTH
 * @property string $STORED_HASH
 * @property string $TEMP_HASH
 * @property string $IP_ADDR
 */
class BUserStoredAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_stored_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'DATE_REG', 'LAST_AUTH', 'STORED_HASH', 'IP_ADDR'], 'required'],
            [['USER_ID', 'IP_ADDR'], 'integer'],
            [['DATE_REG', 'LAST_AUTH'], 'safe'],
            [['STORED_HASH'], 'string', 'max' => 32],
            [['TEMP_HASH'], 'string', 'max' => 1]
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
            'DATE_REG' => Yii::t('app', 'Date  Reg'),
            'LAST_AUTH' => Yii::t('app', 'Last  Auth'),
            'STORED_HASH' => Yii::t('app', 'Stored  Hash'),
            'TEMP_HASH' => Yii::t('app', 'Temp  Hash'),
            'IP_ADDR' => Yii::t('app', 'Ip  Addr'),
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
