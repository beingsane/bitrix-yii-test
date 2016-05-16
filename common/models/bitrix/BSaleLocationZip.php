<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location_zip".
 *
 * @property integer $ID
 * @property integer $LOCATION_ID
 * @property string $ZIP
 */
class BSaleLocationZip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location_zip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_ID'], 'integer'],
            [['ZIP'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'ZIP' => Yii::t('app', 'Zip'),
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
