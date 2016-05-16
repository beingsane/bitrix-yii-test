<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_group_subordinate".
 *
 * @property integer $ID
 * @property string $AR_SUBGROUP_ID
 */
class BGroupSubordinate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_group_subordinate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'AR_SUBGROUP_ID'], 'required'],
            [['ID'], 'integer'],
            [['AR_SUBGROUP_ID'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'AR_SUBGROUP_ID' => Yii::t('app', 'Ar  Subgroup '),
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
