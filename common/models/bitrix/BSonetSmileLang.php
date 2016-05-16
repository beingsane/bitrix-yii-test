<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_smile_lang".
 *
 * @property integer $ID
 * @property integer $SMILE_ID
 * @property string $LID
 * @property string $NAME
 */
class BSonetSmileLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_smile_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SMILE_ID'], 'integer'],
            [['LID', 'NAME'], 'required'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 255],
            [['SMILE_ID', 'LID'], 'unique', 'targetAttribute' => ['SMILE_ID', 'LID'], 'message' => 'The combination of Smile  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SMILE_ID' => Yii::t('app', 'Smile '),
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
