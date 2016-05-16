<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_points2post".
 *
 * @property integer $ID
 * @property integer $MIN_NUM_POSTS
 * @property string $POINTS_PER_POST
 */
class BForumPoints2post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_points2post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MIN_NUM_POSTS'], 'required'],
            [['MIN_NUM_POSTS'], 'integer'],
            [['POINTS_PER_POST'], 'number'],
            [['MIN_NUM_POSTS'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MIN_NUM_POSTS' => Yii::t('app', 'Min  Num  Posts'),
            'POINTS_PER_POST' => Yii::t('app', 'Points  Per  Post'),
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
