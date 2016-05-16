<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_filter".
 *
 * @property integer $ID
 * @property integer $DICTIONARY_ID
 * @property string $WORDS
 * @property string $PATTERN
 * @property string $REPLACEMENT
 * @property string $DESCRIPTION
 * @property string $USE_IT
 * @property string $PATTERN_CREATE
 */
class BForumFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DICTIONARY_ID'], 'integer'],
            [['PATTERN', 'DESCRIPTION'], 'string'],
            [['WORDS', 'REPLACEMENT'], 'string', 'max' => 255],
            [['USE_IT'], 'string', 'max' => 50],
            [['PATTERN_CREATE'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DICTIONARY_ID' => Yii::t('app', 'Dictionary '),
            'WORDS' => Yii::t('app', 'Words'),
            'PATTERN' => Yii::t('app', 'Pattern'),
            'REPLACEMENT' => Yii::t('app', 'Replacement'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'USE_IT' => Yii::t('app', 'Use  It'),
            'PATTERN_CREATE' => Yii::t('app', 'Pattern  Create'),
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
