<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_preview".
 *
 * @property integer $ID
 * @property integer $DOCUMENT_ID
 * @property string $TIMESTAMP_X
 * @property string $FILENAME
 */
class BWorkflowPreview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_preview';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOCUMENT_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['FILENAME'], 'string', 'max' => 255]
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
            'FILENAME' => Yii::t('app', 'Filename'),
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
