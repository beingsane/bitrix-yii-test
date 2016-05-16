<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_channel".
 *
 * @property integer $ID
 * @property string $SYMBOLIC_NAME
 * @property integer $C_SORT
 * @property string $FIRST_SITE_ID
 * @property string $ACTIVE
 * @property string $HIDDEN
 * @property string $TIMESTAMP_X
 * @property string $TITLE
 * @property string $VOTE_SINGLE
 * @property string $USE_CAPTCHA
 */
class BVoteChannel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_channel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SYMBOLIC_NAME', 'TITLE'], 'required'],
            [['C_SORT'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['SYMBOLIC_NAME', 'TITLE'], 'string', 'max' => 255],
            [['FIRST_SITE_ID'], 'string', 'max' => 2],
            [['ACTIVE', 'HIDDEN', 'VOTE_SINGLE', 'USE_CAPTCHA'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SYMBOLIC_NAME' => Yii::t('app', 'Symbolic  Name'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'HIDDEN' => Yii::t('app', 'Hidden'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'TITLE' => Yii::t('app', 'Title'),
            'VOTE_SINGLE' => Yii::t('app', 'Vote  Single'),
            'USE_CAPTCHA' => Yii::t('app', 'Use  Captcha'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
