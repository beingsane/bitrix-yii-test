<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_right".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $GROUP_CODE
 */
class BSearchContentRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'GROUP_CODE'], 'required'],
            [['SEARCH_CONTENT_ID'], 'integer'],
            [['GROUP_CODE'], 'string', 'max' => 100],
            [['SEARCH_CONTENT_ID', 'GROUP_CODE'], 'unique', 'targetAttribute' => ['SEARCH_CONTENT_ID', 'GROUP_CODE'], 'message' => 'The combination of Search  Content  and Group  Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEARCH_CONTENT_ID' => Yii::t('app', 'Search  Content '),
            'GROUP_CODE' => Yii::t('app', 'Group  Code'),
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
