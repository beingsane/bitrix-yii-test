<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_event".
 *
 * @property integer $ID
 * @property string $EVENT1
 * @property string $EVENT2
 * @property string $MONEY
 * @property string $DATE_ENTER
 * @property string $DATE_CLEANUP
 * @property integer $C_SORT
 * @property integer $COUNTER
 * @property string $ADV_VISIBLE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $KEEP_DAYS
 * @property integer $DYNAMIC_KEEP_DAYS
 * @property string $DIAGRAM_DEFAULT
 */
class BStatEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MONEY'], 'number'],
            [['DATE_ENTER', 'DATE_CLEANUP'], 'safe'],
            [['C_SORT', 'COUNTER', 'KEEP_DAYS', 'DYNAMIC_KEEP_DAYS'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['EVENT1', 'EVENT2'], 'string', 'max' => 166],
            [['ADV_VISIBLE', 'DIAGRAM_DEFAULT'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'EVENT1' => Yii::t('app', 'Event1'),
            'EVENT2' => Yii::t('app', 'Event2'),
            'MONEY' => Yii::t('app', 'Money'),
            'DATE_ENTER' => Yii::t('app', 'Date  Enter'),
            'DATE_CLEANUP' => Yii::t('app', 'Date  Cleanup'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'ADV_VISIBLE' => Yii::t('app', 'Adv  Visible'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'KEEP_DAYS' => Yii::t('app', 'Keep  Days'),
            'DYNAMIC_KEEP_DAYS' => Yii::t('app', 'Dynamic  Keep  Days'),
            'DIAGRAM_DEFAULT' => Yii::t('app', 'Diagram  Default'),
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
