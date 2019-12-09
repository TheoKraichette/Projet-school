<?php

namespace App\Utilisateur;

class Eleve extends Utilisateur
{

    protected $emailParent;
    protected $class;
    protected $gender;
    protected $eleve_id;
    /**
     * __construct
     *
     * @param  string $emailParent est l'email des parents de l'utilisateur.
     * @param  string $class est la classe de l'utilisateur.
     * @param  string $gender est le genre de l'utilisateur.
     *
     * @return void
     */


        public function __construct(array $donnees){
            parent::__construct($donnees);
            $this->hydrate($donnees);
        }


    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->emailParent;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($emailParent)
    {
        $this->emailParent = $emailParent;

        return $this;
    }

    /**
     * Get the value of class
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * Set the value of class
     *
     * @return  self
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }
    
    /**
     * Get the value of eleve_id
     */ 
    public function getEleve_id()
    {
        return $this->eleve_id;
    }

    /**
     * Set the value of eleve_id
     *
     * @return  self
     */ 
    public function setEleve_id($eleve_id)
    {
        $this->eleve_id = $eleve_id;

        return $this;
    }
        
    public function hydrate(array $donnees)
    {
        if (isset($donnees['emailParent']))
        {
            $this->emailParent = $donnees['emailParent'];
        }
        if (isset($donnees['classe']))
        {
            $this->class = $donnees['classe'];
        }
        if (isset($donnees['sexe']))
        {
            $this->gender = $donnees['sexe'];
        }
        if (isset($donnees['eleve_id']))
        {
            $this->eleve_id = $donnees['eleve_id'];
        }
    }
}