<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_site".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $SITE_ID
 * @property string $URL
 */
class BSearchContentSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'SITE_ID'], 'required'],
            [['SEARCH_CONTENT_ID'], 'integer'],
            [['URL'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2]
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
            'URL' => Yii::t('app', 'Url'),
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
