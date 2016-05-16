<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_contract_2_user".
 *
 * @property integer $ID
 * @property integer $CONTRACT_ID
 * @property integer $USER_ID
 * @property string $PERMISSION
 */
class BAdvContract2User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_contract_2_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTRACT_ID', 'USER_ID'], 'integer'],
            [['PERMISSION'], 'required'],
            [['PERMISSION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CONTRACT_ID' => Yii::t('app', 'Contract '),
            'USER_ID' => Yii::t('app', 'User '),
            'PERMISSION' => Yii::t('app', 'Permission'),
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
