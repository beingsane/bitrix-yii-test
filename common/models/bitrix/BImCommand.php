<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_command".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $BOT_ID
 * @property string $APP_ID
 * @property string $COMMAND
 * @property string $COMMON
 * @property string $HIDDEN
 * @property string $EXTRANET_SUPPORT
 * @property string $SONET_SUPPORT
 * @property string $CLASS
 * @property string $METHOD_COMMAND_ADD
 * @property string $METHOD_LANG_GET
 */
class BImCommand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_command';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULE_ID', 'COMMAND'], 'required'],
            [['BOT_ID'], 'integer'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['APP_ID'], 'string', 'max' => 128],
            [['COMMAND', 'CLASS', 'METHOD_COMMAND_ADD', 'METHOD_LANG_GET'], 'string', 'max' => 255],
            [['COMMON', 'HIDDEN', 'EXTRANET_SUPPORT', 'SONET_SUPPORT'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'BOT_ID' => Yii::t('app', 'Bot '),
            'APP_ID' => Yii::t('app', 'App '),
            'COMMAND' => Yii::t('app', 'Command'),
            'COMMON' => Yii::t('app', 'Common'),
            'HIDDEN' => Yii::t('app', 'Hidden'),
            'EXTRANET_SUPPORT' => Yii::t('app', 'Extranet  Support'),
            'SONET_SUPPORT' => Yii::t('app', 'Sonet  Support'),
            'CLASS' => Yii::t('app', 'Class'),
            'METHOD_COMMAND_ADD' => Yii::t('app', 'Method  Command  Add'),
            'METHOD_LANG_GET' => Yii::t('app', 'Method  Lang  Get'),
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
