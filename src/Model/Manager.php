<?php
namespace App\Model;
use Exception;

class Manager extends Human implements ManagerPermission {
    protected Stable $stable;

    public function __construct($name, $adress, Stable $stable)
    {
        parent::__construct( $name, $adress);
        $this->setStable($stable);
    }

    public function __toString():string{
        return "Nom : {$this->getName()}, Adresse : {$this->getAdress()->__toString()}, Ecurie : {$this->getStable()->getName()} ";
    }

    /**
     * @throws Exception
     */
    public function checkValidityRegistration(Rider $rider, Event $event):bool{
        if(count($rider->getMyEquine()) === 0) throw new Exception("Le cavalier que vous voulez inscrire n'a pas de cheval");
        if ($this->getStable() !== $rider->getStable()) throw new Exception("Vous tentez d'inscrire un cavalier qui n'est pas de votre écurie");
        return true;
    }

    /**
     * @throws Exception
     */
    public function registerRiderToCompetion(Rider $rider, Event $event, array $arrayEquine):void{
        if($this->checkValidityRegistration($rider, $event)) {
            $event->subscribeEquine($arrayEquine);
        }
    }

    /**
     * @return Stable
     */
    public function getStable(): Stable
    {
        return $this->stable;
    }

    /**
     * @param Stable $stable
     * @return Manager
     */
    public function setStable(Stable $stable): Manager
    {
        $this->stable = $stable;
        return $this;
    }



}