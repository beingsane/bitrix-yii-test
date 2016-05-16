<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_docs_element".
 *
 * @property integer $ID
 * @property integer $DOC_ID
 * @property integer $STORE_FROM
 * @property integer $STORE_TO
 * @property integer $ELEMENT_ID
 * @property double $AMOUNT
 * @property double $PURCHASING_PRICE
 */
class BCatalogDocsElement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_docs_element';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOC_ID'], 'required'],
            [['DOC_ID', 'STORE_FROM', 'STORE_TO', 'ELEMENT_ID'], 'integer'],
            [['AMOUNT', 'PURCHASING_PRICE'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DOC_ID' => Yii::t('app', 'Doc '),
            'STORE_FROM' => Yii::t('app', 'Store  From'),
            'STORE_TO' => Yii::t('app', 'Store  To'),
            'ELEMENT_ID' => Yii::t('app', 'Element '),
            'AMOUNT' => Yii::t('app', 'Amount'),
            'PURCHASING_PRICE' => Yii::t('app', 'Purchasing  Price'),
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
