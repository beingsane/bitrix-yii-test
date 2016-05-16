<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_file".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $MODULE_ID
 * @property integer $HEIGHT
 * @property integer $WIDTH
 * @property string $FILE_SIZE
 * @property string $CONTENT_TYPE
 * @property string $SUBDIR
 * @property string $FILE_NAME
 * @property string $ORIGINAL_NAME
 * @property string $DESCRIPTION
 * @property string $HANDLER_ID
 * @property string $EXTERNAL_ID
 */
class BFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'FILE_NAME'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['HEIGHT', 'WIDTH', 'FILE_SIZE'], 'integer'],
            [['MODULE_ID', 'HANDLER_ID', 'EXTERNAL_ID'], 'string', 'max' => 50],
            [['CONTENT_TYPE', 'SUBDIR', 'FILE_NAME', 'ORIGINAL_NAME', 'DESCRIPTION'], 'string', 'max' => 255]
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
            'MODULE_ID' => Yii::t('app', 'Module '),
            'HEIGHT' => Yii::t('app', 'Height'),
            'WIDTH' => Yii::t('app', 'Width'),
            'FILE_SIZE' => Yii::t('app', 'File  Size'),
            'CONTENT_TYPE' => Yii::t('app', 'Content  Type'),
            'SUBDIR' => Yii::t('app', 'Subdir'),
            'FILE_NAME' => Yii::t('app', 'File  Name'),
            'ORIGINAL_NAME' => Yii::t('app', 'Original  Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'HANDLER_ID' => Yii::t('app', 'Handler '),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
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
