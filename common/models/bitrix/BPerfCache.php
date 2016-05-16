<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_cache".
 *
 * @property integer $ID
 * @property integer $HIT_ID
 * @property integer $COMPONENT_ID
 * @property integer $NN
 * @property double $CACHE_SIZE
 * @property string $OP_MODE
 * @property string $MODULE_NAME
 * @property string $COMPONENT_NAME
 * @property string $BASE_DIR
 * @property string $INIT_DIR
 * @property string $FILE_NAME
 * @property string $FILE_PATH
 */
class BPerfCache extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_cache';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HIT_ID', 'COMPONENT_ID', 'NN'], 'integer'],
            [['CACHE_SIZE'], 'number'],
            [['MODULE_NAME', 'COMPONENT_NAME', 'BASE_DIR', 'INIT_DIR', 'FILE_NAME', 'FILE_PATH'], 'string'],
            [['OP_MODE'], 'string', 'max' => 1],
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
            'CACHE_SIZE' => Yii::t('app', 'Cache  Size'),
            'OP_MODE' => Yii::t('app', 'Op  Mode'),
            'MODULE_NAME' => Yii::t('app', 'Module  Name'),
            'COMPONENT_NAME' => Yii::t('app', 'Component  Name'),
            'BASE_DIR' => Yii::t('app', 'Base  Dir'),
            'INIT_DIR' => Yii::t('app', 'Init  Dir'),
            'FILE_NAME' => Yii::t('app', 'File  Name'),
            'FILE_PATH' => Yii::t('app', 'File  Path'),
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
