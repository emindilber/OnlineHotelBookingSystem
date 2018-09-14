<?php

namespace App;
use Illuminate\Support\Facades\Session;



class format
{
   public static function dateFormat($giris_tarihi)
   {
	
	$dilimler = explode(".", $giris_tarihi);
    $sayac=0;
    foreach ($dilimler as $key) {
        $sayac++;
        if($sayac==1)
            $day=$key;
        if($sayac==2)
            $month=$key;
        if($sayac==3)
            $year=$key;
        
    }
      
      $giris_tarihi=$year.'-'.$month.'-'.$day;
      return $giris_tarihi;
   }

   public static function login()
   {
        $login=Session::get('rutbe');
        if($login == '')
          return 0;
        else
          return 1 ;
   }

   

}
