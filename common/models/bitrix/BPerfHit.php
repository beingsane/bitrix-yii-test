<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_hit".
 *
 * @property integer $ID
 * @property string $DATE_HIT
 * @property string $IS_ADMIN
 * @property string $REQUEST_METHOD
 * @property string $SERVER_NAME
 * @property integer $SERVER_PORT
 * @property string $SCRIPT_NAME
 * @property string $REQUEST_URI
 * @property integer $INCLUDED_FILES
 * @property integer $MEMORY_PEAK_USAGE
 * @property string $CACHE_TYPE
 * @property integer $CACHE_SIZE
 * @property integer $CACHE_COUNT_R
 * @property integer $CACHE_COUNT_W
 * @property integer $CACHE_COUNT_C
 * @property integer $QUERIES
 * @property double $QUERIES_TIME
 * @property integer $COMPONENTS
 * @property double $COMPONENTS_TIME
 * @property string $SQL_LOG
 * @property double $PAGE_TIME
 * @property double $PROLOG_TIME
 * @property double $PROLOG_BEFORE_TIME
 * @property double $AGENTS_TIME
 * @property double $PROLOG_AFTER_TIME
 * @property double $WORK_AREA_TIME
 * @property double $EPILOG_TIME
 * @property double $EPILOG_BEFORE_TIME
 * @property double $EVENTS_TIME
 * @property double $EPILOG_AFTER_TIME
 * @property integer $MENU_RECALC
 */
class BPerfHit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_hit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_HIT'], 'safe'],
            [['SERVER_PORT', 'INCLUDED_FILES', 'MEMORY_PEAK_USAGE', 'CACHE_SIZE', 'CACHE_COUNT_R', 'CACHE_COUNT_W', 'CACHE_COUNT_C', 'QUERIES', 'COMPONENTS', 'MENU_RECALC'], 'integer'],
            [['SCRIPT_NAME', 'REQUEST_URI'], 'string'],
            [['QUERIES_TIME', 'COMPONENTS_TIME', 'PAGE_TIME', 'PROLOG_TIME', 'PROLOG_BEFORE_TIME', 'AGENTS_TIME', 'PROLOG_AFTER_TIME', 'WORK_AREA_TIME', 'EPILOG_TIME', 'EPILOG_BEFORE_TIME', 'EVENTS_TIME', 'EPILOG_AFTER_TIME'], 'number'],
            [['IS_ADMIN', 'CACHE_TYPE', 'SQL_LOG'], 'string', 'max' => 1],
            [['REQUEST_METHOD', 'SERVER_NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_HIT' => Yii::t('app', 'Date  Hit'),
            'IS_ADMIN' => Yii::t('app', 'Is  Admin'),
            'REQUEST_METHOD' => Yii::t('app', 'Request  Method'),
            'SERVER_NAME' => Yii::t('app', 'Server  Name'),
            'SERVER_PORT' => Yii::t('app', 'Server  Port'),
            'SCRIPT_NAME' => Yii::t('app', 'Script  Name'),
            'REQUEST_URI' => Yii::t('app', 'Request  Uri'),
            'INCLUDED_FILES' => Yii::t('app', 'Included  Files'),
            'MEMORY_PEAK_USAGE' => Yii::t('app', 'Memory  Peak  Usage'),
            'CACHE_TYPE' => Yii::t('app', 'Cache  Type'),
            'CACHE_SIZE' => Yii::t('app', 'Cache  Size'),
            'CACHE_COUNT_R' => Yii::t('app', 'Cache  Count  R'),
            'CACHE_COUNT_W' => Yii::t('app', 'Cache  Count  W'),
            'CACHE_COUNT_C' => Yii::t('app', 'Cache  Count  C'),
            'QUERIES' => Yii::t('app', 'Queries'),
            'QUERIES_TIME' => Yii::t('app', 'Queries  Time'),
            'COMPONENTS' => Yii::t('app', 'Components'),
            'COMPONENTS_TIME' => Yii::t('app', 'Components  Time'),
            'SQL_LOG' => Yii::t('app', 'Sql  Log'),
            'PAGE_TIME' => Yii::t('app', 'Page  Time'),
            'PROLOG_TIME' => Yii::t('app', 'Prolog  Time'),
            'PROLOG_BEFORE_TIME' => Yii::t('app', 'Prolog  Before  Time'),
            'AGENTS_TIME' => Yii::t('app', 'Agents  Time'),
            'PROLOG_AFTER_TIME' => Yii::t('app', 'Prolog  After  Time'),
            'WORK_AREA_TIME' => Yii::t('app', 'Work  Area  Time'),
            'EPILOG_TIME' => Yii::t('app', 'Epilog  Time'),
            'EPILOG_BEFORE_TIME' => Yii::t('app', 'Epilog  Before  Time'),
            'EVENTS_TIME' => Yii::t('app', 'Events  Time'),
            'EPILOG_AFTER_TIME' => Yii::t('app', 'Epilog  After  Time'),
            'MENU_RECALC' => Yii::t('app', 'Menu  Recalc'),
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
