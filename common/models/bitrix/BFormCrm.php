<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_crm".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $ACTIVE
 * @property string $URL
 * @property string $AUTH_HASH
 */
class BFormCrm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_crm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'URL'], 'string', 'max' => 255],
            [['ACTIVE'], 'string', 'max' => 1],
            [['AUTH_HASH'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'URL' => Yii::t('app', 'Url'),
            'AUTH_HASH' => Yii::t('app', 'Auth  Hash'),
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
