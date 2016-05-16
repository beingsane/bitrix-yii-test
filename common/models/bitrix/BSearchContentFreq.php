<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_freq".
 *
 * @property integer $STEM
 * @property string $LANGUAGE_ID
 * @property string $SITE_ID
 * @property double $FREQ
 * @property double $TF
 */
class BSearchContentFreq extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_freq';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STEM'], 'integer'],
            [['LANGUAGE_ID'], 'required'],
            [['FREQ', 'TF'], 'number'],
            [['LANGUAGE_ID', 'SITE_ID'], 'string', 'max' => 2],
            [['STEM', 'LANGUAGE_ID', 'SITE_ID'], 'unique', 'targetAttribute' => ['STEM', 'LANGUAGE_ID', 'SITE_ID'], 'message' => 'The combination of Stem, Language  and Site  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STEM' => Yii::t('app', 'Stem'),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'FREQ' => Yii::t('app', 'Freq'),
            'TF' => Yii::t('app', 'Tf'),
        ];
    }

    public function getName()
    {
        return $this->STEM;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'STEM', 'STEM');
        return $list;
    }
}
