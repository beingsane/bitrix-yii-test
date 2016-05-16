<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tax_exempt2group".
 *
 * @property integer $GROUP_ID
 * @property integer $TAX_ID
 */
class BSaleTaxExempt2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tax_exempt2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'TAX_ID'], 'required'],
            [['GROUP_ID', 'TAX_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'GROUP_ID' => Yii::t('app', 'Group '),
            'TAX_ID' => Yii::t('app', 'Tax '),
        ];
    }

    public function getName()
    {
        return $this->GROUP_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'GROUP_ID', 'GROUP_ID');
        return $list;
    }
}
