<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_index_suggest_sql".
 *
 * @property integer $SUGGEST_ID
 * @property integer $SQL_ID
 */
class BPerfIndexSuggestSql extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_index_suggest_sql';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUGGEST_ID', 'SQL_ID'], 'required'],
            [['SUGGEST_ID', 'SQL_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SUGGEST_ID' => Yii::t('app', 'Suggest '),
            'SQL_ID' => Yii::t('app', 'Sql '),
        ];
    }

    public function getName()
    {
        return $this->SUGGEST_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SUGGEST_ID', 'SUGGEST_ID');
        return $list;
    }
}
