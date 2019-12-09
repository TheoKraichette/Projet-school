<?php

namespace App\Table;
use App\App;

class Table{


    protected static $table;

    private static function getTable(){
        if(self::$table===null){

            // self::$table=__CLASS__;
            // die(self::$table);
            $class_name= explode('\\',get_called_class());
            self::$table= strtolower(end($class_name)). 's';
            var_dump(static::$table);
        }
        var_dump(static::$table);
        return static::$table;
    }

    public static function find($id){
        return App::getDb()->prepare(
            'SELECT * FROM ". static::getTable() ."  WHERE id=? ',[$id],get_called_class(),true);
    }

    public static function all(){
        
        return App::getDb()->query(
            'SELECT * FROM ". static::getTable() ."',get_called_class());

    }


    public function __get($key){
        
        $method= 'get' . ucfirst($key);
        $this->$key= $this->$method();
        return $this->$key;
    }

}