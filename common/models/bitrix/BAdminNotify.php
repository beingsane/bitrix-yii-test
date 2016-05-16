<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_admin_notify".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property string $TAG
 * @property string $MESSAGE
 * @property string $ENABLE_CLOSE
 * @property string $PUBLIC_SECTION
 */
class BAdminNotify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_admin_notify';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MESSAGE'], 'string'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['TAG'], 'string', 'max' => 255],
            [['ENABLE_CLOSE', 'PUBLIC_SECTION'], 'string', 'max' => 1]
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
            'TAG' => Yii::t('app', 'Tag'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'ENABLE_CLOSE' => Yii::t('app', 'Enable  Close'),
            'PUBLIC_SECTION' => Yii::t('app', 'Public  Section'),
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
