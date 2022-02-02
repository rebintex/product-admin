<?php

class BaseModel
{
    protected static string $tableName = '';

    public static function get(int $id): self
    {
        $statement = DB::get()->prepare("SELECT * FROM `." . self::$tableName . "` WHERE `id` = ? LIMIT 1");
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->bindParam(1, $id);
        $statement->execute();
        return $statement->fetchObject(__CLASS__);
    }
}