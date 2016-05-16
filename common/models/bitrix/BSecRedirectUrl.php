<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_redirect_url".
 *
 * @property string $IS_SYSTEM
 * @property integer $SORT
 * @property string $URL
 * @property string $PARAMETER_NAME
 */
class BSecRedirectUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_redirect_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['URL', 'PARAMETER_NAME'], 'required'],
            [['IS_SYSTEM'], 'string', 'max' => 1],
            [['URL', 'PARAMETER_NAME'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IS_SYSTEM' => Yii::t('app', 'Is  System'),
            'SORT' => Yii::t('app', 'Sort'),
            'URL' => Yii::t('app', 'Url'),
            'PARAMETER_NAME' => Yii::t('app', 'Parameter  Name'),
        ];
    }

    public function getName()
    {
        return $this->IS_SYSTEM;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IS_SYSTEM', 'IS_SYSTEM');
        return $list;
    }
}
