<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_bizval_code_1c".
 *
 * @property integer $PERSON_TYPE_ID
 * @property integer $CODE_INDEX
 * @property string $NAME
 */
class BSaleBizvalCode1c extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_bizval_code_1c';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID', 'CODE_INDEX', 'NAME'], 'required'],
            [['PERSON_TYPE_ID', 'CODE_INDEX'], 'integer'],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'CODE_INDEX' => Yii::t('app', 'Code  Index'),
            'NAME' => Yii::t('app', 'Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'PERSON_TYPE_ID', 'NAME');
        return $list;
    }
}
