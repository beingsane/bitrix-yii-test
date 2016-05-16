<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_index_complete".
 *
 * @property integer $ID
 * @property string $BANNED
 * @property string $TABLE_NAME
 * @property string $COLUMN_NAMES
 * @property string $INDEX_NAME
 */
class BPerfIndexComplete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_index_complete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNED'], 'string', 'max' => 1],
            [['TABLE_NAME', 'INDEX_NAME'], 'string', 'max' => 50],
            [['COLUMN_NAMES'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BANNED' => Yii::t('app', 'Banned'),
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'COLUMN_NAMES' => Yii::t('app', 'Column  Names'),
            'INDEX_NAME' => Yii::t('app', 'Index  Name'),
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
