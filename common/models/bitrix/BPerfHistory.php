<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_history".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property double $TOTAL_MARK
 * @property string $ACCELERATOR_ENABLED
 */
class BPerfHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['TOTAL_MARK'], 'number'],
            [['ACCELERATOR_ENABLED'], 'string', 'max' => 1]
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
            'TOTAL_MARK' => Yii::t('app', 'Total  Mark'),
            'ACCELERATOR_ENABLED' => Yii::t('app', 'Accelerator  Enabled'),
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
