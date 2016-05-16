<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_conv_context_attribute".
 *
 * @property string $CONTEXT_ID
 * @property string $NAME
 * @property string $VALUE
 */
class BConvContextAttribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_conv_context_attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTEXT_ID', 'NAME', 'VALUE'], 'required'],
            [['CONTEXT_ID'], 'integer'],
            [['NAME', 'VALUE'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONTEXT_ID' => Yii::t('app', 'Context '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CONTEXT_ID', 'NAME');
        return $list;
    }
}
