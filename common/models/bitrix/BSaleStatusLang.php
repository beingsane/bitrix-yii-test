<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_status_lang".
 *
 * @property string $STATUS_ID
 * @property string $LID
 * @property string $NAME
 * @property string $DESCRIPTION
 */
class BSaleStatusLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_status_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'LID', 'NAME'], 'required'],
            [['STATUS_ID', 'LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 100],
            [['DESCRIPTION'], 'string', 'max' => 250],
            [['STATUS_ID', 'LID'], 'unique', 'targetAttribute' => ['STATUS_ID', 'LID'], 'message' => 'The combination of Status  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_ID' => Yii::t('app', 'Status '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'STATUS_ID', 'NAME');
        return $list;
    }
}
