<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sticker".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $PAGE_URL
 * @property string $PAGE_TITLE
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property integer $MODIFIED_BY
 * @property integer $CREATED_BY
 * @property string $PERSONAL
 * @property string $CONTENT
 * @property integer $POS_TOP
 * @property integer $POS_LEFT
 * @property integer $WIDTH
 * @property integer $HEIGHT
 * @property integer $COLOR
 * @property string $COLLAPSED
 * @property string $COMPLETED
 * @property string $CLOSED
 * @property string $DELETED
 * @property integer $MARKER_TOP
 * @property integer $MARKER_LEFT
 * @property integer $MARKER_WIDTH
 * @property integer $MARKER_HEIGHT
 * @property string $MARKER_ADJUST
 */
class BSticker extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sticker';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PAGE_URL', 'PAGE_TITLE', 'DATE_CREATE', 'DATE_UPDATE', 'MODIFIED_BY', 'CREATED_BY'], 'required'],
            [['DATE_CREATE', 'DATE_UPDATE'], 'safe'],
            [['MODIFIED_BY', 'CREATED_BY', 'POS_TOP', 'POS_LEFT', 'WIDTH', 'HEIGHT', 'COLOR', 'MARKER_TOP', 'MARKER_LEFT', 'MARKER_WIDTH', 'MARKER_HEIGHT'], 'integer'],
            [['CONTENT', 'MARKER_ADJUST'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['PAGE_URL', 'PAGE_TITLE'], 'string', 'max' => 255],
            [['PERSONAL', 'COLLAPSED', 'COMPLETED', 'CLOSED', 'DELETED'], 'string', 'max' => 1]
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
            'PAGE_URL' => Yii::t('app', 'Page  Url'),
            'PAGE_TITLE' => Yii::t('app', 'Page  Title'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'PERSONAL' => Yii::t('app', 'Personal'),
            'CONTENT' => Yii::t('app', 'Content'),
            'POS_TOP' => Yii::t('app', 'Pos  Top'),
            'POS_LEFT' => Yii::t('app', 'Pos  Left'),
            'WIDTH' => Yii::t('app', 'Width'),
            'HEIGHT' => Yii::t('app', 'Height'),
            'COLOR' => Yii::t('app', 'Color'),
            'COLLAPSED' => Yii::t('app', 'Collapsed'),
            'COMPLETED' => Yii::t('app', 'Completed'),
            'CLOSED' => Yii::t('app', 'Closed'),
            'DELETED' => Yii::t('app', 'Deleted'),
            'MARKER_TOP' => Yii::t('app', 'Marker  Top'),
            'MARKER_LEFT' => Yii::t('app', 'Marker  Left'),
            'MARKER_WIDTH' => Yii::t('app', 'Marker  Width'),
            'MARKER_HEIGHT' => Yii::t('app', 'Marker  Height'),
            'MARKER_ADJUST' => Yii::t('app', 'Marker  Adjust'),
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
