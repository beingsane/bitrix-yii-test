<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_search_engine".
 *
 * @property integer $ID
 * @property string $CODE
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $NAME
 * @property string $CLIENT_ID
 * @property string $CLIENT_SECRET
 * @property string $REDIRECT_URI
 * @property string $SETTINGS
 */
class BSeoSearchEngine extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_search_engine';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE', 'NAME'], 'required'],
            [['SORT'], 'integer'],
            [['SETTINGS'], 'string'],
            [['CODE'], 'string', 'max' => 50],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME', 'CLIENT_ID', 'CLIENT_SECRET', 'REDIRECT_URI'], 'string', 'max' => 255],
            [['CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'CLIENT_ID' => Yii::t('app', 'Client '),
            'CLIENT_SECRET' => Yii::t('app', 'Client  Secret'),
            'REDIRECT_URI' => Yii::t('app', 'Redirect  Uri'),
            'SETTINGS' => Yii::t('app', 'Settings'),
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
