<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_loc_name".
 *
 * @property integer $ID
 * @property string $LANGUAGE_ID
 * @property integer $LOCATION_ID
 * @property string $NAME
 * @property string $NAME_UPPER
 * @property string $SHORT_NAME
 */
class BSaleLocName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_loc_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LANGUAGE_ID', 'LOCATION_ID', 'NAME', 'NAME_UPPER'], 'required'],
            [['LOCATION_ID'], 'integer'],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['NAME', 'NAME_UPPER', 'SHORT_NAME'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'LOCATION_ID' => Yii::t('app', 'Location '),
            'NAME' => Yii::t('app', 'Name'),
            'NAME_UPPER' => Yii::t('app', 'Name  Upper'),
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
