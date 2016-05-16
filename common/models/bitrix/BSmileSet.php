<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_smile_set".
 *
 * @property integer $ID
 * @property string $TYPE
 * @property integer $PARENT_ID
 * @property string $STRING_ID
 * @property integer $SORT
 */
class BSmileSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_smile_set';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PARENT_ID', 'SORT'], 'integer'],
            [['TYPE'], 'string', 'max' => 1],
            [['STRING_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TYPE' => Yii::t('app', 'Type'),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'STRING_ID' => Yii::t('app', 'String '),
            'SORT' => Yii::t('app', 'Sort'),
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
