<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_access".
 *
 * @property integer $USER_ID
 * @property string $PROVIDER_ID
 * @property string $ACCESS_CODE
 */
class BUserAccess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_access';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'integer'],
            [['PROVIDER_ID'], 'string', 'max' => 50],
            [['ACCESS_CODE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'PROVIDER_ID' => Yii::t('app', 'Provider '),
            'ACCESS_CODE' => Yii::t('app', 'Access  Code'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
