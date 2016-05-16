<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_discount_module".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property string $MODULE_ID
 */
class BSaleDiscountModule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_discount_module';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'MODULE_ID'], 'required'],
            [['DISCOUNT_ID'], 'integer'],
            [['MODULE_ID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DISCOUNT_ID' => Yii::t('app', 'Discount '),
            'MODULE_ID' => Yii::t('app', 'Module '),
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
