<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_image".
 *
 * @property integer $ID
 * @property integer $FILE_ID
 * @property integer $BLOG_ID
 * @property integer $POST_ID
 * @property integer $USER_ID
 * @property string $TIMESTAMP_X
 * @property string $TITLE
 * @property integer $IMAGE_SIZE
 * @property string $IS_COMMENT
 * @property integer $COMMENT_ID
 */
class BBlogImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FILE_ID', 'BLOG_ID', 'POST_ID', 'USER_ID', 'IMAGE_SIZE', 'COMMENT_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['TITLE'], 'string', 'max' => 255],
            [['IS_COMMENT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FILE_ID' => Yii::t('app', 'File '),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'POST_ID' => Yii::t('app', 'Post '),
            'USER_ID' => Yii::t('app', 'User '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TITLE' => Yii::t('app', 'Title'),
            'IMAGE_SIZE' => Yii::t('app', 'Image  Size'),
            'IS_COMMENT' => Yii::t('app', 'Is  Comment'),
            'COMMENT_ID' => Yii::t('app', 'Comment '),
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
