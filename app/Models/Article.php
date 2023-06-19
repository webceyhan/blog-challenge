<?php

namespace App\Models;

use Lib\Model;

class Article extends Model
{
    protected static string $table = 'articles';

    public static function findByAuthor(int $authorId): array
    {
        $query = "where author_id = {$authorId}";

        return self::findMany($query);
    }
}
