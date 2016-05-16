<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_user_forum".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $FORUM_ID
 * @property string $LAST_VISIT
 * @property string $MAIN_LAST_VISIT
 */
class BForumUserForum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_user_forum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'FORUM_ID'], 'integer'],
            [['LAST_VISIT', 'MAIN_LAST_VISIT'], 'safe']
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
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'LAST_VISIT' => Yii::t('app', 'Last  Visit'),
            'MAIN_LAST_VISIT' => Yii::t('app', 'Main  Last  Visit'),
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
