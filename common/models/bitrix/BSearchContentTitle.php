<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_title".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $SITE_ID
 * @property integer $POS
 * @property string $WORD
 */
class BSearchContentTitle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'SITE_ID', 'POS', 'WORD'], 'required'],
            [['SEARCH_CONTENT_ID', 'POS'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['WORD'], 'string', 'max' => 100],
            [['SITE_ID', 'WORD', 'SEARCH_CONTENT_ID', 'POS'], 'unique', 'targetAttribute' => ['SITE_ID', 'WORD', 'SEARCH_CONTENT_ID', 'POS'], 'message' => 'The combination of Search  Content , Site , Pos and Word has already been taken.']
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
            'POS' => Yii::t('app', 'Pos'),
            'WORD' => Yii::t('app', 'Word'),
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
