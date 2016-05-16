<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_group".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property string $ACTIVE
 * @property string $VISIBLE
 * @property string $OPENED
 * @property integer $SUBJECT_ID
 * @property integer $OWNER_ID
 * @property string $KEYWORDS
 * @property integer $IMAGE_ID
 * @property integer $NUMBER_OF_MEMBERS
 * @property integer $NUMBER_OF_MODERATORS
 * @property string $INITIATE_PERMS
 * @property string $DATE_ACTIVITY
 * @property string $CLOSED
 * @property string $SPAM_PERMS
 */
class BSonetGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'NAME', 'DATE_CREATE', 'DATE_UPDATE', 'SUBJECT_ID', 'OWNER_ID', 'DATE_ACTIVITY'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['DATE_CREATE', 'DATE_UPDATE', 'DATE_ACTIVITY'], 'safe'],
            [['SUBJECT_ID', 'OWNER_ID', 'IMAGE_ID', 'NUMBER_OF_MEMBERS', 'NUMBER_OF_MODERATORS'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['NAME', 'KEYWORDS'], 'string', 'max' => 255],
            [['ACTIVE', 'VISIBLE', 'OPENED', 'INITIATE_PERMS', 'CLOSED', 'SPAM_PERMS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'VISIBLE' => Yii::t('app', 'Visible'),
            'OPENED' => Yii::t('app', 'Opened'),
            'SUBJECT_ID' => Yii::t('app', 'Subject '),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'NUMBER_OF_MEMBERS' => Yii::t('app', 'Number  Of  Members'),
            'NUMBER_OF_MODERATORS' => Yii::t('app', 'Number  Of  Moderators'),
            'INITIATE_PERMS' => Yii::t('app', 'Initiate  Perms'),
            'DATE_ACTIVITY' => Yii::t('app', 'Date  Activity'),
            'CLOSED' => Yii::t('app', 'Closed'),
            'SPAM_PERMS' => Yii::t('app', 'Spam  Perms'),
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
