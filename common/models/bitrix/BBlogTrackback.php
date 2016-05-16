<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_trackback".
 *
 * @property integer $ID
 * @property string $TITLE
 * @property string $URL
 * @property string $PREVIEW_TEXT
 * @property string $BLOG_NAME
 * @property string $POST_DATE
 * @property integer $BLOG_ID
 * @property integer $POST_ID
 */
class BBlogTrackback extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_trackback';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TITLE', 'URL', 'PREVIEW_TEXT', 'POST_DATE', 'BLOG_ID', 'POST_ID'], 'required'],
            [['PREVIEW_TEXT'], 'string'],
            [['POST_DATE'], 'safe'],
            [['BLOG_ID', 'POST_ID'], 'integer'],
            [['TITLE', 'URL', 'BLOG_NAME'], 'string', 'max' => 255]
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
            'URL' => Yii::t('app', 'Url'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'BLOG_NAME' => Yii::t('app', 'Blog  Name'),
            'POST_DATE' => Yii::t('app', 'Post  Date'),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'POST_ID' => Yii::t('app', 'Post '),
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
