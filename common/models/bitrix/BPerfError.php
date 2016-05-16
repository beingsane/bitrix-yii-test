<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_error".
 *
 * @property integer $ID
 * @property integer $HIT_ID
 * @property integer $ERRNO
 * @property string $ERRSTR
 * @property string $ERRFILE
 * @property integer $ERRLINE
 */
class BPerfError extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_error';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['HIT_ID', 'ERRNO', 'ERRLINE'], 'integer'],
            [['ERRSTR', 'ERRFILE'], 'string']
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
            'ERRNO' => Yii::t('app', 'Errno'),
            'ERRSTR' => Yii::t('app', 'Errstr'),
            'ERRFILE' => Yii::t('app', 'Errfile'),
            'ERRLINE' => Yii::t('app', 'Errline'),
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
