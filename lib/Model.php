<?php


namespace Lib;

class Model
{

    protected static string $table;

    protected static function db(): Database
    {
        return app()->db;
    }

    public static function all(): array
    {
        $sql = "SELECT * FROM " . static::$table;
        $statement = static::db()->query($sql);

        return $statement->fetchAll();
    }

    public static function find(int $id): array
    {
        $sql = "SELECT * FROM " . static::$table . " WHERE id = ?";
        $statement = static::db()->query($sql, [$id]);

        return $statement->fetch();
    }

    public static function findMany(string $query = ''): array
    {
        $sql = "SELECT * FROM " . static::$table . " {$query}";
        $statement = static::db()->query($sql);

        return $statement->fetchAll();
    }

    public static function create(array $data): int
    {
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO " . static::$table . " ({$columns}) VALUES ({$values})";

        static::db()->query($sql, array_values($data));

        return static::db()->lastInsertId();
    }

    public static function update($id, array $data): void
    {
        $columns = implode(', ', array_map(fn ($column) => "{$column} = ?", array_keys($data)));

        $sql = "UPDATE " . static::$table . " SET {$columns} WHERE id = {$id}";

        static::db()->query($sql, array_values($data));
    }

    public static function delete($id): void
    {
        $sql = "DELETE FROM " . static::$table . " WHERE id = ?";
        static::db()->query($sql, [$id]);
    }
}
