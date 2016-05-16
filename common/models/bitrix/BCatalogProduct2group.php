<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_product2group".
 *
 * @property integer $ID
 * @property integer $PRODUCT_ID
 * @property integer $GROUP_ID
 * @property integer $ACCESS_LENGTH
 * @property string $ACCESS_LENGTH_TYPE
 */
class BCatalogProduct2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_product2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PRODUCT_ID', 'GROUP_ID', 'ACCESS_LENGTH'], 'required'],
            [['PRODUCT_ID', 'GROUP_ID', 'ACCESS_LENGTH'], 'integer'],
            [['ACCESS_LENGTH_TYPE'], 'string', 'max' => 1],
            [['PRODUCT_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['PRODUCT_ID', 'GROUP_ID'], 'message' => 'The combination of Product  and Group  has already been taken.']
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
            'GROUP_ID' => Yii::t('app', 'Group '),
            'ACCESS_LENGTH' => Yii::t('app', 'Access  Length'),
            'ACCESS_LENGTH_TYPE' => Yii::t('app', 'Access  Length  Type'),
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
