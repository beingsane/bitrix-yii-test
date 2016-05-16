<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_property".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $IBLOCK_ID
 * @property string $NAME
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $CODE
 * @property string $DEFAULT_VALUE
 * @property string $PROPERTY_TYPE
 * @property integer $ROW_COUNT
 * @property integer $COL_COUNT
 * @property string $LIST_TYPE
 * @property string $MULTIPLE
 * @property string $XML_ID
 * @property string $FILE_TYPE
 * @property integer $MULTIPLE_CNT
 * @property string $TMP_ID
 * @property integer $LINK_IBLOCK_ID
 * @property string $WITH_DESCRIPTION
 * @property string $SEARCHABLE
 * @property string $FILTRABLE
 * @property string $IS_REQUIRED
 * @property integer $VERSION
 * @property string $USER_TYPE
 * @property string $USER_TYPE_SETTINGS
 * @property string $HINT
 */
class BIblockProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'IBLOCK_ID', 'NAME'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['IBLOCK_ID', 'SORT', 'ROW_COUNT', 'COL_COUNT', 'MULTIPLE_CNT', 'LINK_IBLOCK_ID', 'VERSION'], 'integer'],
            [['DEFAULT_VALUE', 'USER_TYPE_SETTINGS'], 'string'],
            [['NAME', 'USER_TYPE', 'HINT'], 'string', 'max' => 255],
            [['ACTIVE', 'PROPERTY_TYPE', 'LIST_TYPE', 'MULTIPLE', 'WITH_DESCRIPTION', 'SEARCHABLE', 'FILTRABLE', 'IS_REQUIRED'], 'string', 'max' => 1],
            [['CODE'], 'string', 'max' => 50],
            [['XML_ID'], 'string', 'max' => 100],
            [['FILE_TYPE'], 'string', 'max' => 200],
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
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'CODE' => Yii::t('app', 'Code'),
            'DEFAULT_VALUE' => Yii::t('app', 'Default  Value'),
            'PROPERTY_TYPE' => Yii::t('app', 'Property  Type'),
            'ROW_COUNT' => Yii::t('app', 'Row  Count'),
            'COL_COUNT' => Yii::t('app', 'Col  Count'),
            'LIST_TYPE' => Yii::t('app', 'List  Type'),
            'MULTIPLE' => Yii::t('app', 'Multiple'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'FILE_TYPE' => Yii::t('app', 'File  Type'),
            'MULTIPLE_CNT' => Yii::t('app', 'Multiple  Cnt'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'LINK_IBLOCK_ID' => Yii::t('app', 'Link  Iblock '),
            'WITH_DESCRIPTION' => Yii::t('app', 'With  Description'),
            'SEARCHABLE' => Yii::t('app', 'Searchable'),
            'FILTRABLE' => Yii::t('app', 'Filtrable'),
            'IS_REQUIRED' => Yii::t('app', 'Is  Required'),
            'VERSION' => Yii::t('app', 'Version'),
            'USER_TYPE' => Yii::t('app', 'User  Type'),
            'USER_TYPE_SETTINGS' => Yii::t('app', 'User  Type  Settings'),
            'HINT' => Yii::t('app', 'Hint'),
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
