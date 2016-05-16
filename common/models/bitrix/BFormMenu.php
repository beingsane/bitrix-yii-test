<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_menu".
 *
 * @property integer $ID
 * @property integer $FORM_ID
 * @property string $LID
 * @property string $MENU
 */
class BFormMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID'], 'integer'],
            [['LID', 'MENU'], 'required'],
            [['LID'], 'string', 'max' => 2],
            [['MENU'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORM_ID' => Yii::t('app', 'Form '),
            'LID' => Yii::t('app', 'Lid'),
            'MENU' => Yii::t('app', 'Menu'),
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
