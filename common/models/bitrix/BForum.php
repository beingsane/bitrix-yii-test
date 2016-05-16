<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum".
 *
 * @property integer $ID
 * @property integer $FORUM_GROUP_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $SORT
 * @property string $ACTIVE
 * @property string $ALLOW_HTML
 * @property string $ALLOW_ANCHOR
 * @property string $ALLOW_BIU
 * @property string $ALLOW_IMG
 * @property string $ALLOW_VIDEO
 * @property string $ALLOW_LIST
 * @property string $ALLOW_QUOTE
 * @property string $ALLOW_CODE
 * @property string $ALLOW_FONT
 * @property string $ALLOW_SMILES
 * @property string $ALLOW_UPLOAD
 * @property string $ALLOW_TABLE
 * @property string $ALLOW_ALIGN
 * @property string $ALLOW_UPLOAD_EXT
 * @property string $ALLOW_MOVE_TOPIC
 * @property string $ALLOW_TOPIC_TITLED
 * @property string $ALLOW_NL2BR
 * @property string $ALLOW_SIGNATURE
 * @property string $PATH2FORUM_MESSAGE
 * @property string $ASK_GUEST_EMAIL
 * @property string $USE_CAPTCHA
 * @property string $INDEXATION
 * @property string $DEDUPLICATION
 * @property string $MODERATION
 * @property string $ORDER_BY
 * @property string $ORDER_DIRECTION
 * @property string $LID
 * @property integer $TOPICS
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
 * @property string $EVENT1
 * @property string $EVENT2
 * @property string $EVENT3
 * @property string $HTML
 * @property string $XML_ID
 */
class BForum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_GROUP_ID', 'SORT', 'TOPICS', 'POSTS', 'LAST_POSTER_ID', 'LAST_MESSAGE_ID', 'POSTS_UNAPPROVED', 'ABS_LAST_POSTER_ID', 'ABS_LAST_MESSAGE_ID'], 'integer'],
            [['NAME'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['LAST_POST_DATE', 'ABS_LAST_POST_DATE'], 'safe'],
            [['NAME', 'ALLOW_UPLOAD_EXT', 'PATH2FORUM_MESSAGE', 'LAST_POSTER_NAME', 'ABS_LAST_POSTER_NAME', 'EVENT1', 'EVENT2', 'EVENT3', 'HTML', 'XML_ID'], 'string', 'max' => 255],
            [['ACTIVE', 'ALLOW_HTML', 'ALLOW_ANCHOR', 'ALLOW_BIU', 'ALLOW_IMG', 'ALLOW_VIDEO', 'ALLOW_LIST', 'ALLOW_QUOTE', 'ALLOW_CODE', 'ALLOW_FONT', 'ALLOW_SMILES', 'ALLOW_UPLOAD', 'ALLOW_TABLE', 'ALLOW_ALIGN', 'ALLOW_MOVE_TOPIC', 'ALLOW_TOPIC_TITLED', 'ALLOW_NL2BR', 'ALLOW_SIGNATURE', 'ASK_GUEST_EMAIL', 'USE_CAPTCHA', 'INDEXATION', 'DEDUPLICATION', 'MODERATION', 'ORDER_BY'], 'string', 'max' => 1],
            [['ORDER_DIRECTION'], 'string', 'max' => 4],
            [['LID'], 'string', 'max' => 2]
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
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ALLOW_HTML' => Yii::t('app', 'Allow  Html'),
            'ALLOW_ANCHOR' => Yii::t('app', 'Allow  Anchor'),
            'ALLOW_BIU' => Yii::t('app', 'Allow  Biu'),
            'ALLOW_IMG' => Yii::t('app', 'Allow  Img'),
            'ALLOW_VIDEO' => Yii::t('app', 'Allow  Video'),
            'ALLOW_LIST' => Yii::t('app', 'Allow  List'),
            'ALLOW_QUOTE' => Yii::t('app', 'Allow  Quote'),
            'ALLOW_CODE' => Yii::t('app', 'Allow  Code'),
            'ALLOW_FONT' => Yii::t('app', 'Allow  Font'),
            'ALLOW_SMILES' => Yii::t('app', 'Allow  Smiles'),
            'ALLOW_UPLOAD' => Yii::t('app', 'Allow  Upload'),
            'ALLOW_TABLE' => Yii::t('app', 'Allow  Table'),
            'ALLOW_ALIGN' => Yii::t('app', 'Allow  Align'),
            'ALLOW_UPLOAD_EXT' => Yii::t('app', 'Allow  Upload  Ext'),
            'ALLOW_MOVE_TOPIC' => Yii::t('app', 'Allow  Move  Topic'),
            'ALLOW_TOPIC_TITLED' => Yii::t('app', 'Allow  Topic  Titled'),
            'ALLOW_NL2BR' => Yii::t('app', 'Allow  Nl2 Br'),
            'ALLOW_SIGNATURE' => Yii::t('app', 'Allow  Signature'),
            'PATH2FORUM_MESSAGE' => Yii::t('app', 'Path2 Forum  Message'),
            'ASK_GUEST_EMAIL' => Yii::t('app', 'Ask  Guest  Email'),
            'USE_CAPTCHA' => Yii::t('app', 'Use  Captcha'),
            'INDEXATION' => Yii::t('app', 'Indexation'),
            'DEDUPLICATION' => Yii::t('app', 'Deduplication'),
            'MODERATION' => Yii::t('app', 'Moderation'),
            'ORDER_BY' => Yii::t('app', 'Order  By'),
            'ORDER_DIRECTION' => Yii::t('app', 'Order  Direction'),
            'LID' => Yii::t('app', 'Lid'),
            'TOPICS' => Yii::t('app', 'Topics'),
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
            'EVENT1' => Yii::t('app', 'Event1'),
            'EVENT2' => Yii::t('app', 'Event2'),
            'EVENT3' => Yii::t('app', 'Event3'),
            'HTML' => Yii::t('app', 'Html'),
            'XML_ID' => Yii::t('app', 'Xml '),
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
