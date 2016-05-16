<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_posting_group".
 *
 * @property integer $POSTING_ID
 * @property integer $GROUP_ID
 */
class BPostingGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_posting_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID', 'GROUP_ID'], 'required'],
            [['POSTING_ID', 'GROUP_ID'], 'integer'],
            [['POSTING_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['POSTING_ID', 'GROUP_ID'], 'message' => 'The combination of Posting  and Group  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'GROUP_ID' => Yii::t('app', 'Group '),
        ];
    }

    public function getName()
    {
        return $this->POSTING_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'POSTING_ID', 'POSTING_ID');
        return $list;
    }
}
