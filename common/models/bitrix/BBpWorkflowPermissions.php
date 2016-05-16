<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_workflow_permissions".
 *
 * @property integer $ID
 * @property string $WORKFLOW_ID
 * @property string $OBJECT_ID
 * @property string $PERMISSION
 */
class BBpWorkflowPermissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_workflow_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WORKFLOW_ID', 'OBJECT_ID', 'PERMISSION'], 'required'],
            [['WORKFLOW_ID'], 'string', 'max' => 32],
            [['OBJECT_ID', 'PERMISSION'], 'string', 'max' => 64]
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
            'OBJECT_ID' => Yii::t('app', 'Object '),
            'PERMISSION' => Yii::t('app', 'Permission'),
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
