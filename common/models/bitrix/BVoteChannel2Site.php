<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_channel_2_site".
 *
 * @property integer $CHANNEL_ID
 * @property string $SITE_ID
 */
class BVoteChannel2Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_channel_2_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHANNEL_ID', 'SITE_ID'], 'required'],
            [['CHANNEL_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->CHANNEL_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CHANNEL_ID', 'CHANNEL_ID');
        return $list;
    }
}
