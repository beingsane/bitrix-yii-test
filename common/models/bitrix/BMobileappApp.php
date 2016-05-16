<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mobileapp_app".
 *
 * @property string $CODE
 * @property string $SHORT_NAME
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $FILES
 * @property string $LAUNCH_ICONS
 * @property string $LAUNCH_SCREENS
 * @property string $FOLDER
 * @property string $DATE_CREATE
 */
class BMobileappApp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mobileapp_app';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE', 'SHORT_NAME', 'NAME', 'DESCRIPTION', 'FILES', 'LAUNCH_ICONS', 'LAUNCH_SCREENS', 'FOLDER', 'DATE_CREATE'], 'required'],
            [['DESCRIPTION', 'FILES', 'LAUNCH_ICONS', 'LAUNCH_SCREENS'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['CODE', 'SHORT_NAME', 'NAME', 'FOLDER'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODE' => Yii::t('app', 'Code'),
            'SHORT_NAME' => Yii::t('app', 'Short  Name'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'FILES' => Yii::t('app', 'Files'),
            'LAUNCH_ICONS' => Yii::t('app', 'Launch  Icons'),
            'LAUNCH_SCREENS' => Yii::t('app', 'Launch  Screens'),
            'FOLDER' => Yii::t('app', 'Folder'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CODE', 'NAME');
        return $list;
    }
}
