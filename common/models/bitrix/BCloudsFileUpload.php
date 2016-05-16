<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_clouds_file_upload".
 *
 * @property string $ID
 * @property string $TIMESTAMP_X
 * @property string $FILE_PATH
 * @property string $TMP_FILE
 * @property integer $BUCKET_ID
 * @property integer $PART_SIZE
 * @property integer $PART_NO
 * @property integer $PART_FAIL_COUNTER
 * @property string $NEXT_STEP
 */
class BCloudsFileUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_clouds_file_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TIMESTAMP_X', 'FILE_PATH', 'BUCKET_ID', 'PART_SIZE', 'PART_NO', 'PART_FAIL_COUNTER'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['BUCKET_ID', 'PART_SIZE', 'PART_NO', 'PART_FAIL_COUNTER'], 'integer'],
            [['NEXT_STEP'], 'string'],
            [['ID'], 'string', 'max' => 32],
            [['FILE_PATH', 'TMP_FILE'], 'string', 'max' => 500]
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
            'FILE_PATH' => Yii::t('app', 'File  Path'),
            'TMP_FILE' => Yii::t('app', 'Tmp  File'),
            'BUCKET_ID' => Yii::t('app', 'Bucket '),
            'PART_SIZE' => Yii::t('app', 'Part  Size'),
            'PART_NO' => Yii::t('app', 'Part  No'),
            'PART_FAIL_COUNTER' => Yii::t('app', 'Part  Fail  Counter'),
            'NEXT_STEP' => Yii::t('app', 'Next  Step'),
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
