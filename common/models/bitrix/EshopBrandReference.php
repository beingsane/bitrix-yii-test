<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "eshop_brand_reference".
 *
 * @property string $ID
 * @property string $UF_NAME
 * @property integer $UF_FILE
 * @property string $UF_LINK
 * @property string $UF_DESCRIPTION
 * @property string $UF_FULL_DESCRIPTION
 * @property double $UF_SORT
 * @property string $UF_EXTERNAL_CODE
 * @property string $UF_XML_ID
 */
class EshopBrandReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eshop_brand_reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UF_NAME', 'UF_LINK', 'UF_DESCRIPTION', 'UF_FULL_DESCRIPTION', 'UF_EXTERNAL_CODE', 'UF_XML_ID'], 'string'],
            [['UF_FILE'], 'integer'],
            [['UF_SORT'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'UF_NAME' => Yii::t('app', 'Uf  Name'),
            'UF_FILE' => Yii::t('app', 'Uf  File'),
            'UF_LINK' => Yii::t('app', 'Uf  Link'),
            'UF_DESCRIPTION' => Yii::t('app', 'Uf  Description'),
            'UF_FULL_DESCRIPTION' => Yii::t('app', 'Uf  Full  Description'),
            'UF_SORT' => Yii::t('app', 'Uf  Sort'),
            'UF_EXTERNAL_CODE' => Yii::t('app', 'Uf  External  Code'),
            'UF_XML_ID' => Yii::t('app', 'Uf  Xml '),
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
