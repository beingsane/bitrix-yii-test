<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_uts_blog_comment".
 *
 * @property integer $VALUE_ID
 * @property string $UF_BLOG_COMMENT_DOC
 * @property integer $UF_BLOG_COMM_URL_PRV
 */
class BUtsBlogComment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_uts_blog_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID'], 'required'],
            [['VALUE_ID', 'UF_BLOG_COMM_URL_PRV'], 'integer'],
            [['UF_BLOG_COMMENT_DOC'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VALUE_ID' => Yii::t('app', 'Value '),
            'UF_BLOG_COMMENT_DOC' => Yii::t('app', 'Uf  Blog  Comment  Doc'),
            'UF_BLOG_COMM_URL_PRV' => Yii::t('app', 'Uf  Blog  Comm  Url  Prv'),
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
