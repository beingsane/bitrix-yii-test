<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_question".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property string $TIMESTAMP_X
 * @property integer $VOTE_ID
 * @property integer $C_SORT
 * @property integer $COUNTER
 * @property string $QUESTION
 * @property string $QUESTION_TYPE
 * @property integer $IMAGE_ID
 * @property string $DIAGRAM
 * @property string $REQUIRED
 * @property string $DIAGRAM_TYPE
 * @property string $TEMPLATE
 * @property string $TEMPLATE_NEW
 */
class BVoteQuestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['VOTE_ID', 'C_SORT', 'COUNTER', 'IMAGE_ID'], 'integer'],
            [['QUESTION'], 'required'],
            [['QUESTION'], 'string'],
            [['ACTIVE', 'DIAGRAM', 'REQUIRED'], 'string', 'max' => 1],
            [['QUESTION_TYPE'], 'string', 'max' => 4],
            [['DIAGRAM_TYPE'], 'string', 'max' => 10],
            [['TEMPLATE', 'TEMPLATE_NEW'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'VOTE_ID' => Yii::t('app', 'Vote '),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'QUESTION' => Yii::t('app', 'Question'),
            'QUESTION_TYPE' => Yii::t('app', 'Question  Type'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'DIAGRAM' => Yii::t('app', 'Diagram'),
            'REQUIRED' => Yii::t('app', 'Required'),
            'DIAGRAM_TYPE' => Yii::t('app', 'Diagram  Type'),
            'TEMPLATE' => Yii::t('app', 'Template'),
            'TEMPLATE_NEW' => Yii::t('app', 'Template  New'),
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
