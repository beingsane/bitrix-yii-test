<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_status".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $C_SORT
 * @property string $ACTIVE
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $IS_FINAL
 * @property string $NOTIFY
 */
class BWorkflowStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['C_SORT'], 'integer'],
            [['TITLE'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE', 'IS_FINAL', 'NOTIFY'], 'string', 'max' => 1],
            [['TITLE'], 'string', 'max' => 255]
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
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'IS_FINAL' => Yii::t('app', 'Is  Final'),
            'NOTIFY' => Yii::t('app', 'Notify'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
