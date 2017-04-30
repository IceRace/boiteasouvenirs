<?php 

function convertPrix($val)
{
    $retval=$val;
    $retval=str_replace(",",".", $retval);
    $retval = preg_replace('/€$/', '', $retval);
    $retval=str_replace("€",".", $retval);
    return $retval;
}

function deConvertPrix($val)
{
    $retval=$val;
    $retval = number_format($retval,2,',',"");
    $retval=str_replace(".",",", $retval);
    return $retval;
}

function echap($str)
{
    $string=$str;
    $string= htmlentities( $string, ENT_QUOTES, 'UTF-8');
    $retstr =  htmlentities( $string, ENT_QUOTES, 'UTF-8');
    return $retstr;
}

function deEchap($str)
{
    $string=$str;
    $string= html_entity_decode( $string, ENT_QUOTES, 'UTF-8');
    $retstr =  html_entity_decode( $string, ENT_QUOTES, 'UTF-8');
    return $retstr;
}

function duree($str)
{
    if($str<1440){
        $retval=date('G\hi', mktime(0,$str));
    }
    else
    {
        $retval= ($str/24/60);
            
        if($retval>1){
            $retval ="Plus d'une journée";
        }
        else
        {
            $retval = 'Journée entière';
        }
    }
    
return $retval;

}

$durees = array (
    0=>array("nom"=>"Sélectionner" ,"valeur"=>""),
    1=>array("nom"=>"15 minutes" ,"valeur"=>"15"),
    2=>array("nom"=>"30 minutes" ,"valeur"=>"30"),
    3=>array("nom"=>"45 minutes" ,"valeur"=>"45"),
    4=>array("nom"=>"1 heure" ,"valeur"=>"60"),
    5=>array("nom"=>"1 heure 15" ,"valeur"=>"75"),
    6=>array("nom"=>"1 heure 30" ,"valeur"=>"90"),
    7=>array("nom"=>"1 heure 45" ,"valeur"=>"105"),
    8=>array("nom"=>"2 heures" ,"valeur"=>"120"),
    9=>array("nom"=>"2 heures 30" ,"valeur"=>"150"),
    10=>array("nom"=>"3 heures" ,"valeur"=>"180"),
    11=>array("nom"=>"4 heures" ,"valeur"=>"240"),
    12=>array("nom"=>"5 heures" ,"valeur"=>"300"),
    13=>array("nom"=>"6 heures" ,"valeur"=>"360"),
    14=>array("nom"=>"7 heures" ,"valeur"=>"420"),
    15=>array("nom"=>"Journée entière" ,"valeur"=>"1440"),
    16=>array("nom"=>"Plus d'une journée" ,"valeur"=>"3000"),
);

?>