<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_groups_member".
 *
 * @property integer $LEARNING_GROUP_ID
 * @property integer $USER_ID
 */
class BLearnGroupsMember extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_groups_member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LEARNING_GROUP_ID', 'USER_ID'], 'required'],
            [['LEARNING_GROUP_ID', 'USER_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LEARNING_GROUP_ID' => Yii::t('app', 'Learning  Group '),
            'USER_ID' => Yii::t('app', 'User '),
        ];
    }

    public function getName()
    {
        return $this->LEARNING_GROUP_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LEARNING_GROUP_ID', 'LEARNING_GROUP_ID');
        return $list;
    }
}
