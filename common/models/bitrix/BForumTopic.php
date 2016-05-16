<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_topic".
 *
 * @property string $ID
 * @property integer $FORUM_ID
 * @property string $TOPIC_ID
 * @property string $TITLE
 * @property string $TITLE_SEO
 * @property string $TAGS
 * @property string $DESCRIPTION
 * @property string $ICON
 * @property string $STATE
 * @property string $APPROVED
 * @property integer $SORT
 * @property integer $VIEWS
 * @property integer $USER_START_ID
 * @property string $USER_START_NAME
 * @property string $START_DATE
 * @property integer $POSTS
 * @property integer $LAST_POSTER_ID
 * @property string $LAST_POSTER_NAME
 * @property string $LAST_POST_DATE
 * @property string $LAST_MESSAGE_ID
 * @property integer $POSTS_UNAPPROVED
 * @property integer $ABS_LAST_POSTER_ID
 * @property string $ABS_LAST_POSTER_NAME
 * @property string $ABS_LAST_POST_DATE
 * @property string $ABS_LAST_MESSAGE_ID
 * @property string $XML_ID
 * @property string $HTML
 * @property integer $SOCNET_GROUP_ID
 * @property integer $OWNER_ID
 */
class BForumTopic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_topic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'TITLE', 'START_DATE', 'LAST_POSTER_NAME', 'LAST_POST_DATE'], 'required'],
            [['FORUM_ID', 'TOPIC_ID', 'SORT', 'VIEWS', 'USER_START_ID', 'POSTS', 'LAST_POSTER_ID', 'LAST_MESSAGE_ID', 'POSTS_UNAPPROVED', 'ABS_LAST_POSTER_ID', 'ABS_LAST_MESSAGE_ID', 'SOCNET_GROUP_ID', 'OWNER_ID'], 'integer'],
            [['START_DATE', 'LAST_POST_DATE', 'ABS_LAST_POST_DATE'], 'safe'],
            [['HTML'], 'string'],
            [['TITLE', 'TITLE_SEO', 'TAGS', 'DESCRIPTION', 'ICON', 'USER_START_NAME', 'LAST_POSTER_NAME', 'ABS_LAST_POSTER_NAME', 'XML_ID'], 'string', 'max' => 255],
            [['STATE', 'APPROVED'], 'string', 'max' => 1]
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
            'TOPIC_ID' => Yii::t('app', 'Topic '),
            'TITLE' => Yii::t('app', 'Title'),
            'TITLE_SEO' => Yii::t('app', 'Title  Seo'),
            'TAGS' => Yii::t('app', 'Tags'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ICON' => Yii::t('app', 'Icon'),
            'STATE' => Yii::t('app', 'State'),
            'APPROVED' => Yii::t('app', 'Approved'),
            'SORT' => Yii::t('app', 'Sort'),
            'VIEWS' => Yii::t('app', 'Views'),
            'USER_START_ID' => Yii::t('app', 'User  Start '),
            'USER_START_NAME' => Yii::t('app', 'User  Start  Name'),
            'START_DATE' => Yii::t('app', 'Start  Date'),
            'POSTS' => Yii::t('app', 'Posts'),
            'LAST_POSTER_ID' => Yii::t('app', 'Last  Poster '),
            'LAST_POSTER_NAME' => Yii::t('app', 'Last  Poster  Name'),
            'LAST_POST_DATE' => Yii::t('app', 'Last  Post  Date'),
            'LAST_MESSAGE_ID' => Yii::t('app', 'Last  Message '),
            'POSTS_UNAPPROVED' => Yii::t('app', 'Posts  Unapproved'),
            'ABS_LAST_POSTER_ID' => Yii::t('app', 'Abs  Last  Poster '),
            'ABS_LAST_POSTER_NAME' => Yii::t('app', 'Abs  Last  Poster  Name'),
            'ABS_LAST_POST_DATE' => Yii::t('app', 'Abs  Last  Post  Date'),
            'ABS_LAST_MESSAGE_ID' => Yii::t('app', 'Abs  Last  Message '),
            'XML_ID' => Yii::t('app', 'Xml '),
            'HTML' => Yii::t('app', 'Html'),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
            'OWNER_ID' => Yii::t('app', 'Owner '),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
