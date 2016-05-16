<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_suggest".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $FILTER_MD5
 * @property string $PHRASE
 * @property double $RATE
 * @property string $TIMESTAMP_X
 * @property integer $RESULT_COUNT
 */
class BSearchSuggest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_suggest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'FILTER_MD5', 'PHRASE', 'RATE', 'TIMESTAMP_X', 'RESULT_COUNT'], 'required'],
            [['RATE'], 'number'],
            [['TIMESTAMP_X'], 'safe'],
            [['RESULT_COUNT'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['FILTER_MD5'], 'string', 'max' => 32],
            [['PHRASE'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'FILTER_MD5' => Yii::t('app', 'Filter  Md5'),
            'PHRASE' => Yii::t('app', 'Phrase'),
            'RATE' => Yii::t('app', 'Rate'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'RESULT_COUNT' => Yii::t('app', 'Result  Count'),
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
