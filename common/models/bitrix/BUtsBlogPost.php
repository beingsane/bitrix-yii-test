<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_blog_post".
 *
 * @property integer $VALUE_ID
 * @property string $UF_BLOG_POST_DOC
 * @property integer $UF_BLOG_POST_URL_PRV
 * @property integer $UF_GRATITUDE
 * @property string $UF_CATEGORY_CODE
 * @property string $UF_ANSWER_ID
 * @property string $UF_ORIGINAL_ID
 * @property integer $UF_STATUS
 * @property integer $UF_BLOG_POST_IMPRTNT
 * @property integer $UF_BLOG_POST_VOTE
 */
class BUtsBlogPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_blog_post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID', 'UF_BLOG_POST_URL_PRV', 'UF_GRATITUDE', 'UF_STATUS', 'UF_BLOG_POST_IMPRTNT', 'UF_BLOG_POST_VOTE'], 'integer'],
            [['UF_BLOG_POST_DOC', 'UF_CATEGORY_CODE', 'UF_ANSWER_ID', 'UF_ORIGINAL_ID'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_BLOG_POST_DOC' => Yii::t('app', 'Uf  Blog  Post  Doc'),
            'UF_BLOG_POST_URL_PRV' => Yii::t('app', 'Uf  Blog  Post  Url  Prv'),
            'UF_GRATITUDE' => Yii::t('app', 'Uf  Gratitude'),
            'UF_CATEGORY_CODE' => Yii::t('app', 'Uf  Category  Code'),
            'UF_ANSWER_ID' => Yii::t('app', 'Uf  Answer '),
            'UF_ORIGINAL_ID' => Yii::t('app', 'Uf  Original '),
            'UF_STATUS' => Yii::t('app', 'Uf  Status'),
            'UF_BLOG_POST_IMPRTNT' => Yii::t('app', 'Uf  Blog  Post  Imprtnt'),
            'UF_BLOG_POST_VOTE' => Yii::t('app', 'Uf  Blog  Post  Vote'),
        ];
    }

    public function getName()
    {
        return $this->VALUE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'VALUE_ID', 'VALUE_ID');
        return $list;
    }
}
