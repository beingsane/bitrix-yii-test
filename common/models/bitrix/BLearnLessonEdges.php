<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_lesson_edges".
 *
 * @property integer $SOURCE_NODE
 * @property integer $TARGET_NODE
 * @property integer $SORT
 */
class BLearnLessonEdges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_lesson_edges';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SOURCE_NODE', 'TARGET_NODE'], 'required'],
            [['SOURCE_NODE', 'TARGET_NODE', 'SORT'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SOURCE_NODE' => Yii::t('app', 'Source  Node'),
            'TARGET_NODE' => Yii::t('app', 'Target  Node'),
            'SORT' => Yii::t('app', 'Sort'),
        ];
    }

    public function getName()
    {
        return $this->SOURCE_NODE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SOURCE_NODE', 'SOURCE_NODE');
        return $list;
    }
}
