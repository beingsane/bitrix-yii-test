<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_loc_ext".
 *
 * @property integer $ID
 * @property integer $SERVICE_ID
 * @property integer $LOCATION_ID
 * @property string $XML_ID
 */
class BSaleLocExt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_loc_ext';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SERVICE_ID', 'LOCATION_ID', 'XML_ID'], 'required'],
            [['SERVICE_ID', 'LOCATION_ID'], 'integer'],
            [['XML_ID'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SERVICE_ID' => Yii::t('app', 'Service '),
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'XML_ID' => Yii::t('app', 'Xml '),
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
