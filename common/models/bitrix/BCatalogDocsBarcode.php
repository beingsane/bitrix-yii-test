<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_docs_barcode".
 *
 * @property integer $ID
 * @property integer $DOC_ELEMENT_ID
 * @property string $BARCODE
 */
class BCatalogDocsBarcode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_docs_barcode';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOC_ELEMENT_ID', 'BARCODE'], 'required'],
            [['DOC_ELEMENT_ID'], 'integer'],
            [['BARCODE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DOC_ELEMENT_ID' => Yii::t('app', 'Doc  Element '),
            'BARCODE' => Yii::t('app', 'Barcode'),
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
