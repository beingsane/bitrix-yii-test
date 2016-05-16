<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_fields".
 *
 * @property integer $IBLOCK_ID
 * @property string $FIELD_ID
 * @property string $IS_REQUIRED
 * @property string $DEFAULT_VALUE
 */
class BIblockFields extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_fields';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'FIELD_ID'], 'required'],
            [['IBLOCK_ID'], 'integer'],
            [['DEFAULT_VALUE'], 'string'],
            [['FIELD_ID'], 'string', 'max' => 50],
            [['IS_REQUIRED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'IS_REQUIRED' => Yii::t('app', 'Is  Required'),
            'DEFAULT_VALUE' => Yii::t('app', 'Default  Value'),
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
