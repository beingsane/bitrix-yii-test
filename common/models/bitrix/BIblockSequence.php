<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_sequence".
 *
 * @property integer $IBLOCK_ID
 * @property string $CODE
 * @property integer $SEQ_VALUE
 */
class BIblockSequence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_sequence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'CODE'], 'required'],
            [['IBLOCK_ID', 'SEQ_VALUE'], 'integer'],
            [['CODE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'CODE' => Yii::t('app', 'Code'),
            'SEQ_VALUE' => Yii::t('app', 'Seq  Value'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
