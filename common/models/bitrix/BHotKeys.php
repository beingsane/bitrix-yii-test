<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_hot_keys".
 *
 * @property integer $ID
 * @property string $KEYS_STRING
 * @property integer $CODE_ID
 * @property integer $USER_ID
 */
class BHotKeys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_hot_keys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['KEYS_STRING', 'CODE_ID', 'USER_ID'], 'required'],
            [['CODE_ID', 'USER_ID'], 'integer'],
            [['KEYS_STRING'], 'string', 'max' => 20],
            [['CODE_ID', 'USER_ID'], 'unique', 'targetAttribute' => ['CODE_ID', 'USER_ID'], 'message' => 'The combination of Code  and User  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'KEYS_STRING' => Yii::t('app', 'Keys  String'),
            'CODE_ID' => Yii::t('app', 'Code '),
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
