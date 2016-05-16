<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_comment".
 *
 * @property integer $ID
 * @property integer $BLOG_ID
 * @property integer $POST_ID
 * @property integer $PARENT_ID
 * @property integer $AUTHOR_ID
 * @property integer $ICON_ID
 * @property string $AUTHOR_NAME
 * @property string $AUTHOR_EMAIL
 * @property string $AUTHOR_IP
 * @property string $AUTHOR_IP1
 * @property string $DATE_CREATE
 * @property string $TITLE
 * @property string $POST_TEXT
 * @property string $PUBLISH_STATUS
 * @property string $HAS_PROPS
 * @property string $SHARE_DEST
 * @property string $PATH
 */
class BBlogComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BLOG_ID', 'POST_ID', 'DATE_CREATE', 'POST_TEXT'], 'required'],
            [['BLOG_ID', 'POST_ID', 'PARENT_ID', 'AUTHOR_ID', 'ICON_ID'], 'integer'],
            [['DATE_CREATE'], 'safe'],
            [['POST_TEXT'], 'string'],
            [['AUTHOR_NAME', 'AUTHOR_EMAIL', 'TITLE', 'SHARE_DEST', 'PATH'], 'string', 'max' => 255],
            [['AUTHOR_IP', 'AUTHOR_IP1'], 'string', 'max' => 20],
            [['PUBLISH_STATUS', 'HAS_PROPS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'POST_ID' => Yii::t('app', 'Post '),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'ICON_ID' => Yii::t('app', 'Icon '),
            'AUTHOR_NAME' => Yii::t('app', 'Author  Name'),
            'AUTHOR_EMAIL' => Yii::t('app', 'Author  Email'),
            'AUTHOR_IP' => Yii::t('app', 'Author  Ip'),
            'AUTHOR_IP1' => Yii::t('app', 'Author  Ip1'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'TITLE' => Yii::t('app', 'Title'),
            'POST_TEXT' => Yii::t('app', 'Post  Text'),
            'PUBLISH_STATUS' => Yii::t('app', 'Publish  Status'),
            'HAS_PROPS' => Yii::t('app', 'Has  Props'),
            'SHARE_DEST' => Yii::t('app', 'Share  Dest'),
            'PATH' => Yii::t('app', 'Path'),
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
