<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_counter".
 *
 * @property integer $USER_ID
 * @property string $SITE_ID
 * @property string $CODE
 * @property integer $CNT
 * @property string $LAST_DATE
 * @property integer $PAGE_SIZE
 * @property string $PAGE_LAST_DATE_1
 */
class BSonetLogCounter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_counter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SITE_ID', 'CODE'], 'required'],
            [['USER_ID', 'CNT', 'PAGE_SIZE'], 'integer'],
            [['LAST_DATE', 'PAGE_LAST_DATE_1'], 'safe'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['CODE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'CODE' => Yii::t('app', 'Code'),
            'CNT' => Yii::t('app', 'Cnt'),
            'LAST_DATE' => Yii::t('app', 'Last  Date'),
            'PAGE_SIZE' => Yii::t('app', 'Page  Size'),
            'PAGE_LAST_DATE_1' => Yii::t('app', 'Page  Last  Date 1'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
