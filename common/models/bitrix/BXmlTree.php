<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_xml_tree".
 *
 * @property integer $ID
 * @property integer $PARENT_ID
 * @property integer $LEFT_MARGIN
 * @property integer $RIGHT_MARGIN
 * @property integer $DEPTH_LEVEL
 * @property string $NAME
 * @property string $VALUE
 * @property string $ATTRIBUTES
 */
class BXmlTree extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_xml_tree';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'LEFT_MARGIN', 'RIGHT_MARGIN', 'DEPTH_LEVEL'], 'integer'],
            [['VALUE', 'ATTRIBUTES'], 'string'],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'LEFT_MARGIN' => Yii::t('app', 'Left  Margin'),
            'RIGHT_MARGIN' => Yii::t('app', 'Right  Margin'),
            'DEPTH_LEVEL' => Yii::t('app', 'Depth  Level'),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'ATTRIBUTES' => Yii::t('app', 'Attributes'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
