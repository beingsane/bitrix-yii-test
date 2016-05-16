<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_text".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $SEARCH_CONTENT_MD5
 * @property string $SEARCHABLE_CONTENT
 */
class BSearchContentText extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_text';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'SEARCH_CONTENT_MD5'], 'required'],
            [['SEARCH_CONTENT_ID'], 'integer'],
            [['SEARCHABLE_CONTENT'], 'string'],
            [['SEARCH_CONTENT_MD5'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEARCH_CONTENT_ID' => Yii::t('app', 'Search  Content '),
            'SEARCH_CONTENT_MD5' => Yii::t('app', 'Search  Content  Md5'),
            'SEARCHABLE_CONTENT' => Yii::t('app', 'Searchable  Content'),
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
