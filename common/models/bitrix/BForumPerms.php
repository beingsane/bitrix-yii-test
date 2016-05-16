<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_perms".
 *
 * @property integer $ID
 * @property integer $FORUM_ID
 * @property integer $GROUP_ID
 * @property string $PERMISSION
 */
class BForumPerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_perms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'GROUP_ID'], 'required'],
            [['FORUM_ID', 'GROUP_ID'], 'integer'],
            [['PERMISSION'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'PERMISSION' => Yii::t('app', 'Permission'),
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
