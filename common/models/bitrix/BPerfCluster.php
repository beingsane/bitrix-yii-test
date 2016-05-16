<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_cluster".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $THREADS
 * @property integer $HITS
 * @property integer $ERRORS
 * @property double $PAGES_PER_SECOND
 * @property double $PAGE_EXEC_TIME
 * @property double $PAGE_RESP_TIME
 */
class BPerfCluster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_cluster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['THREADS', 'HITS', 'ERRORS'], 'integer'],
            [['PAGES_PER_SECOND', 'PAGE_EXEC_TIME', 'PAGE_RESP_TIME'], 'number']
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
            'THREADS' => Yii::t('app', 'Threads'),
            'HITS' => Yii::t('app', 'Hits'),
            'ERRORS' => Yii::t('app', 'Errors'),
            'PAGES_PER_SECOND' => Yii::t('app', 'Pages  Per  Second'),
            'PAGE_EXEC_TIME' => Yii::t('app', 'Page  Exec  Time'),
            'PAGE_RESP_TIME' => Yii::t('app', 'Page  Resp  Time'),
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
