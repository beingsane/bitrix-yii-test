<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_group_collection_task".
 *
 * @property integer $GROUP_ID
 * @property integer $TASK_ID
 * @property integer $COLLECTION_ID
 */
class BGroupCollectionTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_group_collection_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'TASK_ID', 'COLLECTION_ID'], 'required'],
            [['GROUP_ID', 'TASK_ID', 'COLLECTION_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GROUP_ID' => Yii::t('app', 'Group '),
            'TASK_ID' => Yii::t('app', 'Task '),
            'COLLECTION_ID' => Yii::t('app', 'Collection '),
        ];
    }

    public function getName()
    {
        return $this->GROUP_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'GROUP_ID', 'GROUP_ID');
        return $list;
    }
}
