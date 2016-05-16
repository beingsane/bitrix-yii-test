<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_sitemap".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $SITE_ID
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $DATE_RUN
 * @property string $SETTINGS
 */
class BSeoSitemap extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_sitemap';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_RUN'], 'safe'],
            [['SITE_ID'], 'required'],
            [['SETTINGS'], 'string'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'DATE_RUN' => Yii::t('app', 'Date  Run'),
            'SETTINGS' => Yii::t('app', 'Settings'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
