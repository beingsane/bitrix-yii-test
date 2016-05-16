<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_measure".
 *
 * @property integer $ID
 * @property integer $CODE
 * @property string $MEASURE_TITLE
 * @property string $SYMBOL_RUS
 * @property string $SYMBOL_INTL
 * @property string $SYMBOL_LETTER_INTL
 * @property string $IS_DEFAULT
 */
class BCatalogMeasure extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_measure';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE'], 'required'],
            [['CODE'], 'integer'],
            [['MEASURE_TITLE'], 'string', 'max' => 500],
            [['SYMBOL_RUS', 'SYMBOL_INTL', 'SYMBOL_LETTER_INTL'], 'string', 'max' => 20],
            [['IS_DEFAULT'], 'string', 'max' => 1],
            [['CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'MEASURE_TITLE' => Yii::t('app', 'Measure  Title'),
            'SYMBOL_RUS' => Yii::t('app', 'Symbol  Rus'),
            'SYMBOL_INTL' => Yii::t('app', 'Symbol  Intl'),
            'SYMBOL_LETTER_INTL' => Yii::t('app', 'Symbol  Letter  Intl'),
            'IS_DEFAULT' => Yii::t('app', 'Is  Default'),
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
