<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_site".
 *
 * @property integer $LOG_ID
 * @property string $SITE_ID
 */
class BSonetLogSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOG_ID', 'SITE_ID'], 'required'],
            [['LOG_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LOG_ID' => Yii::t('app', 'Log '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->LOG_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LOG_ID', 'LOG_ID');
        return $list;
    }
}
