<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_currency".
 *
 * @property string $CURRENCY
 * @property integer $AMOUNT_CNT
 * @property string $AMOUNT
 * @property integer $SORT
 * @property string $DATE_UPDATE
 * @property string $NUMCODE
 * @property string $BASE
 * @property integer $CREATED_BY
 * @property string $DATE_CREATE
 * @property integer $MODIFIED_BY
 * @property string $CURRENT_BASE_RATE
 */
class BCatalogCurrency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CURRENCY', 'DATE_UPDATE'], 'required'],
            [['AMOUNT_CNT', 'SORT', 'CREATED_BY', 'MODIFIED_BY'], 'integer'],
            [['AMOUNT', 'CURRENT_BASE_RATE'], 'number'],
            [['DATE_UPDATE', 'DATE_CREATE'], 'safe'],
            [['CURRENCY', 'NUMCODE'], 'string', 'max' => 3],
            [['BASE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CURRENCY' => Yii::t('app', 'Currency'),
            'AMOUNT_CNT' => Yii::t('app', 'Amount  Cnt'),
            'AMOUNT' => Yii::t('app', 'Amount'),
            'SORT' => Yii::t('app', 'Sort'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'NUMCODE' => Yii::t('app', 'Numcode'),
            'BASE' => Yii::t('app', 'Base'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'CURRENT_BASE_RATE' => Yii::t('app', 'Current  Base  Rate'),
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
