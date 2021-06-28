<?php

namespace App\adms\Models\helper;

use PDO;

if (!defined('URLADM')) {
    header("Location: /");
    exit();
}

/**
 * Description of AdmsConn
 *
 * @copyright (c) year, Chirlanio Silva - Grupo Meia Sola
 */
class AdmsConn
{

    public static $Host = HOST;
    public static $User = USER;
    public static $Pass = PASS;
    public static $Dbname = DBNAME;
    private static $Connect = null;

    private static function conectar()
    {
        try {
            if (self::$Connect == null) {
                self::$Connect = new PDO('mysql:host=' . self::$Host . ';dbname=' . self::$Dbname, self::$User, self::$Pass);
            }
        } catch (PDOException $exc) {
            echo 'mensagem: ' . $exc->getMessage();
            die;
        }
        return self::$Connect;
    }

    public function getConn()
    {
        return self::conectar();
    }
}
