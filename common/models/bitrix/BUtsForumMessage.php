<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_forum_message".
 *
 * @property integer $VALUE_ID
 * @property integer $UF_FORUM_MES_URL_PRV
 */
class BUtsForumMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_forum_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID', 'UF_FORUM_MES_URL_PRV'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_FORUM_MES_URL_PRV' => Yii::t('app', 'Uf  Forum  Mes  Url  Prv'),
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
