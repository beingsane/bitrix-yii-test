<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_ddl".
 *
 * @property integer $ID
 * @property string $SQL_TEXT
 */
class BStatDdl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_ddl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SQL_TEXT'], 'required'],
            [['SQL_TEXT'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SQL_TEXT' => Yii::t('app', 'Sql  Text'),
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
