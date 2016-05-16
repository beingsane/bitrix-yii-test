<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_sql".
 *
 * @property integer $ID
 * @property integer $HIT_ID
 * @property integer $COMPONENT_ID
 * @property integer $NN
 * @property double $QUERY_TIME
 * @property integer $NODE_ID
 * @property string $MODULE_NAME
 * @property string $COMPONENT_NAME
 * @property string $SQL_TEXT
 */
class BPerfSql extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_sql';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HIT_ID', 'COMPONENT_ID', 'NN', 'NODE_ID'], 'integer'],
            [['QUERY_TIME'], 'number'],
            [['MODULE_NAME', 'COMPONENT_NAME', 'SQL_TEXT'], 'string'],
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
            'COMPONENT_ID' => Yii::t('app', 'Component '),
            'NN' => Yii::t('app', 'Nn'),
            'QUERY_TIME' => Yii::t('app', 'Query  Time'),
            'NODE_ID' => Yii::t('app', 'Node '),
            'MODULE_NAME' => Yii::t('app', 'Module  Name'),
            'COMPONENT_NAME' => Yii::t('app', 'Component  Name'),
            'SQL_TEXT' => Yii::t('app', 'Sql  Text'),
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
