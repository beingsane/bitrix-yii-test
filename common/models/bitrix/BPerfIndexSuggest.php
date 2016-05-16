<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_index_suggest".
 *
 * @property integer $ID
 * @property string $SQL_MD5
 * @property integer $SQL_COUNT
 * @property double $SQL_TIME
 * @property string $TABLE_NAME
 * @property string $TABLE_ALIAS
 * @property string $COLUMN_NAMES
 * @property string $SQL_TEXT
 * @property string $SQL_EXPLAIN
 */
class BPerfIndexSuggest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_index_suggest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SQL_COUNT'], 'integer'],
            [['SQL_TIME'], 'number'],
            [['SQL_TEXT', 'SQL_EXPLAIN'], 'string'],
            [['SQL_MD5'], 'string', 'max' => 32],
            [['TABLE_NAME', 'TABLE_ALIAS'], 'string', 'max' => 50],
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
            'SQL_MD5' => Yii::t('app', 'Sql  Md5'),
            'SQL_COUNT' => Yii::t('app', 'Sql  Count'),
            'SQL_TIME' => Yii::t('app', 'Sql  Time'),
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'TABLE_ALIAS' => Yii::t('app', 'Table  Alias'),
            'COLUMN_NAMES' => Yii::t('app', 'Column  Names'),
            'SQL_TEXT' => Yii::t('app', 'Sql  Text'),
            'SQL_EXPLAIN' => Yii::t('app', 'Sql  Explain'),
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
