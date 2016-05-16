<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_rest_activity".
 *
 * @property integer $ID
 * @property string $APP_ID
 * @property string $APP_NAME
 * @property string $CODE
 * @property string $INTERNAL_CODE
 * @property string $HANDLER
 * @property integer $AUTH_USER_ID
 * @property string $USE_SUBSCRIPTION
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $PROPERTIES
 * @property string $RETURN_PROPERTIES
 * @property string $DOCUMENT_TYPE
 * @property string $FILTER
 */
class BBpRestActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_rest_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['APP_ID', 'CODE', 'INTERNAL_CODE', 'HANDLER'], 'required'],
            [['APP_NAME', 'NAME', 'DESCRIPTION', 'PROPERTIES', 'RETURN_PROPERTIES', 'DOCUMENT_TYPE', 'FILTER'], 'string'],
            [['AUTH_USER_ID'], 'integer'],
            [['APP_ID', 'CODE'], 'string', 'max' => 128],
            [['INTERNAL_CODE'], 'string', 'max' => 32],
            [['HANDLER'], 'string', 'max' => 1000],
            [['USE_SUBSCRIPTION'], 'string', 'max' => 1],
            [['INTERNAL_CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'APP_ID' => Yii::t('app', 'App '),
            'APP_NAME' => Yii::t('app', 'App  Name'),
            'CODE' => Yii::t('app', 'Code'),
            'INTERNAL_CODE' => Yii::t('app', 'Internal  Code'),
            'HANDLER' => Yii::t('app', 'Handler'),
            'AUTH_USER_ID' => Yii::t('app', 'Auth  User '),
            'USE_SUBSCRIPTION' => Yii::t('app', 'Use  Subscription'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'PROPERTIES' => Yii::t('app', 'Properties'),
            'RETURN_PROPERTIES' => Yii::t('app', 'Return  Properties'),
            'DOCUMENT_TYPE' => Yii::t('app', 'Document  Type'),
            'FILTER' => Yii::t('app', 'Filter'),
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
