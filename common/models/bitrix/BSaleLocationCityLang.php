<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location_city_lang".
 *
 * @property integer $ID
 * @property integer $CITY_ID
 * @property string $LID
 * @property string $NAME
 * @property string $SHORT_NAME
 */
class BSaleLocationCityLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location_city_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CITY_ID', 'LID', 'NAME'], 'required'],
            [['CITY_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'SHORT_NAME'], 'string', 'max' => 100],
            [['CITY_ID', 'LID'], 'unique', 'targetAttribute' => ['CITY_ID', 'LID'], 'message' => 'The combination of City  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CITY_ID' => Yii::t('app', 'City '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'SHORT_NAME' => Yii::t('app', 'Short  Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
