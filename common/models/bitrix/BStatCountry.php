<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_country".
 *
 * @property string $ID
 * @property string $SHORT_NAME
 * @property string $NAME
 * @property integer $SESSIONS
 * @property integer $NEW_GUESTS
 * @property integer $HITS
 * @property integer $C_EVENTS
 */
class BStatCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['SESSIONS', 'NEW_GUESTS', 'HITS', 'C_EVENTS'], 'integer'],
            [['ID'], 'string', 'max' => 2],
            [['SHORT_NAME'], 'string', 'max' => 3],
            [['NAME'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SHORT_NAME' => Yii::t('app', 'Short  Name'),
            'NAME' => Yii::t('app', 'Name'),
            'SESSIONS' => Yii::t('app', 'Sessions'),
            'NEW_GUESTS' => Yii::t('app', 'New  Guests'),
            'HITS' => Yii::t('app', 'Hits'),
            'C_EVENTS' => Yii::t('app', 'C  Events'),
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
