<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_bizval_persondomain".
 *
 * @property integer $PERSON_TYPE_ID
 * @property string $DOMAIN
 */
class BSaleBizvalPersondomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_bizval_persondomain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID', 'DOMAIN'], 'required'],
            [['PERSON_TYPE_ID'], 'integer'],
            [['DOMAIN'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'DOMAIN' => Yii::t('app', 'Domain'),
        ];
    }

    public function getName()
    {
        return $this->PERSON_TYPE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'PERSON_TYPE_ID', 'PERSON_TYPE_ID');
        return $list;
    }
}
