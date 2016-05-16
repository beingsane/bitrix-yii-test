<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_user_right".
 *
 * @property integer $USER_ID
 * @property string $GROUP_CODE
 */
class BSearchUserRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_user_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'GROUP_CODE'], 'required'],
            [['USER_ID'], 'integer'],
            [['GROUP_CODE'], 'string', 'max' => 100],
            [['USER_ID', 'GROUP_CODE'], 'unique', 'targetAttribute' => ['USER_ID', 'GROUP_CODE'], 'message' => 'The combination of User  and Group  Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'GROUP_CODE' => Yii::t('app', 'Group  Code'),
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
