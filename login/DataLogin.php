<?php


class DataLogin
{
    public static $path = "user.json";

    public static function loads(): array
    {
        $dataJson = file_get_contents(self::$path);
        $data = json_decode($dataJson);
        return self::convert($data);
    }

    public static function save($data)
    {
        $dataJson = json_encode($data);
        file_put_contents(self::$path, $dataJson);
    }

    public static function convert($data)
    {
        $users = [];
        foreach ($data as $item){
            $user = new Users($item->name, $item->pass);
            array_push($users, $user);
        }
        return $users;
    }

    public static function addUser($user)
    {
        $users = self::loads();
        array_push($users, $user);
        self::save($users);

    }
    public static function check($user)
    {
        $users = self::loads();
        foreach ($users as $item) {
            if ($user->name == $item->name && $user->pass == $item->pass) {
                return true;
            }
        }
        return false;

    }

    public static function login($name, $pass)
    {
        $user = new Users($name, $pass);
        if (self::check($user)) {
            session_start();
            $_SESSION['username'] = $name;
            $_SESSION['password'] = $pass;
            header('location: index.php');
        } else {
            echo "Invalid userName";
        }
    }

//    public static function check($name, $pass)
//    {
//        $user = new Users($name , $pass);
//        if (self::checkLog($user)){
//            session_start();
//            $_SESSION['name']=$name;
//            $_SESSION['pass']=$pass;
//        } else {
//            echo "Invalid userName";
//        }
//    }

}