<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $IBLOCK_TYPE_ID
 * @property string $LID
 * @property string $CODE
 * @property string $NAME
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $LIST_PAGE_URL
 * @property string $DETAIL_PAGE_URL
 * @property string $SECTION_PAGE_URL
 * @property string $CANONICAL_PAGE_URL
 * @property integer $PICTURE
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property integer $RSS_TTL
 * @property string $RSS_ACTIVE
 * @property string $RSS_FILE_ACTIVE
 * @property integer $RSS_FILE_LIMIT
 * @property integer $RSS_FILE_DAYS
 * @property string $RSS_YANDEX_ACTIVE
 * @property string $XML_ID
 * @property string $TMP_ID
 * @property string $INDEX_ELEMENT
 * @property string $INDEX_SECTION
 * @property string $WORKFLOW
 * @property string $BIZPROC
 * @property string $SECTION_CHOOSER
 * @property string $LIST_MODE
 * @property string $RIGHTS_MODE
 * @property string $SECTION_PROPERTY
 * @property string $PROPERTY_INDEX
 * @property integer $VERSION
 * @property integer $LAST_CONV_ELEMENT
 * @property integer $SOCNET_GROUP_ID
 * @property string $EDIT_FILE_BEFORE
 * @property string $EDIT_FILE_AFTER
 * @property string $SECTIONS_NAME
 * @property string $SECTION_NAME
 * @property string $ELEMENTS_NAME
 * @property string $ELEMENT_NAME
 */
class BIblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'IBLOCK_TYPE_ID', 'LID', 'NAME'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['SORT', 'PICTURE', 'RSS_TTL', 'RSS_FILE_LIMIT', 'RSS_FILE_DAYS', 'VERSION', 'LAST_CONV_ELEMENT', 'SOCNET_GROUP_ID'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['IBLOCK_TYPE_ID', 'CODE'], 'string', 'max' => 50],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'LIST_PAGE_URL', 'DETAIL_PAGE_URL', 'SECTION_PAGE_URL', 'CANONICAL_PAGE_URL', 'XML_ID', 'EDIT_FILE_BEFORE', 'EDIT_FILE_AFTER'], 'string', 'max' => 255],
            [['ACTIVE', 'RSS_ACTIVE', 'RSS_FILE_ACTIVE', 'RSS_YANDEX_ACTIVE', 'INDEX_ELEMENT', 'INDEX_SECTION', 'WORKFLOW', 'BIZPROC', 'SECTION_CHOOSER', 'LIST_MODE', 'RIGHTS_MODE', 'SECTION_PROPERTY', 'PROPERTY_INDEX'], 'string', 'max' => 1],
            [['DESCRIPTION_TYPE'], 'string', 'max' => 4],
            [['TMP_ID'], 'string', 'max' => 40],
            [['SECTIONS_NAME', 'SECTION_NAME', 'ELEMENTS_NAME', 'ELEMENT_NAME'], 'string', 'max' => 100]
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
            'IBLOCK_TYPE_ID' => Yii::t('app', 'Iblock  Type '),
            'LID' => Yii::t('app', 'Lid'),
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'LIST_PAGE_URL' => Yii::t('app', 'List  Page  Url'),
            'DETAIL_PAGE_URL' => Yii::t('app', 'Detail  Page  Url'),
            'SECTION_PAGE_URL' => Yii::t('app', 'Section  Page  Url'),
            'CANONICAL_PAGE_URL' => Yii::t('app', 'Canonical  Page  Url'),
            'PICTURE' => Yii::t('app', 'Picture'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'RSS_TTL' => Yii::t('app', 'Rss  Ttl'),
            'RSS_ACTIVE' => Yii::t('app', 'Rss  Active'),
            'RSS_FILE_ACTIVE' => Yii::t('app', 'Rss  File  Active'),
            'RSS_FILE_LIMIT' => Yii::t('app', 'Rss  File  Limit'),
            'RSS_FILE_DAYS' => Yii::t('app', 'Rss  File  Days'),
            'RSS_YANDEX_ACTIVE' => Yii::t('app', 'Rss  Yandex  Active'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'INDEX_ELEMENT' => Yii::t('app', 'Index  Element'),
            'INDEX_SECTION' => Yii::t('app', 'Index  Section'),
            'WORKFLOW' => Yii::t('app', 'Workflow'),
            'BIZPROC' => Yii::t('app', 'Bizproc'),
            'SECTION_CHOOSER' => Yii::t('app', 'Section  Chooser'),
            'LIST_MODE' => Yii::t('app', 'List  Mode'),
            'RIGHTS_MODE' => Yii::t('app', 'Rights  Mode'),
            'SECTION_PROPERTY' => Yii::t('app', 'Section  Property'),
            'PROPERTY_INDEX' => Yii::t('app', 'Property  Index'),
            'VERSION' => Yii::t('app', 'Version'),
            'LAST_CONV_ELEMENT' => Yii::t('app', 'Last  Conv  Element'),
            'SOCNET_GROUP_ID' => Yii::t('app', 'Socnet  Group '),
            'EDIT_FILE_BEFORE' => Yii::t('app', 'Edit  File  Before'),
            'EDIT_FILE_AFTER' => Yii::t('app', 'Edit  File  After'),
            'SECTIONS_NAME' => Yii::t('app', 'Sections  Name'),
            'SECTION_NAME' => Yii::t('app', 'Section  Name'),
            'ELEMENTS_NAME' => Yii::t('app', 'Elements  Name'),
            'ELEMENT_NAME' => Yii::t('app', 'Element  Name'),
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
