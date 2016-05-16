<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_clouds_file_resize".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $ERROR_CODE
 * @property integer $FILE_ID
 * @property string $PARAMS
 * @property string $FROM_PATH
 * @property string $TO_PATH
 */
class BCloudsFileResize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_clouds_file_resize';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['FILE_ID'], 'integer'],
            [['PARAMS'], 'string'],
            [['ERROR_CODE'], 'string', 'max' => 1],
            [['FROM_PATH', 'TO_PATH'], 'string', 'max' => 500]
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
            'ERROR_CODE' => Yii::t('app', 'Error  Code'),
            'FILE_ID' => Yii::t('app', 'File '),
            'PARAMS' => Yii::t('app', 'Params'),
            'FROM_PATH' => Yii::t('app', 'From  Path'),
            'TO_PATH' => Yii::t('app', 'To  Path'),
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
