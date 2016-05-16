<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_status_group_task".
 *
 * @property string $STATUS_ID
 * @property integer $GROUP_ID
 * @property integer $TASK_ID
 */
class BSaleStatusGroupTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_status_group_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'GROUP_ID', 'TASK_ID'], 'required'],
            [['GROUP_ID', 'TASK_ID'], 'integer'],
            [['STATUS_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_ID' => Yii::t('app', 'Status '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'TASK_ID' => Yii::t('app', 'Task '),
        ];
    }

    public function getName()
    {
        return $this->STATUS_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'STATUS_ID', 'STATUS_ID');
        return $list;
    }
}
