<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_agent".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $SORT
 * @property string $NAME
 * @property string $ACTIVE
 * @property string $LAST_EXEC
 * @property string $NEXT_EXEC
 * @property string $DATE_CHECK
 * @property integer $AGENT_INTERVAL
 * @property string $IS_PERIOD
 * @property integer $USER_ID
 * @property string $RUNNING
 */
class BAgent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_agent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'AGENT_INTERVAL', 'USER_ID'], 'integer'],
            [['NAME'], 'string'],
            [['LAST_EXEC', 'NEXT_EXEC', 'DATE_CHECK'], 'safe'],
            [['NEXT_EXEC'], 'required'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['ACTIVE', 'IS_PERIOD', 'RUNNING'], 'string', 'max' => 1]
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
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'LAST_EXEC' => Yii::t('app', 'Last  Exec'),
            'NEXT_EXEC' => Yii::t('app', 'Next  Exec'),
            'DATE_CHECK' => Yii::t('app', 'Date  Check'),
            'AGENT_INTERVAL' => Yii::t('app', 'Agent  Interval'),
            'IS_PERIOD' => Yii::t('app', 'Is  Period'),
            'USER_ID' => Yii::t('app', 'User '),
            'RUNNING' => Yii::t('app', 'Running'),
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
