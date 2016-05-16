<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_phrase_list".
 *
 * @property integer $ID
 * @property string $DATE_HIT
 * @property integer $SEARCHER_ID
 * @property integer $REFERER_ID
 * @property string $PHRASE
 * @property string $URL_FROM
 * @property string $URL_TO
 * @property string $URL_TO_404
 * @property integer $SESSION_ID
 * @property string $SITE_ID
 */
class BStatPhraseList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_phrase_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_HIT'], 'safe'],
            [['SEARCHER_ID', 'REFERER_ID', 'SESSION_ID'], 'integer'],
            [['PHRASE'], 'required'],
            [['URL_FROM', 'URL_TO'], 'string'],
            [['PHRASE'], 'string', 'max' => 255],
            [['URL_TO_404'], 'string', 'max' => 1],
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
            'DATE_HIT' => Yii::t('app', 'Date  Hit'),
            'SEARCHER_ID' => Yii::t('app', 'Searcher '),
            'REFERER_ID' => Yii::t('app', 'Referer '),
            'PHRASE' => Yii::t('app', 'Phrase'),
            'URL_FROM' => Yii::t('app', 'Url  From'),
            'URL_TO' => Yii::t('app', 'Url  To'),
            'URL_TO_404' => Yii::t('app', 'Url  To 404'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
