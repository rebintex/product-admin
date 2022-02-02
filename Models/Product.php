<?php

require 'DB.php';
require 'BaseModel.php';

class Product extends BaseModel
{
    protected static string $tableName = 'products';

    public int $id;
    public string $name;
    public int $price;
    public int $category_id;

    static function all()
    {
        $result = DB::get()->query("SELECT products.id, products.name, products.price, categories.name as category 
    FROM `products` JOIN `categories` ON `products`.`category_id` = `categories`.`id`");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    static function create($name, $price, $category_id)
    {
        $sql = "INSERT INTO `products` (`name`, `price`, `category_id`) VALUES ('$name', '$price', '$category_id')";
        return DB::get()->query($sql);

    }

    public function delete($id)
    {
        return DB::get()->query("DELETE FROM `products` WHERE `products`.`id` = '$id'");
    }

    public function update($name, $price, $category_id, $id)
    {
        return DB::get()->query("UPDATE `products` SET 
    `name`='$name', `price`='$price', `category_id`='$category_id' WHERE `products`.`id` = '$id'");
    }

}