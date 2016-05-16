<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_file".
 *
 * @property integer $ID
 * @property integer $DOCUMENT_ID
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $TEMP_FILENAME
 * @property string $FILENAME
 * @property integer $FILESIZE
 */
class BWorkflowFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOCUMENT_ID', 'MODIFIED_BY', 'FILESIZE'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['TEMP_FILENAME', 'FILENAME'], 'string', 'max' => 255],
            [['TEMP_FILENAME'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DOCUMENT_ID' => Yii::t('app', 'Document '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'TEMP_FILENAME' => Yii::t('app', 'Temp  Filename'),
            'FILENAME' => Yii::t('app', 'Filename'),
            'FILESIZE' => Yii::t('app', 'Filesize'),
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
