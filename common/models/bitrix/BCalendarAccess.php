<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_access".
 *
 * @property string $ACCESS_CODE
 * @property integer $TASK_ID
 * @property string $SECT_ID
 */
class BCalendarAccess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ACCESS_CODE', 'TASK_ID', 'SECT_ID'], 'required'],
            [['TASK_ID'], 'integer'],
            [['ACCESS_CODE', 'SECT_ID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ACCESS_CODE' => Yii::t('app', 'Access  Code'),
            'TASK_ID' => Yii::t('app', 'Task '),
            'SECT_ID' => Yii::t('app', 'Sect '),
        ];
    }

    public function getName()
    {
        return $this->ACCESS_CODE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ACCESS_CODE', 'ACCESS_CODE');
        return $list;
    }
}
