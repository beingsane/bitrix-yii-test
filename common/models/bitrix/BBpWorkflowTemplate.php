<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_workflow_template".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property string $ENTITY
 * @property string $DOCUMENT_TYPE
 * @property integer $AUTO_EXECUTE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $TEMPLATE
 * @property resource $PARAMETERS
 * @property resource $VARIABLES
 * @property string $CONSTANTS
 * @property string $MODIFIED
 * @property string $IS_MODIFIED
 * @property integer $USER_ID
 * @property string $SYSTEM_CODE
 * @property string $ACTIVE
 */
class BBpWorkflowTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_workflow_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY', 'DOCUMENT_TYPE', 'MODIFIED'], 'required'],
            [['AUTO_EXECUTE', 'USER_ID'], 'integer'],
            [['DESCRIPTION', 'TEMPLATE', 'PARAMETERS', 'VARIABLES', 'CONSTANTS'], 'string'],
            [['MODIFIED'], 'safe'],
            [['MODULE_ID'], 'string', 'max' => 32],
            [['ENTITY'], 'string', 'max' => 64],
            [['DOCUMENT_TYPE'], 'string', 'max' => 128],
            [['NAME'], 'string', 'max' => 255],
            [['IS_MODIFIED', 'ACTIVE'], 'string', 'max' => 1],
            [['SYSTEM_CODE'], 'string', 'max' => 50]
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
            'DOCUMENT_TYPE' => Yii::t('app', 'Document  Type'),
            'AUTO_EXECUTE' => Yii::t('app', 'Auto  Execute'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'TEMPLATE' => Yii::t('app', 'Template'),
            'PARAMETERS' => Yii::t('app', 'Parameters'),
            'VARIABLES' => Yii::t('app', 'Variables'),
            'CONSTANTS' => Yii::t('app', 'Constants'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'IS_MODIFIED' => Yii::t('app', 'Is  Modified'),
            'USER_ID' => Yii::t('app', 'User '),
            'SYSTEM_CODE' => Yii::t('app', 'System  Code'),
            'ACTIVE' => Yii::t('app', 'Active'),
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
