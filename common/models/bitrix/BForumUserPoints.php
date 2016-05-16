<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_user_points".
 *
 * @property integer $FROM_USER_ID
 * @property integer $TO_USER_ID
 * @property integer $POINTS
 * @property string $DATE_UPDATE
 */
class BForumUserPoints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_user_points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FROM_USER_ID', 'TO_USER_ID'], 'required'],
            [['FROM_USER_ID', 'TO_USER_ID', 'POINTS'], 'integer'],
            [['DATE_UPDATE'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FROM_USER_ID' => Yii::t('app', 'From  User '),
            'TO_USER_ID' => Yii::t('app', 'To  User '),
            'POINTS' => Yii::t('app', 'Points'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
        ];
    }

    public function getName()
    {
        return $this->FROM_USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'FROM_USER_ID', 'FROM_USER_ID');
        return $list;
    }
}
