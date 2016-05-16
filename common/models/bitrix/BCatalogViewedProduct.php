<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_viewed_product".
 *
 * @property integer $ID
 * @property integer $FUSER_ID
 * @property string $DATE_VISIT
 * @property integer $PRODUCT_ID
 * @property integer $ELEMENT_ID
 * @property string $SITE_ID
 * @property integer $VIEW_COUNT
 * @property string $RECOMMENDATION
 */
class BCatalogViewedProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_viewed_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FUSER_ID', 'DATE_VISIT', 'PRODUCT_ID', 'SITE_ID'], 'required'],
            [['FUSER_ID', 'PRODUCT_ID', 'ELEMENT_ID', 'VIEW_COUNT'], 'integer'],
            [['DATE_VISIT'], 'safe'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['RECOMMENDATION'], 'string', 'max' => 40]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FUSER_ID' => Yii::t('app', 'Fuser '),
            'DATE_VISIT' => Yii::t('app', 'Date  Visit'),
            'PRODUCT_ID' => Yii::t('app', 'Product '),
            'ELEMENT_ID' => Yii::t('app', 'Element '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'VIEW_COUNT' => Yii::t('app', 'View  Count'),
            'RECOMMENDATION' => Yii::t('app', 'Recommendation'),
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
