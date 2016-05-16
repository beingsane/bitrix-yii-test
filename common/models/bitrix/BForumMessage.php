<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_message".
 *
 * @property string $ID
 * @property integer $FORUM_ID
 * @property string $TOPIC_ID
 * @property string $USE_SMILES
 * @property string $NEW_TOPIC
 * @property string $APPROVED
 * @property string $SOURCE_ID
 * @property string $POST_DATE
 * @property string $POST_MESSAGE
 * @property string $POST_MESSAGE_HTML
 * @property string $POST_MESSAGE_FILTER
 * @property string $POST_MESSAGE_CHECK
 * @property integer $ATTACH_IMG
 * @property string $PARAM1
 * @property integer $PARAM2
 * @property integer $AUTHOR_ID
 * @property string $AUTHOR_NAME
 * @property string $AUTHOR_EMAIL
 * @property string $AUTHOR_IP
 * @property string $AUTHOR_REAL_IP
 * @property integer $GUEST_ID
 * @property integer $EDITOR_ID
 * @property string $EDITOR_NAME
 * @property string $EDITOR_EMAIL
 * @property string $EDIT_REASON
 * @property string $EDIT_DATE
 * @property string $XML_ID
 * @property string $HTML
 * @property string $MAIL_HEADER
 */
class BForumMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'TOPIC_ID', 'POST_DATE'], 'required'],
            [['FORUM_ID', 'TOPIC_ID', 'ATTACH_IMG', 'PARAM2', 'AUTHOR_ID', 'GUEST_ID', 'EDITOR_ID'], 'integer'],
            [['POST_DATE', 'EDIT_DATE'], 'safe'],
            [['POST_MESSAGE', 'POST_MESSAGE_HTML', 'POST_MESSAGE_FILTER', 'EDIT_REASON', 'HTML', 'MAIL_HEADER'], 'string'],
            [['USE_SMILES', 'NEW_TOPIC', 'APPROVED'], 'string', 'max' => 1],
            [['SOURCE_ID', 'AUTHOR_NAME', 'AUTHOR_EMAIL', 'AUTHOR_IP', 'EDITOR_NAME', 'EDITOR_EMAIL', 'XML_ID'], 'string', 'max' => 255],
            [['POST_MESSAGE_CHECK'], 'string', 'max' => 32],
            [['PARAM1'], 'string', 'max' => 2],
            [['AUTHOR_REAL_IP'], 'string', 'max' => 128]
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
            'USE_SMILES' => Yii::t('app', 'Use  Smiles'),
            'NEW_TOPIC' => Yii::t('app', 'New  Topic'),
            'APPROVED' => Yii::t('app', 'Approved'),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'POST_DATE' => Yii::t('app', 'Post  Date'),
            'POST_MESSAGE' => Yii::t('app', 'Post  Message'),
            'POST_MESSAGE_HTML' => Yii::t('app', 'Post  Message  Html'),
            'POST_MESSAGE_FILTER' => Yii::t('app', 'Post  Message  Filter'),
            'POST_MESSAGE_CHECK' => Yii::t('app', 'Post  Message  Check'),
            'ATTACH_IMG' => Yii::t('app', 'Attach  Img'),
            'PARAM1' => Yii::t('app', 'Param1'),
            'PARAM2' => Yii::t('app', 'Param2'),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'AUTHOR_NAME' => Yii::t('app', 'Author  Name'),
            'AUTHOR_EMAIL' => Yii::t('app', 'Author  Email'),
            'AUTHOR_IP' => Yii::t('app', 'Author  Ip'),
            'AUTHOR_REAL_IP' => Yii::t('app', 'Author  Real  Ip'),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'EDITOR_ID' => Yii::t('app', 'Editor '),
            'EDITOR_NAME' => Yii::t('app', 'Editor  Name'),
            'EDITOR_EMAIL' => Yii::t('app', 'Editor  Email'),
            'EDIT_REASON' => Yii::t('app', 'Edit  Reason'),
            'EDIT_DATE' => Yii::t('app', 'Edit  Date'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'HTML' => Yii::t('app', 'Html'),
            'MAIL_HEADER' => Yii::t('app', 'Mail  Header'),
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
