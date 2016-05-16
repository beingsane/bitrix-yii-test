<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_property_enum".
 *
 * @property integer $ID
 * @property integer $PROPERTY_ID
 * @property string $VALUE
 * @property string $DEF
 * @property integer $SORT
 * @property string $XML_ID
 * @property string $TMP_ID
 */
class BIblockPropertyEnum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_property_enum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PROPERTY_ID', 'VALUE', 'XML_ID'], 'required'],
            [['PROPERTY_ID', 'SORT'], 'integer'],
            [['VALUE'], 'string', 'max' => 255],
            [['DEF'], 'string', 'max' => 1],
            [['XML_ID'], 'string', 'max' => 200],
            [['TMP_ID'], 'string', 'max' => 40],
            [['PROPERTY_ID', 'XML_ID'], 'unique', 'targetAttribute' => ['PROPERTY_ID', 'XML_ID'], 'message' => 'The combination of Property  and Xml  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PROPERTY_ID' => Yii::t('app', 'Property '),
            'VALUE' => Yii::t('app', 'Value'),
            'DEF' => Yii::t('app', 'Def'),
            'SORT' => Yii::t('app', 'Sort'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'TMP_ID' => Yii::t('app', 'Tmp '),
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
