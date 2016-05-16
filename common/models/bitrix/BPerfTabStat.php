<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_tab_stat".
 *
 * @property string $TABLE_NAME
 * @property double $TABLE_SIZE
 * @property double $TABLE_ROWS
 */
class BPerfTabStat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_tab_stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TABLE_NAME'], 'required'],
            [['TABLE_SIZE', 'TABLE_ROWS'], 'number'],
            [['TABLE_NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'TABLE_SIZE' => Yii::t('app', 'Table  Size'),
            'TABLE_ROWS' => Yii::t('app', 'Table  Rows'),
        ];
    }

    public function getName()
    {
        return $this->TABLE_NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TABLE_NAME', 'TABLE_NAME');
        return $list;
    }
}
