<?php
/**
 * This is the template for generating CRUD search class of the specified model.
 */

use yii\helpers\StringHelper;
use yii\helpers\Inflector;


/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$modelClass = StringHelper::basename($generator->modelClass);
$searchModelClass = StringHelper::basename($generator->searchModelClass);
$rules = $generator->generateSearchRules();
$labels = $generator->generateSearchLabels();
$searchAttributes = $generator->getSearchAttributes();
$searchConditions = $generator->generateSearchConditions();


$labelDefinitions = [];
foreach ($labels as $attribute => $text) {
    $labelDefinitions[] = "'$attribute' => " . $generator->generateString($text);
}


echo "<?php\n";
?>

namespace <?= StringHelper::dirname(ltrim($generator->searchModelClass, '\\')) ?>;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use <?= ltrim($generator->modelClass, '\\') ?>;

/**
 * <?= $searchModelClass ?> represents the model behind the search form about `<?= $generator->modelClass ?>`.
 */
class <?= $searchModelClass ?> extends Model
{
    public $<?= implode(";\n    public $", $searchAttributes) ?>;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            <?= implode(",\n            ", $rules) ?>,
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            <?= implode(",\n            ", $labelDefinitions) ?>,
<?php
        $relationLabels = [];
        foreach ($generator->modelRelations as $field => $relation) {
            $relationName = $relation['relationName'];
            $relationLabels[] = "'".lcfirst($relationName).".name' => " . $generator->generateString(Inflector::camel2words($relationName)) . ",\n";
        }

        if ($relationLabels) {
            echo "\n            " . implode("            ", $relationLabels);
        }
?>
        ];
    }

    /**
     * Checks if the filter panel should be showed as open
     * @return bool Returns true if any search attribute is filled
     */
    public function isOpen()
    {
        $attributes = $this->safeAttributes();
        foreach ($attributes as $attribute) {
            if (!empty($this->$attribute)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = <?= $modelClass ?>::find();
<?php foreach ($generator->modelRelations as $relation) { ?>
        $query->joinWith(['<?= lcfirst($relation['relationName']) ?>']);
<?php } ?>

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
<?php foreach ($generator->modelRelations as $relation) { ?>

        $dataProvider->sort->attributes['<?= lcfirst($relation['relationName']) ?>.name'] = [
            'asc'  => ['<?= $relation['relatedTable'] . '.' . $generator->getNameColumn($relation) ?>' => SORT_ASC],
            'desc' => ['<?= $relation['relatedTable'] . '.' . $generator->getNameColumn($relation) ?>' => SORT_DESC],
        ];
<?php } ?>

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        <?= implode("\n        ", $searchConditions) ?>

        return $dataProvider;
    }
}
