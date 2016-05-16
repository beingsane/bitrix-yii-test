<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_searcher_hit".
 *
 * @property integer $ID
 * @property string $DATE_HIT
 * @property integer $SEARCHER_ID
 * @property string $URL
 * @property string $URL_404
 * @property string $IP
 * @property string $USER_AGENT
 * @property integer $HIT_KEEP_DAYS
 * @property string $SITE_ID
 */
class BStatSearcherHit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_searcher_hit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_HIT'], 'safe'],
            [['SEARCHER_ID', 'HIT_KEEP_DAYS'], 'integer'],
            [['URL'], 'required'],
            [['URL', 'USER_AGENT'], 'string'],
            [['URL_404'], 'string', 'max' => 1],
            [['IP'], 'string', 'max' => 15],
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
            'URL' => Yii::t('app', 'Url'),
            'URL_404' => Yii::t('app', 'Url 404'),
            'IP' => Yii::t('app', 'Ip'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'HIT_KEEP_DAYS' => Yii::t('app', 'Hit  Keep  Days'),
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
