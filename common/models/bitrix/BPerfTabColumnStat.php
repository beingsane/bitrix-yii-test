<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_tab_column_stat".
 *
 * @property integer $ID
 * @property string $TABLE_NAME
 * @property string $COLUMN_NAME
 * @property double $TABLE_ROWS
 * @property double $COLUMN_ROWS
 * @property string $VALUE
 */
class BPerfTabColumnStat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_tab_column_stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TABLE_ROWS', 'COLUMN_ROWS'], 'number'],
            [['TABLE_NAME', 'COLUMN_NAME'], 'string', 'max' => 50],
            [['VALUE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'COLUMN_NAME' => Yii::t('app', 'Column  Name'),
            'TABLE_ROWS' => Yii::t('app', 'Table  Rows'),
            'COLUMN_ROWS' => Yii::t('app', 'Column  Rows'),
            'VALUE' => Yii::t('app', 'Value'),
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
