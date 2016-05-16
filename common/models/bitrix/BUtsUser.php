<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_user".
 *
 * @property integer $VALUE_ID
 * @property string $UF_IM_SEARCH
 */
class BUtsUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID'], 'integer'],
            [['UF_IM_SEARCH'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_IM_SEARCH' => Yii::t('app', 'Uf  Im  Search'),
        ];
    }

    public function getName()
    {
        return $this->VALUE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'VALUE_ID', 'VALUE_ID');
        return $list;
    }
}
