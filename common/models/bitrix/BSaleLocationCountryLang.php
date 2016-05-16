<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location_country_lang".
 *
 * @property integer $ID
 * @property integer $COUNTRY_ID
 * @property string $LID
 * @property string $NAME
 * @property string $SHORT_NAME
 */
class BSaleLocationCountryLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location_country_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COUNTRY_ID', 'LID', 'NAME'], 'required'],
            [['COUNTRY_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'SHORT_NAME'], 'string', 'max' => 100],
            [['COUNTRY_ID', 'LID'], 'unique', 'targetAttribute' => ['COUNTRY_ID', 'LID'], 'message' => 'The combination of Country  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
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
