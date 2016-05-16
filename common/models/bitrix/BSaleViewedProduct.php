<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_viewed_product".
 *
 * @property string $ID
 * @property string $FUSER_ID
 * @property string $DATE_VISIT
 * @property string $PRODUCT_ID
 * @property string $MODULE
 * @property string $LID
 * @property string $NAME
 * @property string $DETAIL_PAGE_URL
 * @property string $CURRENCY
 * @property string $PRICE
 * @property string $NOTES
 * @property integer $PREVIEW_PICTURE
 * @property integer $DETAIL_PICTURE
 * @property string $CALLBACK_FUNC
 * @property string $PRODUCT_PROVIDER_CLASS
 */
class BSaleViewedProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_viewed_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FUSER_ID', 'PRODUCT_ID', 'PREVIEW_PICTURE', 'DETAIL_PICTURE'], 'integer'],
            [['DATE_VISIT', 'LID', 'NAME'], 'required'],
            [['DATE_VISIT'], 'safe'],
            [['PRICE'], 'number'],
            [['MODULE', 'PRODUCT_PROVIDER_CLASS'], 'string', 'max' => 100],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'DETAIL_PAGE_URL', 'NOTES'], 'string', 'max' => 255],
            [['CURRENCY'], 'string', 'max' => 3],
            [['CALLBACK_FUNC'], 'string', 'max' => 45]
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
            'MODULE' => Yii::t('app', 'Module'),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'DETAIL_PAGE_URL' => Yii::t('app', 'Detail  Page  Url'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'PRICE' => Yii::t('app', 'Price'),
            'NOTES' => Yii::t('app', 'Notes'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'CALLBACK_FUNC' => Yii::t('app', 'Callback  Func'),
            'PRODUCT_PROVIDER_CLASS' => Yii::t('app', 'Product  Provider  Class'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
