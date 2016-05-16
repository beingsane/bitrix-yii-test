<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_param".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $PARAM_NAME
 * @property string $PARAM_VALUE
 */
class BSearchContentParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'PARAM_NAME', 'PARAM_VALUE'], 'required'],
            [['SEARCH_CONTENT_ID'], 'integer'],
            [['PARAM_NAME', 'PARAM_VALUE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEARCH_CONTENT_ID' => Yii::t('app', 'Search  Content '),
            'PARAM_NAME' => Yii::t('app', 'Param  Name'),
            'PARAM_VALUE' => Yii::t('app', 'Param  Value'),
        ];
    }

    public function getName()
    {
        return $this->SEARCH_CONTENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SEARCH_CONTENT_ID', 'SEARCH_CONTENT_ID');
        return $list;
    }
}
