<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_ebay_fq".
 *
 * @property integer $ID
 * @property string $FEED_TYPE
 * @property string $DATA
 */
class BSaleTpEbayFq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_ebay_fq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FEED_TYPE', 'DATA'], 'required'],
            [['DATA'], 'string'],
            [['FEED_TYPE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FEED_TYPE' => Yii::t('app', 'Feed  Type'),
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
