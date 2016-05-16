<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_section".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $XML_ID
 * @property string $EXTERNAL_ID
 * @property string $ACTIVE
 * @property string $DESCRIPTION
 * @property string $COLOR
 * @property string $TEXT_COLOR
 * @property string $EXPORT
 * @property integer $SORT
 * @property string $CAL_TYPE
 * @property integer $OWNER_ID
 * @property integer $CREATED_BY
 * @property integer $PARENT_ID
 * @property string $DATE_CREATE
 * @property string $TIMESTAMP_X
 * @property string $DAV_EXCH_CAL
 * @property string $DAV_EXCH_MOD
 * @property string $CAL_DAV_CON
 * @property string $CAL_DAV_CAL
 * @property string $CAL_DAV_MOD
 * @property string $IS_EXCHANGE
 */
class BCalendarSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DESCRIPTION'], 'string'],
            [['SORT', 'OWNER_ID', 'CREATED_BY', 'PARENT_ID'], 'integer'],
            [['CREATED_BY'], 'required'],
            [['DATE_CREATE', 'TIMESTAMP_X'], 'safe'],
            [['NAME', 'EXPORT', 'DAV_EXCH_CAL', 'DAV_EXCH_MOD', 'CAL_DAV_CON', 'CAL_DAV_CAL', 'CAL_DAV_MOD'], 'string', 'max' => 255],
            [['XML_ID', 'EXTERNAL_ID', 'CAL_TYPE'], 'string', 'max' => 100],
            [['ACTIVE', 'IS_EXCHANGE'], 'string', 'max' => 1],
            [['COLOR', 'TEXT_COLOR'], 'string', 'max' => 10]
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
            'XML_ID' => Yii::t('app', 'Xml '),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'COLOR' => Yii::t('app', 'Color'),
            'TEXT_COLOR' => Yii::t('app', 'Text  Color'),
            'EXPORT' => Yii::t('app', 'Export'),
            'SORT' => Yii::t('app', 'Sort'),
            'CAL_TYPE' => Yii::t('app', 'Cal  Type'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DAV_EXCH_CAL' => Yii::t('app', 'Dav  Exch  Cal'),
            'DAV_EXCH_MOD' => Yii::t('app', 'Dav  Exch  Mod'),
            'CAL_DAV_CON' => Yii::t('app', 'Cal  Dav  Con'),
            'CAL_DAV_CAL' => Yii::t('app', 'Cal  Dav  Cal'),
            'CAL_DAV_MOD' => Yii::t('app', 'Cal  Dav  Mod'),
            'IS_EXCHANGE' => Yii::t('app', 'Is  Exchange'),
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
