<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_white_list".
 *
 * @property integer $ID
 * @property string $WHITE_SUBSTR
 */
class BSecWhiteList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_white_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'WHITE_SUBSTR'], 'required'],
            [['ID'], 'integer'],
            [['WHITE_SUBSTR'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'WHITE_SUBSTR' => Yii::t('app', 'White  Substr'),
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
