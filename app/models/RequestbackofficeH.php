<?php

namespace app\models;

use PDO;
use Flight;

class RequestbackofficeH
{
    public static function get_all($table_name)
    {
        $db=Flight::db();
        $request="SELECT *";


        $sql=$db->prepare($request." FROM ".$table_name);
        $sql->execute();
        $retour=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $retour;
    }

    public static function get_by_nbr($table_name,$colonne,$valeur)
    {
        $db=Flight::db();
        $request="SELECT *";

        $sql=$db->prepare($request." FROM ".$table_name." WHERE ".$colonne." = ?");
        $sql->execute([$valeur]);
        $retour=$sql->fetch(PDO::FETCH_ASSOC);
        return $retour;
    }

    public static function get_by_text($table_name,$colonne,$text)
    {
        $db=Flight::db();
        $request="SELECT *";

        $sql=$db->prepare($request." FROM ".$table_name." WHERE ".$colonne." LIKE ?");
        $sql->execute(['%' . $text . '%']);
        $retour=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $retour;
    }

    public static function get_by_colonnes($table_name,$colonne,$valeur)
    {
        $db=Flight::db();
        $request="SELECT *";

        $string_sql=$request." FROM ".$table_name." WHERE 1=1";

        if(count($colonne)!=0)
        {
            for($i=0 ; $i<count($colonne) ; $i++)
            {
                $string_sql=$string_sql." AND ".$colonne[0]." = ".$valeur[0];
            }
        }
        $sql=$db->prepare($string_sql);
        $sql->execute();
        $retour=$sql->fetchAll(PDO::FETCH_ASSOC);
        return $retour;
    }

    public static function get_by_colonnes_unique($table_name,$colonne,$valeur)
    {
        $db=Flight::db();
        $request="SELECT *";

        $string_sql=$request." FROM ".$table_name." WHERE 1=1";

        if(count($colonne)!=0)
        {
            for($i=0 ; $i<count($colonne) ; $i++)
            {
                $string_sql=$string_sql." AND ".$colonne[$i]." LIKE '".$valeur[$i]."'";
            }
        }
        $sql=$db->prepare($string_sql);
        $sql->execute();
        $retour=$sql->fetch(PDO::FETCH_ASSOC);
        return $retour;
    }

    public static function update_table($table_name,$colonne,$valeur,$col_condition,$valeur_condition)
    {
        $db=Flight::db();
        $string_sql="UPDATE ".$table_name." SET ".$colonne."=".$valeur." WHERE 1=1";

        if(count($col_condition)!=0)
        {
            for($i=0 ; $i<count($col_condition) ; $i++)
            {
                $string_sql=$string_sql." AND ".$col_condition[0]." = ".$valeur_condition[0];
            }
        }
        $sql=$db->prepare($string_sql);
        $sql->execute();
    }

    
    

    public static function delete_by_nbr($table_name,$colonne,$valeur)
    {
        $db=Flight::db();
        $request="DELETE";

        $sql=$db->prepare($request." FROM ".$table_name." WHERE ".$colonne." = ?");
        $sql->execute([$valeur]);
    }

    public static function delete_by_text($table_name,$colonne,$text)
    {
        $db=Flight::db();
        $request="DELETE";

        $sql=$db->prepare($request." FROM ".$table_name." WHERE ".$colonne." LIKE ?");
        $sql->execute(['%' . $text . '%']);
    }

    public static function delete_by_colonnes($table_name,$colonne,$valeur)
    {
        $db=Flight::db();
        $request="DELETE";

        $string_sql=$request." FROM ".$table_name." WHERE 1=1";

        if(count($colonne)!=0)
        {
            for($i=0 ; $i<count($colonne) ; $i++)
            {
                $string_sql=$string_sql." AND ".$colonne[0]." = ".$valeur[0];
            }
        }
        $sql=$db->prepare($string_sql);
        $sql->execute();
    }
}

?>
