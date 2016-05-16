<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_component".
 *
 * @property integer $ID
 * @property integer $HIT_ID
 * @property integer $NN
 * @property string $CACHE_TYPE
 * @property integer $CACHE_SIZE
 * @property integer $CACHE_COUNT_R
 * @property integer $CACHE_COUNT_W
 * @property integer $CACHE_COUNT_C
 * @property double $COMPONENT_TIME
 * @property integer $QUERIES
 * @property double $QUERIES_TIME
 * @property string $COMPONENT_NAME
 */
class BPerfComponent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_component';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HIT_ID', 'NN', 'CACHE_SIZE', 'CACHE_COUNT_R', 'CACHE_COUNT_W', 'CACHE_COUNT_C', 'QUERIES'], 'integer'],
            [['COMPONENT_TIME', 'QUERIES_TIME'], 'number'],
            [['COMPONENT_NAME'], 'string'],
            [['CACHE_TYPE'], 'string', 'max' => 1],
            [['HIT_ID', 'NN'], 'unique', 'targetAttribute' => ['HIT_ID', 'NN'], 'message' => 'The combination of Hit  and Nn has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'HIT_ID' => Yii::t('app', 'Hit '),
            'NN' => Yii::t('app', 'Nn'),
            'CACHE_TYPE' => Yii::t('app', 'Cache  Type'),
            'CACHE_SIZE' => Yii::t('app', 'Cache  Size'),
            'CACHE_COUNT_R' => Yii::t('app', 'Cache  Count  R'),
            'CACHE_COUNT_W' => Yii::t('app', 'Cache  Count  W'),
            'CACHE_COUNT_C' => Yii::t('app', 'Cache  Count  C'),
            'COMPONENT_TIME' => Yii::t('app', 'Component  Time'),
            'QUERIES' => Yii::t('app', 'Queries'),
            'QUERIES_TIME' => Yii::t('app', 'Queries  Time'),
            'COMPONENT_NAME' => Yii::t('app', 'Component  Name'),
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
