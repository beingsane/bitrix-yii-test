<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_stat".
 *
 * @property string $ID
 * @property integer $USER_ID
 * @property string $IP_ADDRESS
 * @property string $PHPSESSID
 * @property string $LAST_VISIT
 * @property string $SITE_ID
 * @property integer $FORUM_ID
 * @property integer $TOPIC_ID
 * @property string $SHOW_NAME
 */
class BForumStat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_stat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'FORUM_ID', 'TOPIC_ID'], 'integer'],
            [['LAST_VISIT'], 'safe'],
            [['IP_ADDRESS'], 'string', 'max' => 128],
            [['PHPSESSID'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2],
            [['SHOW_NAME'], 'string', 'max' => 101]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'IP_ADDRESS' => Yii::t('app', 'Ip  Address'),
            'PHPSESSID' => Yii::t('app', 'Phpsessid'),
            'LAST_VISIT' => Yii::t('app', 'Last  Visit'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'TOPIC_ID' => Yii::t('app', 'Topic '),
            'SHOW_NAME' => Yii::t('app', 'Show  Name'),
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
