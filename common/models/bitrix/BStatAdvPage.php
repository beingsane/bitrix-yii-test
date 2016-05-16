<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_page".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property string $PAGE
 * @property string $C_TYPE
 */
class BStatAdvPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID'], 'integer'],
            [['PAGE'], 'required'],
            [['PAGE'], 'string', 'max' => 255],
            [['C_TYPE'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'PAGE' => Yii::t('app', 'Page'),
            'C_TYPE' => Yii::t('app', 'C  Type'),
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
