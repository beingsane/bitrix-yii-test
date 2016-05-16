<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_channel_2_group".
 *
 * @property integer $ID
 * @property integer $CHANNEL_ID
 * @property integer $GROUP_ID
 * @property integer $PERMISSION
 */
class BVoteChannel2Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_channel_2_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHANNEL_ID', 'GROUP_ID', 'PERMISSION'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'PERMISSION' => Yii::t('app', 'Permission'),
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
