<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_workflow_state_identify".
 *
 * @property integer $ID
 * @property string $WORKFLOW_ID
 */
class BBpWorkflowStateIdentify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_workflow_state_identify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WORKFLOW_ID'], 'required'],
            [['WORKFLOW_ID'], 'string', 'max' => 32],
            [['WORKFLOW_ID'], 'unique']
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
