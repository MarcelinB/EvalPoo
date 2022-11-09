<?php

namespace App\Model;
interface ManagerPermission
{
    public function checkValidityRegistration(Rider $rider, Event $event):bool;
    public function registerRiderToCompetion(Rider $rider, Event $event, array $arrayEquine):void;
}