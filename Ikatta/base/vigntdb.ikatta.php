<?php

class VigntDB
{
    private static $pdo;
    private static $config;
    private static $table;
    private static $whereClauses = [];
    private static $parameters = [];
    private static $rawSql;
    private static $rawParameters = [];
    private static $isWhereSet = false;

    public static function database($configName)
    {
        $config = self::loadConfig($configName);

        if (!isset($config['dsn'], $config['username'], $config['password'])) {
            throw new Exception("Invalid configuration for '{$configName}'.");
        }

        self::$pdo = new PDO($config['dsn'], $config['username'], $config['password']);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return new self();
    }

    private static function loadConfig($configName)
    {
        $config = baseconfig('database.' . $configName);

        if ($config === null) {
            throw new Exception("Configuration '{$configName}' not found.");
        }

        return $config;
    }

    public function table($table)
    {
        self::$table = $table;
        return $this;
    }

    public function where($column, $operator, $value)
    {
        if (self::$isWhereSet) {
            self::$whereClauses[] = "AND {$column} {$operator} :{$column}";
        } else {
            self::$whereClauses[] = "{$column} {$operator} :{$column}";
            self::$isWhereSet = true;
        }
        self::$parameters[":{$column}"] = $value;
        return $this;
    }

    public function whereIn($column, array $values)
    {
        $placeholders = implode(', ', array_map(function ($index) use ($column) {
            return ":{$column}_{$index}";
        }, array_keys($values)));
        
        if (self::$isWhereSet) {
            self::$whereClauses[] = "AND {$column} IN ({$placeholders})";
        } else {
            self::$whereClauses[] = "{$column} IN ({$placeholders})";
            self::$isWhereSet = true;
        }
        
        foreach ($values as $index => $value) {
            self::$parameters[":{$column}_{$index}"] = $value;
        }
        return $this;
    }

    public function orWhere($column, $operator, $value)
    {
        if (self::$isWhereSet) {
            self::$whereClauses[] = "OR {$column} {$operator} :{$column}";
        } else {
            self::$whereClauses[] = "{$column} {$operator} :{$column}";
            self::$isWhereSet = true;
        }
        self::$parameters[":{$column}"] = $value;
        return $this;
    }

    public function whereNull($column)
    {
        if (self::$isWhereSet) {
            self::$whereClauses[] = "AND {$column} IS NULL";
        } else {
            self::$whereClauses[] = "{$column} IS NULL";
            self::$isWhereSet = true;
        }
        return $this;
    }

    public function orWhereNull($column)
    {
        if (self::$isWhereSet) {
            self::$whereClauses[] = "OR {$column} IS NULL";
        } else {
            self::$whereClauses[] = "{$column} IS NULL";
            self::$isWhereSet = true;
        }
        return $this;
    }

    private static function buildWhereClause()
    {
        if (empty(self::$whereClauses)) {
            return '';
        }
        return ' WHERE ' . implode(' ', self::$whereClauses);
    }

    private static function runQuery($sql, $params)
    {
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public static function param($params)
    {
        self::$rawParameters = $params;
        return new self();
    }

    public static function raw($sql)
    {
        self::$rawSql = $sql;
        return new self();
    }

    public function getAll()
    {
        if (self::$rawSql) {
            $sql = self::$rawSql;
            $params = self::$rawParameters;
            self::resetRawState();
        } else {
            $sql = "SELECT * FROM " . self::$table . self::buildWhereClause();
            $params = self::$parameters;
            self::resetConditions();
        }

        $stmt = self::runQuery($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne()
    {
        if (self::$rawSql) {
            $sql = self::$rawSql . " LIMIT 1";
            $params = self::$rawParameters;
            self::resetRawState();
        } else {
            $sql = "SELECT * FROM " . self::$table . self::buildWhereClause() . " LIMIT 1";
            $params = self::$parameters;
            self::resetConditions();
        }

        $stmt = self::runQuery($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLast()
    {
        $sql = "SELECT * FROM " . self::$table . " ORDER BY id DESC LIMIT 1";
        $stmt = self::runQuery($sql, self::$parameters);
        self::resetConditions();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function insert(array $data)
    {
        self::$insertData = $data;

        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_map(function ($key) {
            return ":{$key}";
        }, array_keys($data)));
        $sql = "INSERT INTO " . self::$table . " ({$columns}) VALUES ({$placeholders})";

        self::runQuery($sql, $data);
        return self::$pdo->lastInsertId();
    }

    public function update(array $data)
    {
        self::$updateData = $data;

        $setClauses = implode(', ', array_map(function ($key) {
            return "{$key} = :{$key}";
        }, array_keys($data)));

        $sql = "UPDATE " . self::$table . " SET {$setClauses}" . self::buildWhereClause();

        $params = array_merge($data, self::$parameters);
        $stmt = self::runQuery($sql, $params);
        self::resetConditions();
        return $stmt->rowCount();
    }

    public function delete()
    {
        $sql = "DELETE FROM " . self::$table . self::buildWhereClause();

        $stmt = self::runQuery($sql, self::$parameters);
        self::resetConditions();
        return $stmt->rowCount();
    }

    private static function resetConditions()
    {
        self::$whereClauses = [];
        self::$parameters = [];
        self::$isWhereSet = false;
    }

    private static function resetRawState()
    {
        self::$rawSql = null;
        self::$rawParameters = [];
    }
}