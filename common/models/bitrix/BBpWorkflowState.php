<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_workflow_state".
 *
 * @property string $ID
 * @property string $MODULE_ID
 * @property string $ENTITY
 * @property string $DOCUMENT_ID
 * @property integer $DOCUMENT_ID_INT
 * @property integer $WORKFLOW_TEMPLATE_ID
 * @property string $STATE
 * @property string $STATE_TITLE
 * @property string $STATE_PARAMETERS
 * @property string $MODIFIED
 * @property string $STARTED
 * @property integer $STARTED_BY
 */
class BBpWorkflowState extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_workflow_state';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ENTITY', 'DOCUMENT_ID', 'DOCUMENT_ID_INT', 'WORKFLOW_TEMPLATE_ID', 'MODIFIED'], 'required'],
            [['DOCUMENT_ID_INT', 'WORKFLOW_TEMPLATE_ID', 'STARTED_BY'], 'integer'],
            [['STATE_PARAMETERS'], 'string'],
            [['MODIFIED', 'STARTED'], 'safe'],
            [['ID', 'MODULE_ID'], 'string', 'max' => 32],
            [['ENTITY'], 'string', 'max' => 64],
            [['DOCUMENT_ID', 'STATE'], 'string', 'max' => 128],
            [['STATE_TITLE'], 'string', 'max' => 255]
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
            'ENTITY' => Yii::t('app', 'Entity'),
            'DOCUMENT_ID' => Yii::t('app', 'Document '),
            'DOCUMENT_ID_INT' => Yii::t('app', 'Document  Id  Int'),
            'WORKFLOW_TEMPLATE_ID' => Yii::t('app', 'Workflow  Template '),
            'STATE' => Yii::t('app', 'State'),
            'STATE_TITLE' => Yii::t('app', 'State  Title'),
            'STATE_PARAMETERS' => Yii::t('app', 'State  Parameters'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'STARTED' => Yii::t('app', 'Started'),
            'STARTED_BY' => Yii::t('app', 'Started  By'),
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
