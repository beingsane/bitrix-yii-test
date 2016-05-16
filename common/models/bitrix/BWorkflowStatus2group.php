<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_status2group".
 *
 * @property integer $ID
 * @property integer $STATUS_ID
 * @property integer $GROUP_ID
 * @property integer $PERMISSION_TYPE
 */
class BWorkflowStatus2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_status2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'GROUP_ID', 'PERMISSION_TYPE'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'PERMISSION_TYPE' => Yii::t('app', 'Permission  Type'),
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
