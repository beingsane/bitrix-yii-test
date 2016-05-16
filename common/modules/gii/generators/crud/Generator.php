<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace common\modules\gii\generators\crud;

use Yii;
use yii\db\Schema;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;
use yii\base\NotSupportedException;

class Generator extends \yii\gii\generators\crud\Generator
{
    private $classNames = [];

    public $modelRelations = [];


    public function generate()
    {
        $this->modelRelations = $this->getModelRelations();

        return parent::generate();
    }


    public function relationExists($attribute)
    {
        return isset($this->modelRelations[$attribute]);
    }

    public function generateField($attribute)
    {
        $str = '';

        $tableSchema = $this->getTableSchema();
        if ($tableSchema === false) {
            return $str;
        }


        if ($this->relationExists($attribute)) {
            $str = "\$render->selectField('$attribute', "
                . $this->modelRelations[$attribute]['relatedModelClassName']
                . "::getList())";

            return $str;
        }

        $column = $tableSchema->columns[$attribute];
        switch ($column->type) {
            case Schema::TYPE_DATE:
            case Schema::TYPE_DATETIME:
                $str = "\$render->dateField('$attribute')";
            break;

            default:
                $str = '';
            break;
        }

        return $str;
    }

    public function generateColumnFormat($column)
    {
        $format = 'text';

        switch ($column->type)
        {
            case Schema::TYPE_DATE:
                $format = 'date';
            break;

            case Schema::TYPE_DATETIME:
            case Schema::TYPE_TIMESTAMP:
                $format = 'datetime';
            break;

            default:
                $format = parent::generateColumnFormat($column);
            break;
        }

        return $format;
    }

    public function generateActiveSearchField($attribute)
    {
        $res = $this->generateField($attribute);
        if (!$res) {
            $res = parent::generateActiveSearchField($attribute);
        }

        return $res;
    }

    public function generateActiveField($attribute)
    {
        $res = $this->generateField($attribute);
        if (!$res) {
            $res = parent::generateActiveField($attribute);
        }

        return $res;
    }



    public function generateSearchConditions()
    {
        $columns = [];
        if (($table = $this->getTableSchema()) === false) {
            $class = $this->modelClass;
            /* @var $model \yii\base\Model */
            $model = new $class();
            foreach ($model->attributes() as $attribute) {
                $columns[$attribute] = 'unknown';
            }
        } else {
            foreach ($table->columns as $column) {
                $columns[$column->name] = $column->type;
            }
        }


        // !  changes from parent implementation
        // if search model has joins with model relations tables then use table prefix
        $tablePrefix = '';
        if (count($this->modelRelations > 0)) {
            $tablePrefix = $table->name . '.';
        }

        $likeConditions = [];
        $hashConditions = [];
        foreach ($columns as $column => $type) {
            switch ($type) {
                case Schema::TYPE_SMALLINT:
                case Schema::TYPE_INTEGER:
                case Schema::TYPE_BIGINT:
                case Schema::TYPE_BOOLEAN:
                case Schema::TYPE_FLOAT:
                case Schema::TYPE_DOUBLE:
                case Schema::TYPE_DECIMAL:
                case Schema::TYPE_MONEY:
                case Schema::TYPE_DATE:
                case Schema::TYPE_TIME:
                case Schema::TYPE_DATETIME:
                case Schema::TYPE_TIMESTAMP:
                    $hashConditions[] = "'{$tablePrefix}{$column}' => \$this->{$column},";
                    break;
                default:
                    $likeConditions[] = "->andFilterWhere(['like', '{$tablePrefix}{$column}', \$this->{$column}])";
                    break;
            }
        }

        $conditions = [];
        if (!empty($hashConditions)) {
            $conditions[] = "\$query->andFilterWhere([\n"
                . str_repeat(' ', 12) . implode("\n" . str_repeat(' ', 12), $hashConditions)
                . "\n" . str_repeat(' ', 8) . "]);\n";
        }
        if (!empty($likeConditions)) {
            $conditions[] = "\$query" . implode("\n" . str_repeat(' ', 12), $likeConditions) . ";\n";
        }

        return $conditions;
    }



    public function getRelatedModelFullClassName($relation)
    {
        $modelNamespace = StringHelper::dirname(ltrim($this->modelClass, '\\'));
        return $modelNamespace . '\\' . $relation['relatedModelClassName'];
    }

    protected function generateRelationName($relations, $table, $key, $multiple)
    {
        if (!empty($key) && substr_compare($key, 'id', -2, 2, true) === 0 && strcasecmp($key, 'id')) {
            $key = rtrim(substr($key, 0, -2), '_');
        }
        if ($multiple) {
            $key = Inflector::pluralize($key);
        }
        $name = $rawName = Inflector::id2camel($key, '_');
        $i = 0;
        while (isset($table->columns[lcfirst($name)])) {
            $name = $rawName . ($i++);
        }
        while (isset($relations[$table->fullName][$name])) {
            $name = $rawName . ($i++);
        }

        return $name;
    }

    protected function generateClassName($tableName, $useSchemaName = null)
    {
        if (isset($this->classNames[$tableName])) {
            return $this->classNames[$tableName];
        }

        $schemaName = '';
        $fullTableName = $tableName;
        if (($pos = strrpos($tableName, '.')) !== false) {
            if (($useSchemaName === null && $this->useSchemaName) || $useSchemaName) {
                $schemaName = substr($tableName, 0, $pos) . '_';
            }
            $tableName = substr($tableName, $pos + 1);
        }

        $modelStub = new $this->modelClass();
        $db = $modelStub->getDb();
        $modelTableName = $modelStub->tableName();

        $patterns = [];
        $patterns[] = "/^{$db->tablePrefix}(.*?)$/";
        $patterns[] = "/^(.*?){$db->tablePrefix}$/";
        if (strpos($modelTableName, '*') !== false) {
            $pattern = $modelTableName;
            if (($pos = strrpos($pattern, '.')) !== false) {
                $pattern = substr($pattern, $pos + 1);
            }
            $patterns[] = '/^' . str_replace('*', '(\w+)', $pattern) . '$/';
        }
        $className = $tableName;
        foreach ($patterns as $pattern) {
            if (preg_match($pattern, $tableName, $matches)) {
                $className = $matches[1];
                break;
            }
        }

        return $this->classNames[$fullTableName] = Inflector::id2camel($schemaName.$className, '_');
    }



    public function getNameColumn($relation)
    {
        $className = $this->getRelatedModelFullClassName($relation);

        if (class_exists($className)) {
            $modelStub = new $className();
            $db = $modelStub->getDb();
            $tableName = $modelStub->tableName();
        } else {
            $tableName = $relation['relatedTable'];
            $db = Yii::$app->db;
        }
        $tableSchema = $db->getTableSchema($tableName);


        $nameColumn = '';
        foreach ($tableSchema->columns as $column) {
            if (!strcasecmp($column->name, 'name') || !strcasecmp($column->name, 'title')) {
                $nameColumn = $column->name;
                break;
            }
        }

        if (!$nameColumn) {
            $pk = $tableSchema->primaryKey;
            $nameColumn = $pk[0];
        }

        return $nameColumn;
    }


    public function getModelRelations()
    {
        $modelStub = new $this->modelClass();
        if (! ($modelStub instanceof \yii\db\ActiveRecord)) {
            return [];
        }


        $db = $modelStub->getDb();
        $modelTableName = $modelStub->tableName();

        $schema = $db->getSchema();
        if ($schema->hasMethod('getSchemaNames')) {
            try {
                $schemaNames = $schema->getSchemaNames();
            } catch (NotSupportedException $e) {
                // schema names are not supported by schema
            }
        }
        if (!isset($schemaNames)) {
            if (($pos = strpos($modelTableName, '.')) !== false) {
                $schemaNames = [substr($modelTableName, 0, $pos)];
            } else {
                $schemaNames = [''];
            }
        }

        $relations = [];
        foreach ($schemaNames as $schemaName) {
            foreach ($db->getSchema()->getTableSchemas($schemaName) as $table) {
                if (trim($db->quoteSql($modelTableName), '`') !== $table->name) {
                    continue;
                }

                foreach ($table->foreignKeys as $refs) {
                    $refTable = $refs[0];

                    $refTableSchema = $db->getTableSchema($refTable);
                    unset($refs[0]);
                    $fks = array_keys($refs);
                    $refClassName = $this->generateClassName($refTable);

                    if (count($refs) != 1) {
                        continue;
                    }

                    // Add relation for this table
                    list($field, $foreignField) = [array_keys($refs)[0], array_values($refs)[0]];
                    $relationName = $this->generateRelationName($relations, $table, $fks[0], false);
                    $relations[$field] = [
                        'relationName' => $relationName,
                        'relatedModelClassName' => $refClassName,
                        'relatedField' => $foreignField,
                        'relatedTable' => $refTable,
                    ];
                }
            }
        }

        return $relations;
    }
}
