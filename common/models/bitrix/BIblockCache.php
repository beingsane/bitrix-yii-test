<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_cache".
 *
 * @property string $CACHE_KEY
 * @property string $CACHE
 * @property string $CACHE_DATE
 */
class BIblockCache extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_cache';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CACHE_KEY', 'CACHE'], 'required'],
            [['CACHE'], 'string'],
            [['CACHE_DATE'], 'safe'],
            [['CACHE_KEY'], 'string', 'max' => 35]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CACHE_KEY' => Yii::t('app', 'Cache  Key'),
            'CACHE' => Yii::t('app', 'Cache'),
            'CACHE_DATE' => Yii::t('app', 'Cache  Date'),
        ];
    }

    public function getName()
    {
        return $this->CACHE_KEY;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CACHE_KEY', 'CACHE_KEY');
        return $list;
    }
}
