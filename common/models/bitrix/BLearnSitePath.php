<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_site_path".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $PATH
 * @property string $TYPE
 */
class BLearnSitePath extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_site_path';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'PATH'], 'required'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['PATH'], 'string', 'max' => 255],
            [['TYPE'], 'string', 'max' => 1],
            [['SITE_ID', 'TYPE'], 'unique', 'targetAttribute' => ['SITE_ID', 'TYPE'], 'message' => 'The combination of Site  and Type has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'PATH' => Yii::t('app', 'Path'),
            'TYPE' => Yii::t('app', 'Type'),
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
