<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_user_group".
 *
 * @property integer $ID
 * @property integer $BLOG_ID
 * @property string $NAME
 */
class BBlogUserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BLOG_ID'], 'integer'],
            [['NAME'], 'required'],
            [['NAME'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BLOG_ID' => Yii::t('app', 'Blog '),
            'NAME' => Yii::t('app', 'Name'),
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
