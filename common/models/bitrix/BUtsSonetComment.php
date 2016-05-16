<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_sonet_comment".
 *
 * @property integer $VALUE_ID
 * @property string $UF_SONET_COM_FILE
 * @property integer $UF_SONET_COM_URL_PRV
 */
class BUtsSonetComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_sonet_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID', 'UF_SONET_COM_URL_PRV'], 'integer'],
            [['UF_SONET_COM_FILE'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_SONET_COM_FILE' => Yii::t('app', 'Uf  Sonet  Com  File'),
            'UF_SONET_COM_URL_PRV' => Yii::t('app', 'Uf  Sonet  Com  Url  Prv'),
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
