<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_rank_lang".
 *
 * @property integer $ID
 * @property integer $RANK_ID
 * @property string $LID
 * @property string $NAME
 */
class BForumRankLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_rank_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RANK_ID', 'LID', 'NAME'], 'required'],
            [['RANK_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 100],
            [['RANK_ID', 'LID'], 'unique', 'targetAttribute' => ['RANK_ID', 'LID'], 'message' => 'The combination of Rank  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RANK_ID' => Yii::t('app', 'Rank '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
