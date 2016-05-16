<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location2location_group".
 *
 * @property integer $LOCATION_ID
 * @property integer $LOCATION_GROUP_ID
 */
class BSaleLocation2locationGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location2location_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_ID', 'LOCATION_GROUP_ID'], 'required'],
            [['LOCATION_ID', 'LOCATION_GROUP_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'LOCATION_GROUP_ID' => Yii::t('app', 'Location  Group '),
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
