<?php

namespace App\Table;
use App\App;

class Categorie extends Table{

    public static $table='categories';

     /**
     * Get the value of URL
     */ 
    public function getURL()
    {
        return 'index.php?p=categories&id=' . $this->id;
    }


}