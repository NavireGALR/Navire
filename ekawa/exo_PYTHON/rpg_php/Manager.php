<?php

class Manager
{

	protected function dbConnect() 
    {
        $db = new PDO('mysql:host=localhost;dbname=logbook;port=3308;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

}