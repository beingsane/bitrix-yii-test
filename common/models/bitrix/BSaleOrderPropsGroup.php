<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_props_group".
 *
 * @property integer $ID
 * @property integer $PERSON_TYPE_ID
 * @property string $NAME
 * @property integer $SORT
 */
class BSaleOrderPropsGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_props_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID', 'NAME'], 'required'],
            [['PERSON_TYPE_ID', 'SORT'], 'integer'],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'NAME' => Yii::t('app', 'Name'),
            'SORT' => Yii::t('app', 'Sort'),
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
