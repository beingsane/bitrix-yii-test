<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_disc_save_range".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property double $RANGE_FROM
 * @property string $TYPE
 * @property double $VALUE
 */
class BCatalogDiscSaveRange extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_disc_save_range';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'RANGE_FROM', 'VALUE'], 'required'],
            [['DISCOUNT_ID'], 'integer'],
            [['RANGE_FROM', 'VALUE'], 'number'],
            [['TYPE'], 'string', 'max' => 1]
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
            'RANGE_FROM' => Yii::t('app', 'Range  From'),
            'TYPE' => Yii::t('app', 'Type'),
            'VALUE' => Yii::t('app', 'Value'),
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
