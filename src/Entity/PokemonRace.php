<?php

namespace App\Entity;

class PokemonRace {
    private $id;
    private $name;
    private $nameSlug;

    /**
     * PokemonRace constructor.
     * @param $name
     * @param $nameSlug
     */
    public function __construct($name, $nameSlug)
    {
        $this->name = $name;
        $this->nameSlug = $nameSlug;
    }

    /**
     * @param array $pokemonRace
     */
    public function hydrate (array $pokemonRace)
    {
        foreach ($pokemonRace as $key => $value) {
            $method = "set". ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    /**
     * retourne l'id de la race du pokemon
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameSlug()
    {
        return $this->nameSlug;
    }

    /**
     * @param mixed $nameSlug
     */
    public function setNameSlug($nameSlug)
    {
        $this->nameSlug = $nameSlug;
    }

}