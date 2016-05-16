<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_rights_all".
 *
 * @property string $SUBJECT_ID
 * @property integer $TASK_ID
 */
class BLearnRightsAll extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_rights_all';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUBJECT_ID', 'TASK_ID'], 'required'],
            [['TASK_ID'], 'integer'],
            [['SUBJECT_ID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SUBJECT_ID' => Yii::t('app', 'Subject '),
            'TASK_ID' => Yii::t('app', 'Task '),
        ];
    }

    public function getName()
    {
        return $this->SUBJECT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SUBJECT_ID', 'SUBJECT_ID');
        return $list;
    }
}
