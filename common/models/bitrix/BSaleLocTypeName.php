<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_loc_type_name".
 *
 * @property integer $ID
 * @property string $LANGUAGE_ID
 * @property string $NAME
 * @property integer $TYPE_ID
 */
class BSaleLocTypeName extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_loc_type_name';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LANGUAGE_ID', 'NAME', 'TYPE_ID'], 'required'],
            [['TYPE_ID'], 'integer'],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 100]
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
            'NAME' => Yii::t('app', 'Name'),
            'TYPE_ID' => Yii::t('app', 'Type '),
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
