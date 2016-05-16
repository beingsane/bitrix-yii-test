<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_affiliate_plan_section".
 *
 * @property integer $ID
 * @property integer $PLAN_ID
 * @property string $MODULE_ID
 * @property string $SECTION_ID
 * @property string $RATE
 * @property string $RATE_TYPE
 * @property string $RATE_CURRENCY
 */
class BSaleAffiliatePlanSection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_affiliate_plan_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PLAN_ID', 'SECTION_ID'], 'required'],
            [['PLAN_ID'], 'integer'],
            [['RATE'], 'number'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['SECTION_ID'], 'string', 'max' => 255],
            [['RATE_TYPE'], 'string', 'max' => 1],
            [['RATE_CURRENCY'], 'string', 'max' => 3],
            [['PLAN_ID', 'MODULE_ID', 'SECTION_ID'], 'unique', 'targetAttribute' => ['PLAN_ID', 'MODULE_ID', 'SECTION_ID'], 'message' => 'The combination of Plan , Module  and Section  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PLAN_ID' => Yii::t('app', 'Plan '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'SECTION_ID' => Yii::t('app', 'Section '),
            'RATE' => Yii::t('app', 'Rate'),
            'RATE_TYPE' => Yii::t('app', 'Rate  Type'),
            'RATE_CURRENCY' => Yii::t('app', 'Rate  Currency'),
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
