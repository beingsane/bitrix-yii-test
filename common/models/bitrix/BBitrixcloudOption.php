<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bitrixcloud_option".
 *
 * @property integer $ID
 * @property string $NAME
 * @property integer $SORT
 * @property string $PARAM_KEY
 * @property string $PARAM_VALUE
 */
class BBitrixcloudOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bitrixcloud_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'SORT'], 'required'],
            [['SORT'], 'integer'],
            [['NAME', 'PARAM_KEY'], 'string', 'max' => 50],
            [['PARAM_VALUE'], 'string', 'max' => 200]
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
            'SORT' => Yii::t('app', 'Sort'),
            'PARAM_KEY' => Yii::t('app', 'Param  Key'),
            'PARAM_VALUE' => Yii::t('app', 'Param  Value'),
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
