<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_lang".
 *
 * @property string $LID
 * @property string $CURRENCY
 */
class BSaleLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'CURRENCY'], 'required'],
            [['LID'], 'string', 'max' => 2],
            [['CURRENCY'], 'string', 'max' => 3]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LID' => Yii::t('app', 'Lid'),
            'CURRENCY' => Yii::t('app', 'Currency'),
        ];
    }

    public function getName()
    {
        return $this->LID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LID', 'LID');
        return $list;
    }
}
