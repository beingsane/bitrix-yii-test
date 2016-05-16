<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_task_operation".
 *
 * @property integer $TASK_ID
 * @property integer $OPERATION_ID
 */
class BTaskOperation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_task_operation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TASK_ID', 'OPERATION_ID'], 'required'],
            [['TASK_ID', 'OPERATION_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TASK_ID' => Yii::t('app', 'Task '),
            'OPERATION_ID' => Yii::t('app', 'Operation '),
        ];
    }

    public function getName()
    {
        return $this->TASK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TASK_ID', 'TASK_ID');
        return $list;
    }
}
