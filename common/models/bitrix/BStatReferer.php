<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_referer".
 *
 * @property integer $ID
 * @property string $DATE_FIRST
 * @property string $DATE_LAST
 * @property string $SITE_NAME
 * @property integer $SESSIONS
 * @property integer $HITS
 */
class BStatReferer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_referer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_FIRST', 'DATE_LAST'], 'safe'],
            [['SITE_NAME'], 'required'],
            [['SESSIONS', 'HITS'], 'integer'],
            [['SITE_NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_FIRST' => Yii::t('app', 'Date  First'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'SITE_NAME' => Yii::t('app', 'Site  Name'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'HITS' => Yii::t('app', 'Hits'),
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
