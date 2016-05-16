<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_city".
 *
 * @property integer $ID
 * @property string $COUNTRY_ID
 * @property string $REGION
 * @property string $NAME
 * @property string $XML_ID
 * @property integer $SESSIONS
 * @property integer $NEW_GUESTS
 * @property integer $HITS
 * @property integer $C_EVENTS
 */
class BStatCity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COUNTRY_ID'], 'required'],
            [['SESSIONS', 'NEW_GUESTS', 'HITS', 'C_EVENTS'], 'integer'],
            [['COUNTRY_ID'], 'string', 'max' => 2],
            [['REGION'], 'string', 'max' => 200],
            [['NAME', 'XML_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'COUNTRY_ID' => Yii::t('app', 'Country '),
            'REGION' => Yii::t('app', 'Region'),
            'NAME' => Yii::t('app', 'Name'),
            'XML_ID' => Yii::t('app', 'Xml '),
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
