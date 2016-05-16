<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_searcher_params".
 *
 * @property integer $ID
 * @property integer $SEARCHER_ID
 * @property string $DOMAIN
 * @property string $VARIABLE
 * @property string $CHAR_SET
 */
class BStatSearcherParams extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_searcher_params';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SEARCHER_ID'], 'integer'],
            [['DOMAIN', 'VARIABLE', 'CHAR_SET'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SEARCHER_ID' => Yii::t('app', 'Searcher '),
            'DOMAIN' => Yii::t('app', 'Domain'),
            'VARIABLE' => Yii::t('app', 'Variable'),
            'CHAR_SET' => Yii::t('app', 'Char  Set'),
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
