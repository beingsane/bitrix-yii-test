<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_status_2_group".
 *
 * @property integer $ID
 * @property integer $STATUS_ID
 * @property integer $GROUP_ID
 * @property string $PERMISSION
 */
class BFormStatus2Group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_status_2_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'GROUP_ID'], 'integer'],
            [['PERMISSION'], 'required'],
            [['PERMISSION'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'PERMISSION' => Yii::t('app', 'Permission'),
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
