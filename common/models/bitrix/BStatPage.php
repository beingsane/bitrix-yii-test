<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_page".
 *
 * @property integer $ID
 * @property string $DATE_STAT
 * @property string $DIR
 * @property string $URL
 * @property string $URL_404
 * @property integer $URL_HASH
 * @property string $SITE_ID
 * @property integer $COUNTER
 * @property integer $ENTER_COUNTER
 * @property integer $EXIT_COUNTER
 */
class BStatPage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_STAT'], 'safe'],
            [['URL'], 'required'],
            [['URL'], 'string'],
            [['URL_HASH', 'COUNTER', 'ENTER_COUNTER', 'EXIT_COUNTER'], 'integer'],
            [['DIR', 'URL_404'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_STAT' => Yii::t('app', 'Date  Stat'),
            'DIR' => Yii::t('app', 'Dir'),
            'URL' => Yii::t('app', 'Url'),
            'URL_404' => Yii::t('app', 'Url 404'),
            'URL_HASH' => Yii::t('app', 'Url  Hash'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'COUNTER' => Yii::t('app', 'Counter'),
            'ENTER_COUNTER' => Yii::t('app', 'Enter  Counter'),
            'EXIT_COUNTER' => Yii::t('app', 'Exit  Counter'),
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
