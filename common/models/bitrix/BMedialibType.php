<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_medialib_type".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $CODE
 * @property string $EXT
 * @property string $SYSTEM
 * @property string $DESCRIPTION
 */
class BMedialibType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_medialib_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE', 'EXT'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['NAME', 'CODE', 'EXT'], 'string', 'max' => 255],
            [['SYSTEM'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'CODE' => Yii::t('app', 'Code'),
            'EXT' => Yii::t('app', 'Ext'),
            'SYSTEM' => Yii::t('app', 'System'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
