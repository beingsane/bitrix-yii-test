<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_component_params".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $COMPONENT_NAME
 * @property string $TEMPLATE_NAME
 * @property string $REAL_PATH
 * @property string $SEF_MODE
 * @property string $SEF_FOLDER
 * @property integer $START_CHAR
 * @property integer $END_CHAR
 * @property string $PARAMETERS
 */
class BComponentParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_component_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'COMPONENT_NAME', 'REAL_PATH', 'START_CHAR', 'END_CHAR'], 'required'],
            [['START_CHAR', 'END_CHAR'], 'integer'],
            [['PARAMETERS'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['COMPONENT_NAME', 'TEMPLATE_NAME', 'REAL_PATH', 'SEF_FOLDER'], 'string', 'max' => 255],
            [['SEF_MODE'], 'string', 'max' => 1]
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
            'COMPONENT_NAME' => Yii::t('app', 'Component  Name'),
            'TEMPLATE_NAME' => Yii::t('app', 'Template  Name'),
            'REAL_PATH' => Yii::t('app', 'Real  Path'),
            'SEF_MODE' => Yii::t('app', 'Sef  Mode'),
            'SEF_FOLDER' => Yii::t('app', 'Sef  Folder'),
            'START_CHAR' => Yii::t('app', 'Start  Char'),
            'END_CHAR' => Yii::t('app', 'End  Char'),
            'PARAMETERS' => Yii::t('app', 'Parameters'),
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
