<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location".
 *
 * @property integer $ID
 * @property integer $SORT
 * @property string $CODE
 * @property integer $LEFT_MARGIN
 * @property integer $RIGHT_MARGIN
 * @property integer $PARENT_ID
 * @property integer $DEPTH_LEVEL
 * @property integer $TYPE_ID
 * @property string $LATITUDE
 * @property string $LONGITUDE
 * @property integer $COUNTRY_ID
 * @property integer $REGION_ID
 * @property integer $CITY_ID
 * @property string $LOC_DEFAULT
 */
class BSaleLocation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'PARENT_ID', 'DEPTH_LEVEL', 'TYPE_ID', 'COUNTRY_ID', 'REGION_ID', 'CITY_ID'], 'integer'],
            [['CODE'], 'required'],
            [['LATITUDE', 'LONGITUDE'], 'number'],
            [['CODE'], 'string', 'max' => 100],
            [['LOC_DEFAULT'], 'string', 'max' => 1],
            [['CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SORT' => Yii::t('app', 'Sort'),
            'CODE' => Yii::t('app', 'Code'),
            'LEFT_MARGIN' => Yii::t('app', 'Left  Margin'),
            'RIGHT_MARGIN' => Yii::t('app', 'Right  Margin'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'DEPTH_LEVEL' => Yii::t('app', 'Depth  Level'),
            'TYPE_ID' => Yii::t('app', 'Type '),
            'LATITUDE' => Yii::t('app', 'Latitude'),
            'LONGITUDE' => Yii::t('app', 'Longitude'),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'REGION_ID' => Yii::t('app', 'Region '),
            'CITY_ID' => Yii::t('app', 'City '),
            'LOC_DEFAULT' => Yii::t('app', 'Loc  Default'),
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
