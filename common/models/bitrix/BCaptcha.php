<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_captcha".
 *
 * @property string $ID
 * @property string $CODE
 * @property string $IP
 * @property string $DATE_CREATE
 */
class BCaptcha extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_captcha';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CODE', 'IP', 'DATE_CREATE'], 'required'],
            [['DATE_CREATE'], 'safe'],
            [['ID'], 'string', 'max' => 32],
            [['CODE'], 'string', 'max' => 20],
            [['IP'], 'string', 'max' => 15],
            [['ID'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'IP' => Yii::t('app', 'Ip'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
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
