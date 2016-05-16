<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_currency_rate".
 *
 * @property integer $ID
 * @property string $CURRENCY
 * @property string $DATE_RATE
 * @property integer $RATE_CNT
 * @property string $RATE
 * @property integer $CREATED_BY
 * @property string $DATE_CREATE
 * @property integer $MODIFIED_BY
 * @property string $TIMESTAMP_X
 */
class BCatalogCurrencyRate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_currency_rate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CURRENCY', 'DATE_RATE'], 'required'],
            [['DATE_RATE', 'DATE_CREATE', 'TIMESTAMP_X'], 'safe'],
            [['RATE_CNT', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['RATE'], 'number'],
            [['CURRENCY'], 'string', 'max' => 3],
            [['CURRENCY', 'DATE_RATE'], 'unique', 'targetAttribute' => ['CURRENCY', 'DATE_RATE'], 'message' => 'The combination of Currency and Date  Rate has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'DATE_RATE' => Yii::t('app', 'Date  Rate'),
            'RATE_CNT' => Yii::t('app', 'Rate  Cnt'),
            'RATE' => Yii::t('app', 'Rate'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
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
