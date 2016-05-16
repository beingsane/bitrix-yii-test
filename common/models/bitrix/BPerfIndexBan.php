<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_perf_index_ban".
 *
 * @property integer $ID
 * @property string $BAN_TYPE
 * @property string $TABLE_NAME
 * @property string $COLUMN_NAMES
 */
class BPerfIndexBan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_perf_index_ban';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BAN_TYPE'], 'string', 'max' => 1],
            [['TABLE_NAME'], 'string', 'max' => 50],
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
            'BAN_TYPE' => Yii::t('app', 'Ban  Type'),
            'TABLE_NAME' => Yii::t('app', 'Table  Name'),
            'COLUMN_NAMES' => Yii::t('app', 'Column  Names'),
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
