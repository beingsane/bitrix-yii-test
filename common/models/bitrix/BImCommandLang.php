<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_command_lang".
 *
 * @property integer $ID
 * @property integer $COMMAND_ID
 * @property string $LANGUAGE_ID
 * @property string $TITLE
 * @property string $PARAMS
 */
class BImCommandLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_command_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COMMAND_ID', 'LANGUAGE_ID'], 'required'],
            [['COMMAND_ID'], 'integer'],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['TITLE', 'PARAMS'], 'string', 'max' => 255],
            [['COMMAND_ID', 'LANGUAGE_ID'], 'unique', 'targetAttribute' => ['COMMAND_ID', 'LANGUAGE_ID'], 'message' => 'The combination of Command  and Language  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'COMMAND_ID' => Yii::t('app', 'Command '),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'TITLE' => Yii::t('app', 'Title'),
            'PARAMS' => Yii::t('app', 'Params'),
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
