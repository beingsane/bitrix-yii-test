<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_points".
 *
 * @property integer $ID
 * @property integer $MIN_POINTS
 * @property string $CODE
 * @property integer $VOTES
 */
class BForumPoints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MIN_POINTS', 'VOTES'], 'required'],
            [['MIN_POINTS', 'VOTES'], 'integer'],
            [['CODE'], 'string', 'max' => 100],
            [['MIN_POINTS'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MIN_POINTS' => Yii::t('app', 'Min  Points'),
            'CODE' => Yii::t('app', 'Code'),
            'VOTES' => Yii::t('app', 'Votes'),
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
