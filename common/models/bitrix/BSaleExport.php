<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_export".
 *
 * @property integer $ID
 * @property integer $PERSON_TYPE_ID
 * @property string $VARS
 */
class BSaleExport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_export';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID'], 'required'],
            [['PERSON_TYPE_ID'], 'integer'],
            [['VARS'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'VARS' => Yii::t('app', 'Vars'),
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
