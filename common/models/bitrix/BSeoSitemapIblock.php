<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_sitemap_iblock".
 *
 * @property integer $ID
 * @property integer $IBLOCK_ID
 * @property integer $SITEMAP_ID
 */
class BSeoSitemapIblock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_sitemap_iblock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'SITEMAP_ID'], 'required'],
            [['IBLOCK_ID', 'SITEMAP_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'SITEMAP_ID' => Yii::t('app', 'Sitemap '),
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
