<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_phrase".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $SITE_ID
 * @property integer $RESULT_COUNT
 * @property integer $PAGES
 * @property string $SESSION_ID
 * @property string $PHRASE
 * @property string $TAGS
 * @property string $URL_TO
 * @property string $URL_TO_404
 * @property string $URL_TO_SITE_ID
 * @property integer $STAT_SESS_ID
 * @property string $EVENT1
 */
class BSearchPhrase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_phrase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'SITE_ID', 'RESULT_COUNT', 'PAGES', 'SESSION_ID'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['RESULT_COUNT', 'PAGES', 'STAT_SESS_ID'], 'integer'],
            [['URL_TO'], 'string'],
            [['SITE_ID', 'URL_TO_SITE_ID'], 'string', 'max' => 2],
            [['SESSION_ID'], 'string', 'max' => 32],
            [['PHRASE', 'TAGS'], 'string', 'max' => 250],
            [['URL_TO_404'], 'string', 'max' => 1],
            [['EVENT1'], 'string', 'max' => 50]
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
            'RESULT_COUNT' => Yii::t('app', 'Result  Count'),
            'PAGES' => Yii::t('app', 'Pages'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'PHRASE' => Yii::t('app', 'Phrase'),
            'TAGS' => Yii::t('app', 'Tags'),
            'URL_TO' => Yii::t('app', 'Url  To'),
            'URL_TO_404' => Yii::t('app', 'Url  To 404'),
            'URL_TO_SITE_ID' => Yii::t('app', 'Url  To  Site '),
            'STAT_SESS_ID' => Yii::t('app', 'Stat  Sess '),
            'EVENT1' => Yii::t('app', 'Event1'),
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
