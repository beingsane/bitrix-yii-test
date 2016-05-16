<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_load".
 *
 * @property string $NAME
 * @property string $VALUE
 * @property string $TYPE
 * @property string $LAST_USED
 */
class BCatalogLoad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_load';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'VALUE', 'TYPE'], 'required'],
            [['VALUE'], 'string'],
            [['NAME'], 'string', 'max' => 250],
            [['TYPE', 'LAST_USED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
            'TYPE' => Yii::t('app', 'Type'),
            'LAST_USED' => Yii::t('app', 'Last  Used'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'NAME', 'NAME');
        return $list;
    }
}
