<?php

class VigntModel
{
    protected static $pdo;
    protected static $table;
    protected static $connection = 'default'; 
    protected static $whereClauses = [];
    protected static $parameters = [];
    protected static $isWhereSet = false;
    protected static $fillable = [];
    protected static $guarded = [];

    protected static function getConnection()
    {
        if (self::$pdo) {
            return self::$pdo;
        }

        $config = self::loadConfig(static::$connection);

        if (!isset($config['dsn'], $config['username'], $config['password'])) {
            throw new Exception("Invalid configuration for '" . static::$connection . "'.");
        }

        self::$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$pdo;
    }

    public static function getOne()
    {
        static::checkTable();
        $pdo = static::getConnection();

        $sql = "SELECT * FROM " . static::$table . static::buildWhereClause() . " LIMIT 1";
        $params = static::$parameters;

        $stmt = static::runQuery($sql, $params);
        static::resetConditions();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getLast()
    {
        static::checkTable();
        $pdo = static::getConnection();

        $sql = "SELECT * FROM " . static::$table . static::buildWhereClause() . " ORDER BY id DESC LIMIT 1";
        $params = static::$parameters;

        $stmt = static::runQuery($sql, $params);
        static::resetConditions();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getAll()
    {
        static::checkTable();
        $pdo = static::getConnection();

        $sql = "SELECT * FROM " . static::$table . static::buildWhereClause();
        $params = static::$parameters;

        $stmt = static::runQuery($sql, $params);
        static::resetConditions();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private static function loadConfig($configName)
    {
        $config = baseconfig('database.' . $configName);

        if ($config === null) {
            throw new Exception("Configuration '{$configName}' not found.");
        }

        return $config;
    }

    protected static function checkTable()
    {
        if (empty(static::$table)) {
            throw new Exception("Table name is not set.");
        }
    }

    protected static function checkFillable(array $data)
    {
        if (!empty(static::$fillable)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, static::$fillable)) {
                    throw new Exception("Field '{$key}' is not fillable.");
                }
            }
        }

        if (!empty(static::$guarded)) {
            foreach ($data as $key => $value) {
                if (in_array($key, static::$guarded)) {
                    throw new Exception("Field '{$key}' is guarded and cannot be updated.");
                }
            }
        }
    }

    public static function whereRaw($condition, array $params = [])
    {
        if (static::$isWhereSet) {
            static::$whereClauses[] = "AND ({$condition})";
        } else {
            static::$whereClauses[] = "({$condition})";
            static::$isWhereSet = true;
        }

        foreach ($params as $key => $value) {
            static::$parameters[$key] = $value;
        }

        return new static();
    }

    public static function where($column, $operator, $value)
    {
        if (static::$isWhereSet) {
            static::$whereClauses[] = "AND {$column} {$operator} :{$column}";
        } else {
            static::$whereClauses[] = "{$column} {$operator} :{$column}";
            static::$isWhereSet = true;
        }
        static::$parameters[":{$column}"] = $value;
        return new static();
    }

    public static function orWhere($column, $operator, $value)
    {
        if (static::$isWhereSet) {
            static::$whereClauses[] = "OR {$column} {$operator} :{$column}";
        } else {
            static::$whereClauses[] = "{$column} {$operator} :{$column}";
            static::$isWhereSet = true;
        }
        static::$parameters[":{$column}"] = $value;
        return new static();
    }

    public static function whereNull($column)
    {
        if (static::$isWhereSet) {
            static::$whereClauses[] = "AND {$column} IS NULL";
        } else {
            static::$whereClauses[] = "{$column} IS NULL";
            static::$isWhereSet = true;
        }
        return new static();
    }

    public static function orWhereNull($column)
    {
        if (static::$isWhereSet) {
            static::$whereClauses[] = "OR {$column} IS NULL";
        } else {
            static::$whereClauses[] = "{$column} IS NULL";
            static::$isWhereSet = true;
        }
        return new static();
    }

    public static function whereIn($column, array $values)
    {
        $placeholders = implode(', ', array_map(function ($index) use ($column) {
            return ":{$column}_{$index}";
        }, array_keys($values)));
        
        if (static::$isWhereSet) {
            static::$whereClauses[] = "AND {$column} IN ({$placeholders})";
        } else {
            static::$whereClauses[] = "{$column} IN ({$placeholders})";
            static::$isWhereSet = true;
        }
        
        foreach ($values as $index => $value) {
            static::$parameters[":{$column}_{$index}"] = $value;
        }
        return new static();
    }

    public static function whereNotIn($column, array $values)
    {
        $placeholders = implode(', ', array_map(function ($index) use ($column) {
            return ":{$column}_{$index}";
        }, array_keys($values)));
        
        if (static::$isWhereSet) {
            static::$whereClauses[] = "AND {$column} NOT IN ({$placeholders})";
        } else {
            static::$whereClauses[] = "{$column} NOT IN ({$placeholders})";
            static::$isWhereSet = true;
        }
        
        foreach ($values as $index => $value) {
            static::$parameters[":{$column}_{$index}"] = $value;
        }
        return new static();
    }

    public static function all()
    {
        static::checkTable();
        $pdo = static::getConnection();

        $sql = "SELECT * FROM " . static::$table . static::buildWhereClause();
        $params = static::$parameters;

        $stmt = static::runQuery($sql, $params);
        static::resetConditions();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insert(array $data)
    {
        static::checkTable();
        static::checkFillable($data);

        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_map(function ($key) {
            return ":{$key}";
        }, array_keys($data)));

        $sql = "INSERT INTO " . static::$table . " ({$columns}) VALUES ({$placeholders})";
        static::runQuery($sql, $data);
        return static::getConnection()->lastInsertId();
    }

    public static function update(array $data)
    {
        static::checkTable();
        static::checkFillable($data);

        $setClauses = implode(', ', array_map(function ($key) {
            return "{$key} = :{$key}";
        }, array_keys($data)));

        $sql = "UPDATE " . static::$table . " SET {$setClauses}" . static::buildWhereClause();
        $params = array_merge($data, static::$parameters);

        $stmt = static::runQuery($sql, $params);
        static::resetConditions();
        return $stmt->rowCount();
    }

    public static function delete()
    {
        static::checkTable();

        $sql = "DELETE FROM " . static::$table . static::buildWhereClause();
        $stmt = static::runQuery($sql, static::$parameters);
        static::resetConditions();
        return $stmt->rowCount();
    }

    private static function runQuery($sql, $params)
    {
        $stmt = static::getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    private static function buildWhereClause()
    {
        if (empty(static::$whereClauses)) {
            return '';
        }
        return ' WHERE ' . implode(' ', static::$whereClauses);
    }

    private static function resetConditions()
    {
        static::$whereClauses = [];
        static::$parameters = [];
        static::$isWhereSet = false;
    }
}
