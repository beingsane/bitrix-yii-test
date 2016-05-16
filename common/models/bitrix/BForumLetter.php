<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_letter".
 *
 * @property integer $ID
 * @property integer $DICTIONARY_ID
 * @property string $LETTER
 * @property string $REPLACEMENT
 */
class BForumLetter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_letter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DICTIONARY_ID'], 'integer'],
            [['LETTER'], 'string', 'max' => 50],
            [['REPLACEMENT'], 'string', 'max' => 255]
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
            'LETTER' => Yii::t('app', 'Letter'),
            'REPLACEMENT' => Yii::t('app', 'Replacement'),
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
