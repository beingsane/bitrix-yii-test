<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_loc_2site".
 *
 * @property integer $LOCATION_ID
 * @property string $SITE_ID
 * @property string $LOCATION_TYPE
 */
class BSaleLoc2site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_loc_2site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_ID', 'SITE_ID', 'LOCATION_TYPE'], 'required'],
            [['LOCATION_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['LOCATION_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'LOCATION_TYPE' => Yii::t('app', 'Location  Type'),
        ];
    }

    public function getName()
    {
        return $this->LOCATION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LOCATION_ID', 'LOCATION_ID');
        return $list;
    }
}
