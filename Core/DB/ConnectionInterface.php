<?php

namespace Core\DB;

interface ConnectionInterface{

    public static function getInstance();
    public function getConnection() ;
}