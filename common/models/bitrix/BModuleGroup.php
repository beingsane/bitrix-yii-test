<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_module_group".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property integer $GROUP_ID
 * @property string $G_ACCESS
 * @property string $SITE_ID
 */
class BModuleGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_module_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MODULE_ID', 'GROUP_ID', 'G_ACCESS'], 'required'],
            [['GROUP_ID'], 'integer'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['G_ACCESS'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2],
            [['MODULE_ID', 'GROUP_ID', 'SITE_ID'], 'unique', 'targetAttribute' => ['MODULE_ID', 'GROUP_ID', 'SITE_ID'], 'message' => 'The combination of Module , Group  and Site  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'G_ACCESS' => Yii::t('app', 'G  Access'),
            'SITE_ID' => Yii::t('app', 'Site '),
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
