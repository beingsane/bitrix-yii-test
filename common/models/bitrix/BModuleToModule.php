<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_module_to_module".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $SORT
 * @property string $FROM_MODULE_ID
 * @property string $MESSAGE_ID
 * @property string $TO_MODULE_ID
 * @property string $TO_PATH
 * @property string $TO_CLASS
 * @property string $TO_METHOD
 * @property string $TO_METHOD_ARG
 * @property integer $VERSION
 */
class BModuleToModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_module_to_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'FROM_MODULE_ID', 'MESSAGE_ID', 'TO_MODULE_ID'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['SORT', 'VERSION'], 'integer'],
            [['FROM_MODULE_ID', 'TO_MODULE_ID'], 'string', 'max' => 50],
            [['MESSAGE_ID', 'TO_PATH', 'TO_CLASS', 'TO_METHOD', 'TO_METHOD_ARG'], 'string', 'max' => 255]
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
            'SORT' => Yii::t('app', 'Sort'),
            'FROM_MODULE_ID' => Yii::t('app', 'From  Module '),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'TO_MODULE_ID' => Yii::t('app', 'To  Module '),
            'TO_PATH' => Yii::t('app', 'To  Path'),
            'TO_CLASS' => Yii::t('app', 'To  Class'),
            'TO_METHOD' => Yii::t('app', 'To  Method'),
            'TO_METHOD_ARG' => Yii::t('app', 'To  Method  Arg'),
            'VERSION' => Yii::t('app', 'Version'),
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
