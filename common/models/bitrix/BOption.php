<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_option".
 *
 * @property string $MODULE_ID
 * @property string $NAME
 * @property string $VALUE
 * @property string $DESCRIPTION
 * @property string $SITE_ID
 */
class BOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME'], 'required'],
            [['VALUE'], 'string'],
            [['MODULE_ID', 'NAME'], 'string', 'max' => 50],
            [['DESCRIPTION'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2],
            [['MODULE_ID', 'NAME', 'SITE_ID'], 'unique', 'targetAttribute' => ['MODULE_ID', 'NAME', 'SITE_ID'], 'message' => 'The combination of Module , Name and Site  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MODULE_ID' => Yii::t('app', 'Module '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'MODULE_ID', 'NAME');
        return $list;
    }
}
