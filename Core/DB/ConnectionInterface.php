<?php

namespace Core\DB\Connection;

interface ConnectionInterface{

    public static function getInstance();
    public function getConnection() ;
}