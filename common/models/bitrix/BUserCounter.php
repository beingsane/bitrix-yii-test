<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_counter".
 *
 * @property integer $USER_ID
 * @property string $SITE_ID
 * @property string $CODE
 * @property integer $CNT
 * @property string $LAST_DATE
 * @property string $TIMESTAMP_X
 * @property string $TAG
 * @property string $PARAMS
 * @property string $SENT
 */
class BUserCounter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_counter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SITE_ID', 'CODE'], 'required'],
            [['USER_ID', 'CNT'], 'integer'],
            [['LAST_DATE', 'TIMESTAMP_X'], 'safe'],
            [['PARAMS'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['CODE'], 'string', 'max' => 50],
            [['TAG'], 'string', 'max' => 255],
            [['SENT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'CODE' => Yii::t('app', 'Code'),
            'CNT' => Yii::t('app', 'Cnt'),
            'LAST_DATE' => Yii::t('app', 'Last  Date'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TAG' => Yii::t('app', 'Tag'),
            'PARAMS' => Yii::t('app', 'Params'),
            'SENT' => Yii::t('app', 'Sent'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
