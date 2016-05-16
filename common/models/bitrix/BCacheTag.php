<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_cache_tag".
 *
 * @property string $SITE_ID
 * @property string $CACHE_SALT
 * @property string $RELATIVE_PATH
 * @property string $TAG
 */
class BCacheTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_cache_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID'], 'string', 'max' => 2],
            [['CACHE_SALT'], 'string', 'max' => 4],
            [['RELATIVE_PATH'], 'string', 'max' => 255],
            [['TAG'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SITE_ID' => Yii::t('app', 'Site '),
            'CACHE_SALT' => Yii::t('app', 'Cache  Salt'),
            'RELATIVE_PATH' => Yii::t('app', 'Relative  Path'),
            'TAG' => Yii::t('app', 'Tag'),
        ];
    }

    public function getName()
    {
        return $this->SITE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SITE_ID', 'SITE_ID');
        return $list;
    }
}
