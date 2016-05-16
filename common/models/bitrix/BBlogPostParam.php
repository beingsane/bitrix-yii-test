<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_post_param".
 *
 * @property integer $ID
 * @property integer $POST_ID
 * @property integer $USER_ID
 * @property string $NAME
 * @property string $VALUE
 */
class BBlogPostParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_post_param';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POST_ID', 'USER_ID'], 'integer'],
            [['NAME', 'VALUE'], 'required'],
            [['NAME'], 'string', 'max' => 50],
            [['VALUE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'POST_ID' => Yii::t('app', 'Post '),
            'USER_ID' => Yii::t('app', 'User '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
