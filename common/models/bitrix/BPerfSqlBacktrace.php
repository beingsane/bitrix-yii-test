<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_sql_backtrace".
 *
 * @property integer $SQL_ID
 * @property integer $NN
 * @property string $FILE_NAME
 * @property integer $LINE_NO
 * @property string $CLASS_NAME
 * @property string $FUNCTION_NAME
 */
class BPerfSqlBacktrace extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_sql_backtrace';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SQL_ID', 'NN'], 'required'],
            [['SQL_ID', 'NN', 'LINE_NO'], 'integer'],
            [['FILE_NAME', 'CLASS_NAME', 'FUNCTION_NAME'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SQL_ID' => Yii::t('app', 'Sql '),
            'NN' => Yii::t('app', 'Nn'),
            'FILE_NAME' => Yii::t('app', 'File  Name'),
            'LINE_NO' => Yii::t('app', 'Line  No'),
            'CLASS_NAME' => Yii::t('app', 'Class  Name'),
            'FUNCTION_NAME' => Yii::t('app', 'Function  Name'),
        ];
    }

    public function getName()
    {
        return $this->SQL_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SQL_ID', 'SQL_ID');
        return $list;
    }
}
