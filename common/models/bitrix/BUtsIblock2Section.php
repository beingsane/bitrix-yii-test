<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_iblock_2_section".
 *
 * @property integer $VALUE_ID
 * @property string $UF_BROWSER_TITLE
 * @property string $UF_KEYWORDS
 * @property string $UF_META_DESCRIPTION
 * @property integer $UF_BACKGROUND_IMAGE
 */
class BUtsIblock2Section extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_iblock_2_section';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID', 'UF_BACKGROUND_IMAGE'], 'integer'],
            [['UF_BROWSER_TITLE', 'UF_KEYWORDS', 'UF_META_DESCRIPTION'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_BROWSER_TITLE' => Yii::t('app', 'Uf  Browser  Title'),
            'UF_KEYWORDS' => Yii::t('app', 'Uf  Keywords'),
            'UF_META_DESCRIPTION' => Yii::t('app', 'Uf  Meta  Description'),
            'UF_BACKGROUND_IMAGE' => Yii::t('app', 'Uf  Background  Image'),
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
