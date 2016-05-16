<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_points_lang".
 *
 * @property integer $POINTS_ID
 * @property string $LID
 * @property string $NAME
 */
class BForumPointsLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_points_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POINTS_ID', 'LID'], 'required'],
            [['POINTS_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POINTS_ID' => Yii::t('app', 'Points '),
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
        $list = ArrayHelper::map($models, 'POINTS_ID', 'NAME');
        return $list;
    }
}
