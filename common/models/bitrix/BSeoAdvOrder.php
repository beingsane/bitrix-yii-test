<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_order".
 *
 * @property integer $ID
 * @property integer $ENGINE_ID
 * @property string $TIMESTAMP_X
 * @property integer $CAMPAIGN_ID
 * @property integer $BANNER_ID
 * @property integer $ORDER_ID
 * @property double $SUM
 * @property string $PROCESSED
 */
class BSeoAdvOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENGINE_ID', 'TIMESTAMP_X', 'CAMPAIGN_ID', 'BANNER_ID', 'ORDER_ID'], 'required'],
            [['ENGINE_ID', 'CAMPAIGN_ID', 'BANNER_ID', 'ORDER_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['SUM'], 'number'],
            [['PROCESSED'], 'string', 'max' => 1],
            [['ENGINE_ID', 'CAMPAIGN_ID', 'BANNER_ID', 'ORDER_ID'], 'unique', 'targetAttribute' => ['ENGINE_ID', 'CAMPAIGN_ID', 'BANNER_ID', 'ORDER_ID'], 'message' => 'The combination of Engine , Campaign , Banner  and Order  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENGINE_ID' => Yii::t('app', 'Engine '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'CAMPAIGN_ID' => Yii::t('app', 'Campaign '),
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'ORDER_ID' => Yii::t('app', 'Order '),
            'SUM' => Yii::t('app', 'Sum'),
            'PROCESSED' => Yii::t('app', 'Processed'),
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
