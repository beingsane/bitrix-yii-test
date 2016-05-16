<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_smile_lang".
 *
 * @property integer $ID
 * @property string $TYPE
 * @property integer $SID
 * @property string $LID
 * @property string $NAME
 */
class BSmileLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_smile_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SID', 'LID', 'NAME'], 'required'],
            [['SID'], 'integer'],
            [['TYPE'], 'string', 'max' => 1],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 255],
            [['TYPE', 'SID', 'LID'], 'unique', 'targetAttribute' => ['TYPE', 'SID', 'LID'], 'message' => 'The combination of Type, Sid and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TYPE' => Yii::t('app', 'Type'),
            'SID' => Yii::t('app', 'Sid'),
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
