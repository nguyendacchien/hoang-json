<?php


class Data
{
    public static $path = "product.json";

    public static function loadData()
    {
        $dataJson = file_get_contents(self::$path);
        $json = json_decode($dataJson);
        return self::convertData($json);

    }

    public static function saveData($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convertData($data)
    {
        $products = [];
        foreach ($data as $item) {
            $product = new Products($item->id, $item->name, $item->price, $item->address, $item->image);
            array_push($products, $product);
        }
        return $products;
    }

    public static function add($product)
    {
        $products = self::loadData();
        array_push($products, $product);

        self::saveData($products);
    }

    public static function getById($id)
    {
        $products = self::loadData();
        foreach ($products as $product) {
            if ($product->getId() == $id) {
                return $product;
            }
        }
    }

    public static function edit($id, $newProduct)
    {
        $products = self::loadData();
        foreach ($products as $product) {
            if ($product->getId() == $id) {
                $product->setName($newProduct->getName());
                $product->setPrice($newProduct->getPrice());
                $product->setAddress($newProduct->getAddress());
                $product->setImage($newProduct->getImage());
            }
        }
        self::saveData($products);
    }

    public static  function sort()
    {
        $products = self::loadData();
        ksort($products);
        foreach ($products as $key=>$product){
            $product->getId();
        }
    }


}