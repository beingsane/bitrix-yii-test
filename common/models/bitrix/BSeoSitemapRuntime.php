<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_sitemap_runtime".
 *
 * @property integer $ID
 * @property integer $PID
 * @property string $PROCESSED
 * @property string $ITEM_PATH
 * @property integer $ITEM_ID
 * @property string $ITEM_TYPE
 * @property string $ACTIVE
 * @property string $ACTIVE_ELEMENT
 */
class BSeoSitemapRuntime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_sitemap_runtime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PID'], 'required'],
            [['PID', 'ITEM_ID'], 'integer'],
            [['PROCESSED', 'ITEM_TYPE', 'ACTIVE', 'ACTIVE_ELEMENT'], 'string', 'max' => 1],
            [['ITEM_PATH'], 'string', 'max' => 700]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PID' => Yii::t('app', 'Pid'),
            'PROCESSED' => Yii::t('app', 'Processed'),
            'ITEM_PATH' => Yii::t('app', 'Item  Path'),
            'ITEM_ID' => Yii::t('app', 'Item '),
            'ITEM_TYPE' => Yii::t('app', 'Item  Type'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_ELEMENT' => Yii::t('app', 'Active  Element'),
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
