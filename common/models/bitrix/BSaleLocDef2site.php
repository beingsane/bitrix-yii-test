<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_loc_def2site".
 *
 * @property string $LOCATION_CODE
 * @property string $SITE_ID
 * @property integer $SORT
 */
class BSaleLocDef2site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_loc_def2site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_CODE', 'SITE_ID'], 'required'],
            [['SORT'], 'integer'],
            [['LOCATION_CODE'], 'string', 'max' => 100],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOCATION_CODE' => Yii::t('app', 'Location  Code'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'SORT' => Yii::t('app', 'Sort'),
        ];
    }

    public function getName()
    {
        return $this->LOCATION_CODE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LOCATION_CODE', 'LOCATION_CODE');
        return $list;
    }
}
