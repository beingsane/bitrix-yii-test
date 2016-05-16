<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_right".
 *
 * @property integer $ID
 * @property integer $IBLOCK_ID
 * @property string $GROUP_CODE
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $DO_INHERIT
 * @property integer $TASK_ID
 * @property string $OP_SREAD
 * @property string $OP_EREAD
 * @property string $XML_ID
 */
class BIblockRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'GROUP_CODE', 'ENTITY_TYPE', 'ENTITY_ID', 'DO_INHERIT', 'TASK_ID', 'OP_SREAD', 'OP_EREAD'], 'required'],
            [['IBLOCK_ID', 'ENTITY_ID', 'TASK_ID'], 'integer'],
            [['GROUP_CODE'], 'string', 'max' => 50],
            [['ENTITY_TYPE', 'XML_ID'], 'string', 'max' => 32],
            [['DO_INHERIT', 'OP_SREAD', 'OP_EREAD'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'GROUP_CODE' => Yii::t('app', 'Group  Code'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'DO_INHERIT' => Yii::t('app', 'Do  Inherit'),
            'TASK_ID' => Yii::t('app', 'Task '),
            'OP_SREAD' => Yii::t('app', 'Op  Sread'),
            'OP_EREAD' => Yii::t('app', 'Op  Eread'),
            'XML_ID' => Yii::t('app', 'Xml '),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
