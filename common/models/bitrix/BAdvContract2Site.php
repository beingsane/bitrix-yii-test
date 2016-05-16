<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_contract_2_site".
 *
 * @property integer $CONTRACT_ID
 * @property string $SITE_ID
 */
class BAdvContract2Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_contract_2_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTRACT_ID', 'SITE_ID'], 'required'],
            [['CONTRACT_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONTRACT_ID' => Yii::t('app', 'Contract '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
