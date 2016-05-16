<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_move".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $DOCUMENT_ID
 * @property integer $IBLOCK_ELEMENT_ID
 * @property integer $OLD_STATUS_ID
 * @property integer $STATUS_ID
 * @property integer $LOG_ID
 * @property integer $USER_ID
 */
class BWorkflowMove extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_move';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['DOCUMENT_ID', 'IBLOCK_ELEMENT_ID', 'OLD_STATUS_ID', 'STATUS_ID', 'LOG_ID', 'USER_ID'], 'integer']
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
            'DOCUMENT_ID' => Yii::t('app', 'Document '),
            'IBLOCK_ELEMENT_ID' => Yii::t('app', 'Iblock  Element '),
            'OLD_STATUS_ID' => Yii::t('app', 'Old  Status '),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'LOG_ID' => Yii::t('app', 'Log '),
            'USER_ID' => Yii::t('app', 'User '),
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
