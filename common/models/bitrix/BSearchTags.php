<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_tags".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $SITE_ID
 * @property string $NAME
 */
class BSearchTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'SITE_ID', 'NAME'], 'required'],
            [['SEARCH_CONTENT_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEARCH_CONTENT_ID' => Yii::t('app', 'Search  Content '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'NAME' => Yii::t('app', 'Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SEARCH_CONTENT_ID', 'NAME');
        return $list;
    }
}
