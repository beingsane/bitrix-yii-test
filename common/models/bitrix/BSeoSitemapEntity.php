<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_sitemap_entity".
 *
 * @property integer $ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property integer $SITEMAP_ID
 */
class BSeoSitemapEntity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_sitemap_entity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_TYPE', 'ENTITY_ID', 'SITEMAP_ID'], 'required'],
            [['ENTITY_ID', 'SITEMAP_ID'], 'integer'],
            [['ENTITY_TYPE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
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
