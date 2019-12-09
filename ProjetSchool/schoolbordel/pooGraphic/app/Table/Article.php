<?php

namespace App\Table;
use App\App;

class Article extends Table{

    protected $URL;
    protected $Extrait;


    public static function getLast(){
       return App::getDb()->query('SELECT articles.id, articles.titre, articles.contenu, categories.titre as categories FROM articles LEFT JOIN categories ON categories_id = categories.id',__CLASS__);
    }

    public function __get($key){
        
        $method= 'get' . ucfirst($key);
        $this->$key= $this->$method();
        return $this->$key;
    }
    /**
     * Get the value of URL
     */ 
    public function getURL()
    {
        return 'index.php?p=article&id=' . $this->id;
    }

    /**
     * Get the value of Extrait
     */ 
    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0, 50). '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}