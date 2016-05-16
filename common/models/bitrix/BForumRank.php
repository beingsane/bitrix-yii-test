<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_rank".
 *
 * @property integer $ID
 * @property string $CODE
 * @property integer $MIN_NUM_POSTS
 */
class BForumRank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MIN_NUM_POSTS'], 'integer'],
            [['CODE'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'MIN_NUM_POSTS' => Yii::t('app', 'Min  Num  Posts'),
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
