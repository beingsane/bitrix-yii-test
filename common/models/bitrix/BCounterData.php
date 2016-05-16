<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_counter_data".
 *
 * @property string $ID
 * @property string $TYPE
 * @property string $DATA
 */
class BCounterData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_counter_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TYPE', 'DATA'], 'required'],
            [['DATA'], 'string'],
            [['ID'], 'string', 'max' => 16],
            [['TYPE'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TYPE' => Yii::t('app', 'Type'),
            'DATA' => Yii::t('app', 'Data'),
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
