<?php

class Session
{
    static public function set($nom, $message)
    {
        setcookie($nom, $message, time() + 5, "/");
    }
}