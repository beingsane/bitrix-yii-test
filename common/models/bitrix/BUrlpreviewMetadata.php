<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_urlpreview_metadata".
 *
 * @property integer $ID
 * @property string $URL
 * @property string $TYPE
 * @property string $DATE_INSERT
 * @property string $DATE_EXPIRE
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property integer $IMAGE_ID
 * @property string $IMAGE
 * @property string $EMBED
 * @property string $EXTRA
 */
class BUrlpreviewMetadata extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_urlpreview_metadata';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['URL', 'DATE_INSERT'], 'required'],
            [['DATE_INSERT', 'DATE_EXPIRE'], 'safe'],
            [['DESCRIPTION', 'EMBED', 'EXTRA'], 'string'],
            [['IMAGE_ID'], 'integer'],
            [['URL', 'TITLE'], 'string', 'max' => 200],
            [['TYPE'], 'string', 'max' => 1],
            [['IMAGE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'URL' => Yii::t('app', 'Url'),
            'TYPE' => Yii::t('app', 'Type'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_EXPIRE' => Yii::t('app', 'Date  Expire'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'IMAGE' => Yii::t('app', 'Image'),
            'EMBED' => Yii::t('app', 'Embed'),
            'EXTRA' => Yii::t('app', 'Extra'),
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
