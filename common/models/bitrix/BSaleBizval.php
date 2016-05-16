<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_bizval".
 *
 * @property string $CODE_KEY
 * @property string $CONSUMER_KEY
 * @property integer $PERSON_TYPE_ID
 * @property string $PROVIDER_KEY
 * @property string $PROVIDER_VALUE
 */
class BSaleBizval extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_bizval';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE_KEY', 'CONSUMER_KEY', 'PERSON_TYPE_ID', 'PROVIDER_KEY'], 'required'],
            [['PERSON_TYPE_ID'], 'integer'],
            [['CODE_KEY', 'CONSUMER_KEY', 'PROVIDER_KEY'], 'string', 'max' => 50],
            [['PROVIDER_VALUE'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CODE_KEY' => Yii::t('app', 'Code  Key'),
            'CONSUMER_KEY' => Yii::t('app', 'Consumer  Key'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'PROVIDER_KEY' => Yii::t('app', 'Provider  Key'),
            'PROVIDER_VALUE' => Yii::t('app', 'Provider  Value'),
        ];
    }

    public function getName()
    {
        return $this->CODE_KEY;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CODE_KEY', 'CODE_KEY');
        return $list;
    }
}
