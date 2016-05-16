<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_export".
 *
 * @property integer $ID
 * @property string $FILE_NAME
 * @property string $NAME
 * @property string $DEFAULT_PROFILE
 * @property string $IN_MENU
 * @property string $IN_AGENT
 * @property string $IN_CRON
 * @property string $SETUP_VARS
 * @property string $LAST_USE
 * @property string $IS_EXPORT
 * @property string $NEED_EDIT
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $DATE_CREATE
 * @property integer $CREATED_BY
 */
class BCatalogExport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_export';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FILE_NAME', 'NAME'], 'required'],
            [['SETUP_VARS'], 'string'],
            [['LAST_USE', 'TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['MODIFIED_BY', 'CREATED_BY'], 'integer'],
            [['FILE_NAME'], 'string', 'max' => 100],
            [['NAME'], 'string', 'max' => 250],
            [['DEFAULT_PROFILE', 'IN_MENU', 'IN_AGENT', 'IN_CRON', 'IS_EXPORT', 'NEED_EDIT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FILE_NAME' => Yii::t('app', 'File  Name'),
            'NAME' => Yii::t('app', 'Name'),
            'DEFAULT_PROFILE' => Yii::t('app', 'Default  Profile'),
            'IN_MENU' => Yii::t('app', 'In  Menu'),
            'IN_AGENT' => Yii::t('app', 'In  Agent'),
            'IN_CRON' => Yii::t('app', 'In  Cron'),
            'SETUP_VARS' => Yii::t('app', 'Setup  Vars'),
            'LAST_USE' => Yii::t('app', 'Last  Use'),
            'IS_EXPORT' => Yii::t('app', 'Is  Export'),
            'NEED_EDIT' => Yii::t('app', 'Need  Edit'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
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
