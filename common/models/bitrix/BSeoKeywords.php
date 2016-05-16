<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_keywords".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $URL
 * @property string $KEYWORDS
 */
class BSeoKeywords extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_keywords';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID'], 'required'],
            [['KEYWORDS'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['URL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'URL' => Yii::t('app', 'Url'),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
