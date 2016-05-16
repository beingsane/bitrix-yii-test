<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property string $ACTIVE
 * @property integer $OWNER_ID
 * @property integer $SOCNET_GROUP_ID
 * @property string $URL
 * @property string $REAL_URL
 * @property integer $GROUP_ID
 * @property string $ENABLE_COMMENTS
 * @property string $ENABLE_IMG_VERIF
 * @property string $ENABLE_RSS
 * @property integer $LAST_POST_ID
 * @property string $LAST_POST_DATE
 * @property string $AUTO_GROUPS
 * @property string $EMAIL_NOTIFY
 * @property string $ALLOW_HTML
 * @property string $SEARCH_INDEX
 * @property string $USE_SOCNET
 */
class BBlog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'DATE_CREATE', 'DATE_UPDATE', 'URL', 'GROUP_ID'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['DATE_CREATE', 'DATE_UPDATE', 'LAST_POST_DATE'], 'safe'],
            [['OWNER_ID', 'SOCNET_GROUP_ID', 'GROUP_ID', 'LAST_POST_ID'], 'integer'],
            [['NAME', 'URL', 'REAL_URL', 'AUTO_GROUPS'], 'string', 'max' => 255],
            [['ACTIVE', 'ENABLE_COMMENTS', 'ENABLE_IMG_VERIF', 'ENABLE_RSS', 'EMAIL_NOTIFY', 'ALLOW_HTML', 'SEARCH_INDEX', 'USE_SOCNET'], 'string', 'max' => 1],
            [['URL'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
            'URL' => Yii::t('app', 'Url'),
            'REAL_URL' => Yii::t('app', 'Real  Url'),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'ENABLE_COMMENTS' => Yii::t('app', 'Enable  Comments'),
            'ENABLE_IMG_VERIF' => Yii::t('app', 'Enable  Img  Verif'),
            'ENABLE_RSS' => Yii::t('app', 'Enable  Rss'),
            'LAST_POST_ID' => Yii::t('app', 'Last  Post '),
            'LAST_POST_DATE' => Yii::t('app', 'Last  Post  Date'),
            'AUTO_GROUPS' => Yii::t('app', 'Auto  Groups'),
            'EMAIL_NOTIFY' => Yii::t('app', 'Email  Notify'),
            'ALLOW_HTML' => Yii::t('app', 'Allow  Html'),
            'SEARCH_INDEX' => Yii::t('app', 'Search  Index'),
            'USE_SOCNET' => Yii::t('app', 'Use  Socnet'),
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
