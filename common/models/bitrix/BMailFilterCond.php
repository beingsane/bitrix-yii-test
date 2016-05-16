<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_filter_cond".
 *
 * @property integer $ID
 * @property integer $FILTER_ID
 * @property string $TYPE
 * @property string $STRINGS
 * @property string $COMPARE_TYPE
 */
class BMailFilterCond extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_filter_cond';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FILTER_ID', 'TYPE', 'STRINGS'], 'required'],
            [['FILTER_ID'], 'integer'],
            [['STRINGS'], 'string'],
            [['TYPE'], 'string', 'max' => 50],
            [['COMPARE_TYPE'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FILTER_ID' => Yii::t('app', 'Filter '),
            'TYPE' => Yii::t('app', 'Type'),
            'STRINGS' => Yii::t('app', 'Strings'),
            'COMPARE_TYPE' => Yii::t('app', 'Compare  Type'),
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
