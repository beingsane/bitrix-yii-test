<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_option".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $CATEGORY
 * @property string $NAME
 * @property string $VALUE
 * @property string $COMMON
 */
class BUserOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'integer'],
            [['CATEGORY', 'NAME'], 'required'],
            [['VALUE'], 'string'],
            [['CATEGORY'], 'string', 'max' => 50],
            [['NAME'], 'string', 'max' => 255],
            [['COMMON'], 'string', 'max' => 1]
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
            'CATEGORY' => Yii::t('app', 'Category'),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'COMMON' => Yii::t('app', 'Common'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
