<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_group_lang".
 *
 * @property integer $ID
 * @property integer $FORUM_GROUP_ID
 * @property string $LID
 * @property string $NAME
 * @property string $DESCRIPTION
 */
class BForumGroupLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_group_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_GROUP_ID', 'LID', 'NAME'], 'required'],
            [['FORUM_GROUP_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'DESCRIPTION'], 'string', 'max' => 255],
            [['FORUM_GROUP_ID', 'LID'], 'unique', 'targetAttribute' => ['FORUM_GROUP_ID', 'LID'], 'message' => 'The combination of Forum  Group  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORUM_GROUP_ID' => Yii::t('app', 'Forum  Group '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
