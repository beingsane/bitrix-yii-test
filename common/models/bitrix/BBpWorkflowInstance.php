<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_workflow_instance".
 *
 * @property string $ID
 * @property string $WORKFLOW
 * @property integer $STATUS
 * @property string $MODIFIED
 * @property string $OWNER_ID
 * @property string $OWNED_UNTIL
 */
class BBpWorkflowInstance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_workflow_instance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MODIFIED'], 'required'],
            [['WORKFLOW'], 'string'],
            [['STATUS'], 'integer'],
            [['MODIFIED', 'OWNED_UNTIL'], 'safe'],
            [['ID', 'OWNER_ID'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'WORKFLOW' => Yii::t('app', 'Workflow'),
            'STATUS' => Yii::t('app', 'Status'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'OWNED_UNTIL' => Yii::t('app', 'Owned  Until'),
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
