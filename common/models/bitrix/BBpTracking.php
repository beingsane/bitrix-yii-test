<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_tracking".
 *
 * @property integer $ID
 * @property string $WORKFLOW_ID
 * @property integer $TYPE
 * @property string $MODIFIED
 * @property string $ACTION_NAME
 * @property string $ACTION_TITLE
 * @property integer $EXECUTION_STATUS
 * @property integer $EXECUTION_RESULT
 * @property string $ACTION_NOTE
 * @property integer $MODIFIED_BY
 */
class BBpTracking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_tracking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WORKFLOW_ID', 'TYPE', 'MODIFIED', 'ACTION_NAME'], 'required'],
            [['TYPE', 'EXECUTION_STATUS', 'EXECUTION_RESULT', 'MODIFIED_BY'], 'integer'],
            [['MODIFIED'], 'safe'],
            [['ACTION_NOTE'], 'string'],
            [['WORKFLOW_ID'], 'string', 'max' => 32],
            [['ACTION_NAME'], 'string', 'max' => 128],
            [['ACTION_TITLE'], 'string', 'max' => 255]
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
            'TYPE' => Yii::t('app', 'Type'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'ACTION_NAME' => Yii::t('app', 'Action  Name'),
            'ACTION_TITLE' => Yii::t('app', 'Action  Title'),
            'EXECUTION_STATUS' => Yii::t('app', 'Execution  Status'),
            'EXECUTION_RESULT' => Yii::t('app', 'Execution  Result'),
            'ACTION_NOTE' => Yii::t('app', 'Action  Note'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
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
