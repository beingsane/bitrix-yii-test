<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_currency_lang".
 *
 * @property string $CURRENCY
 * @property string $LID
 * @property string $FORMAT_STRING
 * @property string $FULL_NAME
 * @property string $DEC_POINT
 * @property string $THOUSANDS_SEP
 * @property integer $DECIMALS
 * @property string $THOUSANDS_VARIANT
 * @property string $HIDE_ZERO
 * @property integer $CREATED_BY
 * @property string $DATE_CREATE
 * @property integer $MODIFIED_BY
 * @property string $TIMESTAMP_X
 */
class BCatalogCurrencyLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_currency_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CURRENCY', 'LID', 'FORMAT_STRING'], 'required'],
            [['DECIMALS', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['DATE_CREATE', 'TIMESTAMP_X'], 'safe'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['LID'], 'string', 'max' => 2],
            [['FORMAT_STRING', 'FULL_NAME'], 'string', 'max' => 50],
            [['DEC_POINT', 'THOUSANDS_SEP'], 'string', 'max' => 5],
            [['THOUSANDS_VARIANT', 'HIDE_ZERO'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CURRENCY' => Yii::t('app', 'Currency'),
            'LID' => Yii::t('app', 'Lid'),
            'FORMAT_STRING' => Yii::t('app', 'Format  String'),
            'FULL_NAME' => Yii::t('app', 'Full  Name'),
            'DEC_POINT' => Yii::t('app', 'Dec  Point'),
            'THOUSANDS_SEP' => Yii::t('app', 'Thousands  Sep'),
            'DECIMALS' => Yii::t('app', 'Decimals'),
            'THOUSANDS_VARIANT' => Yii::t('app', 'Thousands  Variant'),
            'HIDE_ZERO' => Yii::t('app', 'Hide  Zero'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
        ];
    }

    public function getName()
    {
        return $this->CURRENCY;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CURRENCY', 'CURRENCY');
        return $list;
    }
}
