<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "eshop_color_reference".
 *
 * @property string $ID
 * @property string $UF_NAME
 * @property integer $UF_FILE
 * @property string $UF_LINK
 * @property double $UF_SORT
 * @property integer $UF_DEF
 * @property string $UF_XML_ID
 */
class EshopColorReference extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'eshop_color_reference';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UF_NAME', 'UF_LINK', 'UF_XML_ID'], 'string'],
            [['UF_FILE', 'UF_DEF'], 'integer'],
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
            'UF_SORT' => Yii::t('app', 'Uf  Sort'),
            'UF_DEF' => Yii::t('app', 'Uf  Def'),
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
