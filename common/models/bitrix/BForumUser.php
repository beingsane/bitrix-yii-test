<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_user".
 *
 * @property string $ID
 * @property integer $USER_ID
 * @property string $ALIAS
 * @property string $DESCRIPTION
 * @property string $IP_ADDRESS
 * @property integer $AVATAR
 * @property integer $NUM_POSTS
 * @property string $INTERESTS
 * @property integer $LAST_POST
 * @property string $ALLOW_POST
 * @property string $LAST_VISIT
 * @property string $DATE_REG
 * @property string $REAL_IP_ADDRESS
 * @property string $SIGNATURE
 * @property string $SHOW_NAME
 * @property integer $RANK_ID
 * @property integer $POINTS
 * @property string $HIDE_FROM_ONLINE
 * @property string $SUBSC_GROUP_MESSAGE
 * @property string $SUBSC_GET_MY_MESSAGE
 */
class BForumUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'LAST_VISIT', 'DATE_REG'], 'required'],
            [['USER_ID', 'AVATAR', 'NUM_POSTS', 'LAST_POST', 'RANK_ID', 'POINTS'], 'integer'],
            [['INTERESTS'], 'string'],
            [['LAST_VISIT', 'DATE_REG'], 'safe'],
            [['ALIAS'], 'string', 'max' => 64],
            [['DESCRIPTION', 'SIGNATURE'], 'string', 'max' => 255],
            [['IP_ADDRESS', 'REAL_IP_ADDRESS'], 'string', 'max' => 128],
            [['ALLOW_POST', 'SHOW_NAME', 'HIDE_FROM_ONLINE', 'SUBSC_GROUP_MESSAGE', 'SUBSC_GET_MY_MESSAGE'], 'string', 'max' => 1],
            [['USER_ID'], 'unique']
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
            'ALIAS' => Yii::t('app', 'Alias'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'IP_ADDRESS' => Yii::t('app', 'Ip  Address'),
            'AVATAR' => Yii::t('app', 'Avatar'),
            'NUM_POSTS' => Yii::t('app', 'Num  Posts'),
            'INTERESTS' => Yii::t('app', 'Interests'),
            'LAST_POST' => Yii::t('app', 'Last  Post'),
            'ALLOW_POST' => Yii::t('app', 'Allow  Post'),
            'LAST_VISIT' => Yii::t('app', 'Last  Visit'),
            'DATE_REG' => Yii::t('app', 'Date  Reg'),
            'REAL_IP_ADDRESS' => Yii::t('app', 'Real  Ip  Address'),
            'SIGNATURE' => Yii::t('app', 'Signature'),
            'SHOW_NAME' => Yii::t('app', 'Show  Name'),
            'RANK_ID' => Yii::t('app', 'Rank '),
            'POINTS' => Yii::t('app', 'Points'),
            'HIDE_FROM_ONLINE' => Yii::t('app', 'Hide  From  Online'),
            'SUBSC_GROUP_MESSAGE' => Yii::t('app', 'Subsc  Group  Message'),
            'SUBSC_GET_MY_MESSAGE' => Yii::t('app', 'Subsc  Get  My  Message'),
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
