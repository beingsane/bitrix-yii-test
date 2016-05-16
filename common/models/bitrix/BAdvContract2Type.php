<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_contract_2_type".
 *
 * @property integer $CONTRACT_ID
 * @property string $TYPE_SID
 */
class BAdvContract2Type extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_contract_2_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTRACT_ID', 'TYPE_SID'], 'required'],
            [['CONTRACT_ID'], 'integer'],
            [['TYPE_SID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONTRACT_ID' => Yii::t('app', 'Contract '),
            'TYPE_SID' => Yii::t('app', 'Type  Sid'),
        ];
    }

    public function getName()
    {
        return $this->CONTRACT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CONTRACT_ID', 'CONTRACT_ID');
        return $list;
    }
}
