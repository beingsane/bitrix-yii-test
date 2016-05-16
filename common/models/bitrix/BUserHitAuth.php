<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_hit_auth".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $HASH
 * @property string $URL
 * @property string $SITE_ID
 * @property string $TIMESTAMP_X
 */
class BUserHitAuth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_hit_auth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'HASH', 'URL', 'TIMESTAMP_X'], 'required'],
            [['USER_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['HASH'], 'string', 'max' => 32],
            [['URL'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2]
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
            'HASH' => Yii::t('app', 'Hash'),
            'URL' => Yii::t('app', 'Url'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
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
