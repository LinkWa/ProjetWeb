<?php

  namespace App;

  class CharacterLog {
    private $id;
    private $message;
    private $add_at;
    private $character_id;

    public function __construct(array $arrayOfValues = null)
   {
       if ($arrayOfValues !== null) {
           $this->hydrate($arrayOfValues);
       }
   }

   public function hydrate(array $donnees)
   {
       foreach ($donnees as $key => $value)
       {
           $method = 'set'.ucfirst($key);

           if (method_exists($this, $method))
           {
               $this->$method($value);
           }
       }
   }

   //GETTERS AND SETTERS
   public function getId() {
     return $this->id;
   }
   public function setId($id) {
     $this-> id = $id;
   }
   public function getMessage() {
     return $this->message;
   }
   public function setMessage($message) {
     $this->message = $message;
   }
   public function getAddAt() {
     return $this->add_at;
   }
   public function setAddAt($add_at) {
     $this->add_at = $add_at;
   }
   public function getCharacterId() {
     return $this->character_id;
   }
   public function setCharacterId($character_id) {
     $this->character_id = $character_id;
   }

  }

?>
