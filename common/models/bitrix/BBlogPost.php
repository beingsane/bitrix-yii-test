<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_post".
 *
 * @property integer $ID
 * @property string $TITLE
 * @property integer $BLOG_ID
 * @property integer $AUTHOR_ID
 * @property string $PREVIEW_TEXT
 * @property string $PREVIEW_TEXT_TYPE
 * @property string $DETAIL_TEXT
 * @property string $DETAIL_TEXT_TYPE
 * @property string $DATE_CREATE
 * @property string $DATE_PUBLISH
 * @property string $KEYWORDS
 * @property string $PUBLISH_STATUS
 * @property string $CATEGORY_ID
 * @property string $ATRIBUTE
 * @property string $ENABLE_TRACKBACK
 * @property string $ENABLE_COMMENTS
 * @property integer $ATTACH_IMG
 * @property integer $NUM_COMMENTS
 * @property integer $NUM_TRACKBACKS
 * @property integer $VIEWS
 * @property integer $FAVORITE_SORT
 * @property string $PATH
 * @property string $CODE
 * @property string $MICRO
 * @property string $HAS_IMAGES
 * @property string $HAS_PROPS
 * @property string $HAS_TAGS
 * @property string $HAS_COMMENT_IMAGES
 * @property string $HAS_SOCNET_ALL
 * @property string $SEO_TITLE
 * @property string $SEO_TAGS
 * @property string $SEO_DESCRIPTION
 */
class BBlogPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TITLE', 'BLOG_ID', 'AUTHOR_ID', 'DETAIL_TEXT', 'DATE_CREATE', 'DATE_PUBLISH'], 'required'],
            [['BLOG_ID', 'AUTHOR_ID', 'ATTACH_IMG', 'NUM_COMMENTS', 'NUM_TRACKBACKS', 'VIEWS', 'FAVORITE_SORT'], 'integer'],
            [['PREVIEW_TEXT', 'DETAIL_TEXT', 'SEO_DESCRIPTION'], 'string'],
            [['DATE_CREATE', 'DATE_PUBLISH'], 'safe'],
            [['TITLE', 'KEYWORDS', 'ATRIBUTE', 'PATH', 'CODE', 'SEO_TITLE', 'SEO_TAGS'], 'string', 'max' => 255],
            [['PREVIEW_TEXT_TYPE', 'DETAIL_TEXT_TYPE'], 'string', 'max' => 4],
            [['PUBLISH_STATUS', 'ENABLE_TRACKBACK', 'ENABLE_COMMENTS', 'MICRO', 'HAS_IMAGES', 'HAS_PROPS', 'HAS_TAGS', 'HAS_COMMENT_IMAGES', 'HAS_SOCNET_ALL'], 'string', 'max' => 1],
            [['CATEGORY_ID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TITLE' => Yii::t('app', 'Title'),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DETAIL_TEXT' => Yii::t('app', 'Detail  Text'),
            'DETAIL_TEXT_TYPE' => Yii::t('app', 'Detail  Text  Type'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_PUBLISH' => Yii::t('app', 'Date  Publish'),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'PUBLISH_STATUS' => Yii::t('app', 'Publish  Status'),
            'CATEGORY_ID' => Yii::t('app', 'Category '),
            'ATRIBUTE' => Yii::t('app', 'Atribute'),
            'ENABLE_TRACKBACK' => Yii::t('app', 'Enable  Trackback'),
            'ENABLE_COMMENTS' => Yii::t('app', 'Enable  Comments'),
            'ATTACH_IMG' => Yii::t('app', 'Attach  Img'),
            'NUM_COMMENTS' => Yii::t('app', 'Num  Comments'),
            'NUM_TRACKBACKS' => Yii::t('app', 'Num  Trackbacks'),
            'VIEWS' => Yii::t('app', 'Views'),
            'FAVORITE_SORT' => Yii::t('app', 'Favorite  Sort'),
            'PATH' => Yii::t('app', 'Path'),
            'CODE' => Yii::t('app', 'Code'),
            'MICRO' => Yii::t('app', 'Micro'),
            'HAS_IMAGES' => Yii::t('app', 'Has  Images'),
            'HAS_PROPS' => Yii::t('app', 'Has  Props'),
            'HAS_TAGS' => Yii::t('app', 'Has  Tags'),
            'HAS_COMMENT_IMAGES' => Yii::t('app', 'Has  Comment  Images'),
            'HAS_SOCNET_ALL' => Yii::t('app', 'Has  Socnet  All'),
            'SEO_TITLE' => Yii::t('app', 'Seo  Title'),
            'SEO_TAGS' => Yii::t('app', 'Seo  Tags'),
            'SEO_DESCRIPTION' => Yii::t('app', 'Seo  Description'),
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
