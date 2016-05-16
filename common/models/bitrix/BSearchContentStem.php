<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_content_stem".
 *
 * @property integer $SEARCH_CONTENT_ID
 * @property string $LANGUAGE_ID
 * @property integer $STEM
 * @property double $TF
 * @property double $PS
 */
class BSearchContentStem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_content_stem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCH_CONTENT_ID', 'LANGUAGE_ID', 'STEM', 'TF', 'PS'], 'required'],
            [['SEARCH_CONTENT_ID', 'STEM'], 'integer'],
            [['TF', 'PS'], 'number'],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['STEM', 'LANGUAGE_ID', 'TF', 'PS', 'SEARCH_CONTENT_ID'], 'unique', 'targetAttribute' => ['STEM', 'LANGUAGE_ID', 'TF', 'PS', 'SEARCH_CONTENT_ID'], 'message' => 'The combination of Search  Content , Language , Stem, Tf and Ps has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SEARCH_CONTENT_ID' => Yii::t('app', 'Search  Content '),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'STEM' => Yii::t('app', 'Stem'),
            'TF' => Yii::t('app', 'Tf'),
            'PS' => Yii::t('app', 'Ps'),
        ];
    }

    public function getName()
    {
        return $this->SEARCH_CONTENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SEARCH_CONTENT_ID', 'SEARCH_CONTENT_ID');
        return $list;
    }
}
