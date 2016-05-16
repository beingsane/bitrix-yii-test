<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_type_lang".
 *
 * @property string $IBLOCK_TYPE_ID
 * @property string $LID
 * @property string $NAME
 * @property string $SECTION_NAME
 * @property string $ELEMENT_NAME
 */
class BIblockTypeLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_type_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_TYPE_ID', 'LID', 'NAME'], 'required'],
            [['IBLOCK_TYPE_ID'], 'string', 'max' => 50],
            [['LID'], 'string', 'max' => 2],
            [['NAME', 'SECTION_NAME', 'ELEMENT_NAME'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_TYPE_ID' => Yii::t('app', 'Iblock  Type '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'SECTION_NAME' => Yii::t('app', 'Section  Name'),
            'ELEMENT_NAME' => Yii::t('app', 'Element  Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_TYPE_ID', 'NAME');
        return $list;
    }
}
