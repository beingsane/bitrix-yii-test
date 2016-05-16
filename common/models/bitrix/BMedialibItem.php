<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_medialib_item".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $ITEM_TYPE
 * @property string $DESCRIPTION
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property integer $SOURCE_ID
 * @property string $KEYWORDS
 * @property string $SEARCHABLE_CONTENT
 */
class BMedialibItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_medialib_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'ITEM_TYPE', 'DATE_CREATE', 'DATE_UPDATE', 'SOURCE_ID'], 'required'],
            [['DESCRIPTION', 'SEARCHABLE_CONTENT'], 'string'],
            [['DATE_CREATE', 'DATE_UPDATE'], 'safe'],
            [['SOURCE_ID'], 'integer'],
            [['NAME', 'KEYWORDS'], 'string', 'max' => 255],
            [['ITEM_TYPE'], 'string', 'max' => 30]
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
            'ITEM_TYPE' => Yii::t('app', 'Item  Type'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'SOURCE_ID' => Yii::t('app', 'Source '),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'SEARCHABLE_CONTENT' => Yii::t('app', 'Searchable  Content'),
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
