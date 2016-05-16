<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_flags2group".
 *
 * @property integer $ID
 * @property integer $GROUP_ID
 * @property string $ORDER_FLAG
 */
class BSaleOrderFlags2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_flags2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'ORDER_FLAG'], 'required'],
            [['GROUP_ID'], 'integer'],
            [['ORDER_FLAG'], 'string', 'max' => 1],
            [['GROUP_ID', 'ORDER_FLAG'], 'unique', 'targetAttribute' => ['GROUP_ID', 'ORDER_FLAG'], 'message' => 'The combination of Group  and Order  Flag has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'ORDER_FLAG' => Yii::t('app', 'Order  Flag'),
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
