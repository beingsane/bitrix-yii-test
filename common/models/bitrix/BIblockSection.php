<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_section".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 * @property integer $IBLOCK_ID
 * @property integer $IBLOCK_SECTION_ID
 * @property string $ACTIVE
 * @property string $GLOBAL_ACTIVE
 * @property integer $SORT
 * @property string $NAME
 * @property integer $PICTURE
 * @property integer $LEFT_MARGIN
 * @property integer $RIGHT_MARGIN
 * @property integer $DEPTH_LEVEL
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property string $SEARCHABLE_CONTENT
 * @property string $CODE
 * @property string $XML_ID
 * @property string $TMP_ID
 * @property integer $DETAIL_PICTURE
 * @property integer $SOCNET_GROUP_ID
 */
class BIblockSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'IBLOCK_ID', 'NAME'], 'required'],
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['MODIFIED_BY', 'CREATED_BY', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'SORT', 'PICTURE', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'DEPTH_LEVEL', 'DETAIL_PICTURE', 'SOCNET_GROUP_ID'], 'integer'],
            [['DESCRIPTION', 'SEARCHABLE_CONTENT'], 'string'],
            [['ACTIVE', 'GLOBAL_ACTIVE'], 'string', 'max' => 1],
            [['NAME', 'CODE', 'XML_ID'], 'string', 'max' => 255],
            [['DESCRIPTION_TYPE'], 'string', 'max' => 4],
            [['TMP_ID'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'IBLOCK_SECTION_ID' => Yii::t('app', 'Iblock  Section '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'GLOBAL_ACTIVE' => Yii::t('app', 'Global  Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'PICTURE' => Yii::t('app', 'Picture'),
            'LEFT_MARGIN' => Yii::t('app', 'Left  Margin'),
            'RIGHT_MARGIN' => Yii::t('app', 'Right  Margin'),
            'DEPTH_LEVEL' => Yii::t('app', 'Depth  Level'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'SEARCHABLE_CONTENT' => Yii::t('app', 'Searchable  Content'),
            'CODE' => Yii::t('app', 'Code'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
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
