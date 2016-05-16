<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_adv_banner_2_page".
 *
 * @property integer $ID
 * @property integer $BANNER_ID
 * @property string $PAGE
 * @property string $SHOW_ON_PAGE
 */
class BAdvBanner2Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_adv_banner_2_page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['BANNER_ID'], 'integer'],
            [['PAGE'], 'required'],
            [['PAGE'], 'string', 'max' => 255],
            [['SHOW_ON_PAGE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'BANNER_ID' => Yii::t('app', 'Banner '),
            'PAGE' => Yii::t('app', 'Page'),
            'SHOW_ON_PAGE' => Yii::t('app', 'Show  On  Page'),
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
