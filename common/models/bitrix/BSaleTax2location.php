<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tax2location".
 *
 * @property integer $TAX_RATE_ID
 * @property string $LOCATION_CODE
 * @property string $LOCATION_TYPE
 */
class BSaleTax2location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tax2location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TAX_RATE_ID', 'LOCATION_CODE', 'LOCATION_TYPE'], 'required'],
            [['TAX_RATE_ID'], 'integer'],
            [['LOCATION_CODE'], 'string', 'max' => 100],
            [['LOCATION_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TAX_RATE_ID' => Yii::t('app', 'Tax  Rate '),
            'LOCATION_CODE' => Yii::t('app', 'Location  Code'),
            'LOCATION_TYPE' => Yii::t('app', 'Location  Type'),
        ];
    }

    public function getName()
    {
        return $this->TAX_RATE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TAX_RATE_ID', 'TAX_RATE_ID');
        return $list;
    }
}
