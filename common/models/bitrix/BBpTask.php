<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_task".
 *
 * @property integer $ID
 * @property string $WORKFLOW_ID
 * @property string $ACTIVITY
 * @property string $ACTIVITY_NAME
 * @property string $MODIFIED
 * @property string $OVERDUE_DATE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $PARAMETERS
 * @property integer $STATUS
 * @property string $IS_INLINE
 * @property string $DOCUMENT_NAME
 */
class BBpTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WORKFLOW_ID', 'ACTIVITY', 'ACTIVITY_NAME', 'MODIFIED', 'NAME'], 'required'],
            [['MODIFIED', 'OVERDUE_DATE'], 'safe'],
            [['DESCRIPTION', 'PARAMETERS'], 'string'],
            [['STATUS'], 'integer'],
            [['WORKFLOW_ID'], 'string', 'max' => 32],
            [['ACTIVITY', 'ACTIVITY_NAME', 'NAME'], 'string', 'max' => 128],
            [['IS_INLINE'], 'string', 'max' => 1],
            [['DOCUMENT_NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'WORKFLOW_ID' => Yii::t('app', 'Workflow '),
            'ACTIVITY' => Yii::t('app', 'Activity'),
            'ACTIVITY_NAME' => Yii::t('app', 'Activity  Name'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'OVERDUE_DATE' => Yii::t('app', 'Overdue  Date'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'PARAMETERS' => Yii::t('app', 'Parameters'),
            'STATUS' => Yii::t('app', 'Status'),
            'IS_INLINE' => Yii::t('app', 'Is  Inline'),
            'DOCUMENT_NAME' => Yii::t('app', 'Document  Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
