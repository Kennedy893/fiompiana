<?php

    namespace app\models;
    use PDO;
    use Flight;
    
    class Hcalcul_prevision
    {
        public static function calc_deux_date($date2)
        {
            $date1="2025-02-03";
            // Conversion des chaînes de caractères en objets DateTime
            $datetime1 = new DateTime($date1);
            $datetime2 = new DateTime($date2);

            // Calcul de la différence
            $interval = $datetime1->diff($datetime2);

            // Retourne la différence en nombre de jours
            return $interval->days;
        }

        public static function calc_prev($date2)
        {
            $jrs=Hcalcul_prevision::calc_deux_date($date2);
            $valeur_stock=RequestbackofficeH::get_by_nbr_all("elevage_stockage","id_eleveur",1);
            $animal=RequestbackofficeH::get_by_nbr_all("elevage_animal","id_eleveur",1);

            $jrs_before_dead=array();
            for($i=0 ; $i<Count($animal) ; $i++)
            {
                $jrs_before_dead[$i]=0;
            }
            for($i=0 ; $i<$jrs ; $i++)
            {
                for($j=0 ; $j<Count($animal) ; $j++)
                {
                    for($k=0 ; $k<Count($valeur_stock) ; $k++)
                    {
                        $type=RequestbackofficeH::get_by_nbr("elevage_type_animal","id_type",$animal[$j]['id_type']);
                        $alimentation=RequestbackofficeH::get_by_nbr("elevage_alimentation","id_alimentation",$type['id_alimentation']);

                        if($type['id_alimentation']==$valeur_stock[$k]['id_alimentation'])
                        {
                            if($jrs_before_dead[$j]>=$type['nbr_jrs_dead'])
                            {
                                $animal[$j]['status_vivant']=false;
                                break;
                            }
                            if
                            ( 
                                $animal[$j]['status_vivant']==true &&
                                $animal[$j]['status_vente']==false
                            )
                            {
                                if($valeur_stock[$k]['quantite']>= $type['conso_jrs'])
                                {
                                    $poids=$animal[$j]['poids_actuel']+($animal[$j]['poids_actuel']*$alimentation['gain'])/100;
                                    if($poids<=$type['poids_max'])
                                    {
                                        $animal[$j]['poids_actuel']=$poids;
                                        $valeur_stock[$k]['quantite']=$valeur_stock[$k]['quantite']-$type['conso_jrs'];
                                        $jrs_before_dead[$j]=0;
                                    }
                                }
                                if($valeur_stock[$k]['quantite']< $type['conso_jrs'])
                                {
                                    $jrs_before_dead[$j]=$jrs_before_dead[$j]+1;
                                    $poids=$animal[$j]['poids_actuel']-($animal[$j]['poids_actuel']*$type['perte_sans_manger'])/100;
                                    $animal[$j]['poids_actuel']=$poids;
                                    
                                }
                                if($animal[$j]['poids_actuel']>=($type['poids_max']+$type['poids_min'])/2)
                                {
                                    $animal[$j]['status_vente']=true;
                                }
                            }
                            break;
                        }
                    }
                }
            }
            $retour=['stock'=>$valeur_stock,'animaux'=>$animal];
            return $retour;
        }
    }
    
    
?>