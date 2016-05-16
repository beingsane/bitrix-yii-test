<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum2site".
 *
 * @property integer $FORUM_ID
 * @property string $SITE_ID
 * @property string $PATH2FORUM_MESSAGE
 */
class BForum2site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum2site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORUM_ID', 'SITE_ID'], 'required'],
            [['FORUM_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['PATH2FORUM_MESSAGE'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FORUM_ID' => Yii::t('app', 'Forum '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'PATH2FORUM_MESSAGE' => Yii::t('app', 'Path2 Forum  Message'),
        ];
    }

    public function getName()
    {
        return $this->FORUM_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'FORUM_ID', 'FORUM_ID');
        return $list;
    }
}
