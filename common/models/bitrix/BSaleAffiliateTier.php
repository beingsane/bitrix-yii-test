<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_affiliate_tier".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $RATE1
 * @property string $RATE2
 * @property string $RATE3
 * @property string $RATE4
 * @property string $RATE5
 */
class BSaleAffiliateTier extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_affiliate_tier';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID'], 'required'],
            [['RATE1', 'RATE2', 'RATE3', 'RATE4', 'RATE5'], 'number'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['SITE_ID'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'RATE1' => Yii::t('app', 'Rate1'),
            'RATE2' => Yii::t('app', 'Rate2'),
            'RATE3' => Yii::t('app', 'Rate3'),
            'RATE4' => Yii::t('app', 'Rate4'),
            'RATE5' => Yii::t('app', 'Rate5'),
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
