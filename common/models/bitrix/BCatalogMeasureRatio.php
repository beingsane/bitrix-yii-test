<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_measure_ratio".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property double $RATIO
 */
class BCatalogMeasureRatio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_measure_ratio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID'], 'required'],
            [['PRODUCT_ID'], 'integer'],
            [['RATIO'], 'number'],
            [['PRODUCT_ID', 'RATIO'], 'unique', 'targetAttribute' => ['PRODUCT_ID', 'RATIO'], 'message' => 'The combination of Product  and Ratio has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PRODUCT_ID' => Yii::t('app', 'Product '),
            'RATIO' => Yii::t('app', 'Ratio'),
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
