<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_section_right".
 *
 * @property integer $IBLOCK_ID
 * @property integer $SECTION_ID
 * @property integer $RIGHT_ID
 * @property string $IS_INHERITED
 */
class BIblockSectionRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_section_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'SECTION_ID', 'RIGHT_ID', 'IS_INHERITED'], 'required'],
            [['IBLOCK_ID', 'SECTION_ID', 'RIGHT_ID'], 'integer'],
            [['IS_INHERITED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'SECTION_ID' => Yii::t('app', 'Section '),
            'RIGHT_ID' => Yii::t('app', 'Right '),
            'IS_INHERITED' => Yii::t('app', 'Is  Inherited'),
        ];
    }

    public function getName()
    {
        return $this->SECTION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SECTION_ID', 'SECTION_ID');
        return $list;
    }
}
