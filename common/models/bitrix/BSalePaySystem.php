<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_pay_system".
 *
 * @property integer $ID
 * @property string $LID
 * @property string $CURRENCY
 * @property string $NAME
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $DESCRIPTION
 * @property string $ALLOW_EDIT_PAYMENT
 */
class BSalePaySystem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_pay_system';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['SORT'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['CURRENCY'], 'string', 'max' => 3],
            [['NAME'], 'string', 'max' => 255],
            [['ACTIVE', 'ALLOW_EDIT_PAYMENT'], 'string', 'max' => 1],
            [['DESCRIPTION'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'CURRENCY' => Yii::t('app', 'Currency'),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ALLOW_EDIT_PAYMENT' => Yii::t('app', 'Allow  Edit  Payment'),
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
