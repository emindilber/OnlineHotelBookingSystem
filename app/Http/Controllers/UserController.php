<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\giris_bilgileri;
use App\kullanici_bilgileri;
use App\oda_bilgileri;
use App\rezervasyon_bilgileri;
use App\format;
use DB;
use DateTime;



class UserController extends Controller
{
    
   public function index()
{
	

    return view('index');
}

 public function uye_ol(Input $veriler)
 {
 	
     $input     = $veriler::all();
     $name      = $input['isim'];
     $soy_isim  = $input['soy_isim'];
     $e_posta   = $input['posta'];
     $telefon   = $input['telefon'];
     $kimlik_no = $input['kimlik_no'];
     $sifre     = $input['sifre'];
     $sifre_t   = $input['sifre_t'];
     $gizli_yanit   = $input['gizli_yanit'];
 
$user = array(
    'isim'       => $name,
    'soy_isim'   => $soy_isim,
    'e_posta'    => $e_posta,
    'telefon'    => $telefon,
    'kimlik_no'  => $kimlik_no,
    'sifre'      => $sifre,
    'sifre_t'    => $sifre_t,
    'gizli_yanit'=> $gizli_yanit
);

// Kurallar
$rules = array(
    'isim'      => 'required|max:45',
    'soy_isim'  => 'required',
    'e_posta'   => 'required|unique:giris_bilgileri,giris_adi',
    'telefon'   => 'required|digits:11',
    'kimlik_no' => 'required|digits:11|unique:kullanici_bilgileri,kullanici_tc',
    'sifre'     => 'required',
    'sifre_t'   => 'required',
    'gizli_yanit' => 'required',
);

// Hata mesajları
$messages = array(
    'isim.required'       => 'İsim alanı boş geçilemez.',
    'isim.max'            => 'İsim 45 karaekterden fazla olamaz.',
    'soy_isim.required'   => 'Soyisim alanı boş geçilemez.',
    'e_posta.required'    => 'E-posta alanı boş geçilemez.',
    'e_posta.unique'      => 'Bu E posta ile açılmış bir üyelik mevcut.',
    'kimlik_no.unique'    => 'Bu kimliğe ait üyelik mevcut.',
    'telefon.required'    => 'Telefon alanı boş geçilemez.',
    'telefon.digits'      => 'Telefon alanı 11 haneden oluşmalı.',
    'kimlik_no.required'  => 'Kimlik alanı boş geçilemez.',
    'kimlik_no.digits'    => 'Kimlik no alanı 11 haneden oluşmalı.',
    'sifre.required'      => 'sifre alanı boş geçilemez.',
    'sifre_t.required'    => 'sifre alanı boş geçilemez.',
    'gizli_yanit.required'=> 'Gizli yanıt alanı boş geçilemez.'
);



// Validation
$validate = Validator::make($user, $rules, $messages);
if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

if ($sifre!=$sifre_t) {
    return redirect()->back()->withInput()->withErrors('Girdiğiniz şifreler farklı.');
}


        $model = new giris_bilgileri;
        $model->giris_adi = $e_posta;
        $model->sifre=$sifre;
        $model->rutbe='kullanıcı';
        $model->gizli_yanit=$gizli_yanit;
        $model->save();

        $model2=new giris_bilgileri;
        $model2=$model2::where('giris_adi', $e_posta)->first();
        $id=$model2->giris_bilgileri_id;

        $model3 = new kullanici_bilgileri;
        $model3->giris_bilgileri_id=$id;
        $model3->kullanici_adi=$name;
        $model3->kullanici_soyadi=$soy_isim;
        $model3->kullanici_mail=$e_posta;
        $model3->kullanici_tel=$telefon;
        $model3->kullanici_tc=$kimlik_no;
        $insert=$model3->save();

        if($insert)
        {
            Session::flash('message', "Üyeliğiniz başarılı bir şekilde oluşturuldu.");
            return redirect('login');
        }

        else
            return redirect()->back()->withInput()->withErrors('Kayıt işlemi başarısız.');


 	
 }


 public function giris(Input $veriler)
 {
    
    $input   = $veriler::all();
    $e_posta = $input['posta'];
    $sifre   = $input['sifre'];

    $user = array(
    'e_posta'    => $e_posta,
    'sifre'      => $sifre
);
// Kurallar
    $rules = array(
    'e_posta'   => 'required',
    'sifre'     => 'required',

);
// Hata mesajları
    $messages = array(
    'e_posta.required'    => 'E-posta alanı boş geçilemez.',
    'sifre.required'      => 'Şifre alanı boş geçilemez.'
);
    $validate = Validator::make($user, $rules, $messages);
    if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }


        $model4= new giris_bilgileri;
        $model4=$model4::where('giris_adi', $e_posta)->where('sifre' , $sifre)->first(); // kullanıcının girdiği bilgiler ile veritabanında kayıtlı olan veriler burada karşılaştırıldı.
        
        if(count($model4) >0)
        {   
            $girisBilgileri_id=$model4->giris_bilgileri_id;
            $model_kullanici= new kullanici_bilgileri;
            $kullaniciBilgileri=$model_kullanici::where('giris_bilgileri_id', $girisBilgileri_id)->first();
            if(count($kullaniciBilgileri) >0)
        { 
               Session::put('kullanici_id',$kullaniciBilgileri->kullanici_id);      
        }

            Session::put('id',$girisBilgileri_id);
            $rutbe=$model4->rutbe;
            Session::put('rutbe',$rutbe);

            if($rutbe == 'admin')
            return redirect('admin');
            elseif($rutbe == 'kullanıcı')
                return redirect('reservation');
            else{
                return redirect()->back()->withInput()->withErrors('Kullanıcı adı veya şifre hatalı.');
            }
        }
        else
            return redirect()->back()->withInput()->withErrors('Kullanıcı adı veya şifre hatalı.');
       

            
    }
    public function profile()
    {   
        $rutbe=Session::get('rutbe');
        $id=$rutbe=Session::get('id');

      if($rutbe == 'admin')
       {
      return view('admin.pages.examples.profile');
       }
    }

public function sifre(Input $veriler){
    
     $input         = $veriler::all();
     $e_posta       = $input['posta'];
     $sifre         = $input['sifre'];
     $sifre_t       = $input['sifre_t'];
     $gizli_yanit   = $input['gizli_yanit'];

     $user = array(
        'e_posta'     => $e_posta,
        'sifre'       => $sifre,
        'sifre_t'     => $sifre_t,
        'gizli_yanit' => $gizli_yanit
         );
// Kurallar
     $rules = array(
        'e_posta'     => 'required',
        'sifre'       => 'required',
        'sifre_t'     => 'required',
        'gizli_yanit' => 'required',
         );
// Hata mesajları
     $messages = array(
        'e_posta.required'    => 'E-posta alanı boş geçilemez.',
        'sifre.required'      => 'sifre alanı boş geçilemez.',
        'sifre_t.required'    => 'sifre alanı boş geçilemez.',
        'gizli_yanit.required'=> 'Gizli yanıt alanı boş geçilemez.'
         );
     $validate = Validator::make($user, $rules, $messages);
     if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }
        if ($sifre!=$sifre_t) {
            return redirect()->back()->withInput()->withErrors('Girdiğiniz şifreler farklı.');
        }


        $model5= new giris_bilgileri;
        $model5=$model5::where('giris_adi', $e_posta)->where('gizli_yanit' , $gizli_yanit)->first(); //güncellenecek kaydı seç.
        $id=$model5->giris_bilgileri_id; 

        if(count($model5) >0)
        {
            $model5::where('giris_bilgileri_id',$id)->update(['sifre'=>$sifre]);
            Session::flash('message', "Şifre değiştirme işlemi başarılı.");
            return redirect('login');
        }
        else
            return redirect()->back()->withInput()->withErrors('E-posta veya gizli yanıt hatalı.');
    }

public function uye_bilgisi()
{
        $rutbe=Session::get('rutbe');
        $id=Session::get('id');
        

        if($rutbe == 'admin')
       {

    $model= new kullanici_bilgileri;
    $veriler=$model::all();
    return view('admin.pages.tables.data')->with('veriler',$veriler);
       }
       else{
           Session::flash('message', "Bu sayfaya girme yetkiniz yok.");
            return redirect('login');
       }
       
}



public function uye_sil($id)
{
     $model= new giris_bilgileri;
     $delete=$model::where('giris_bilgileri_id',$id)->delete();
     $delete;
if ($delete) {
   Session::flash('message', "Üye silme işlemi başarılı.");
    return redirect()->back(); 
}
else
{
Session::flash('message2', "Üye silme işlemi başarısız.");
    return redirect()->back(); 
}
}

public function rezervasyon_sil($id)
{
     $model= new rezervasyon_bilgileri;
     $delete=$model::where('rezervasyon_id',$id)->delete();
     $delete;
if ($delete) {
   Session::flash('message', "Rezervasyon silme işlemi başarılı.");
    return redirect()->back(); 
}
else
{
Session::flash('message2', "Rezervasyon silme işlemi başarısız.");
    return redirect()->back(); 
}
}


public function giris_bilgisi()
{
    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
        

    if($rutbe == 'admin')
    {

    $model= new giris_bilgileri;
    $veriler=$model::all();
    return view('admin.pages.tables.simple')->with('veriler',$veriler);
    }
    else
    {
           Session::flash('message', "Bu sayfaya girme yetkiniz yok.");
            return redirect('login');
    }

}


public function oda_bilgisi()
{
    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
    if($rutbe == 'admin')
    {
        $model=new oda_bilgileri;
        $veriler=$model::all();
        return view('admin.pages.tables.room')->with('veriler',$veriler);
    }
    else
    {
           Session::flash('message', "Bu sayfaya girme yetkiniz yok.");
            return redirect('login');
    }

}    
public function oda_bilgisi_1()
{   

    $flg=array('isaret' => 0,);
    return view('reservation' , $flg);
}


public function oda_ekle(Input $veriler)
{
    $input=$veriler::all();
    $oda_no=$input['oda_no'];
    $oda_kapasite=$input['oda_kapasite'];
    $oda_fiyat=$input['oda_fiyat'];
    //$oda_resim=$input['oda_resim'];

    $user = array(
        'oda_no'=>$oda_no,
        'oda_kapasite'=>$oda_kapasite,
        'oda_fiyat'=>$oda_fiyat,
       // 'oda_resim'=>$oda_resim
        );
    $rules = array(
        'oda_no'       => 'required',
        'oda_kapasite' => 'required',
        'oda_fiyat'    => 'required',
        //'oda_resim'    => 'required'
        );
    $messages = array(
        'oda_no.required'        => 'Oda numarası alanı boş geçilemez.',
        'oda_kapasite.required'  => 'Oda kapasitesi alanı boş geçilemez.',
        'oda_fiyat.required'     => 'Oda fiyatı alanı boş geçilemez.',
        //'oda_resim.required'     => 'Oda resmi alanı boş geçilemez.'
         );

    $validate = Validator::make($user, $rules, $messages);
    if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

    $model=new oda_bilgileri();
    $model->oda_no=$oda_no;
    $model->oda_kapasite=$oda_kapasite;
    $model->oda_fiyat=$oda_fiyat;
    //$model->oda_resim=$oda_resim;
    $model->save();
    return redirect('room');

}

public function oda_sil($id)
{
     $model= new oda_bilgileri;
     $delete=$model::where('oda_id',$id)->delete();
     $delete;
if ($delete) {
   Session::flash('message', "Oda silme işlemi başarılı.");
    return redirect()->back(); 
}
else
{
Session::flash('message2', "Oda silme işlemi başarısız.");
    return redirect()->back(); 
}
}


public function rezervasyon_bilgisi()
{
    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
    if($rutbe == 'admin')
    {

    $model= new rezervasyon_bilgileri;
    $veriler=$model::all();
    return view('admin.pages.tables.booking')->with('veriler',$veriler);
    }

    else
    {
        Session::flash('message', "Bu sayfaya girme yetkiniz yok.");
            return redirect('login');
    }
}


public function kontrol(input $veriler)
{   
    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
    if($rutbe == 'kullanıcı')
   {
    $input=$veriler::all();
    $yetiskin=$input['yetiskin'];
    $cocuk=$input['cocuk'];
    $giris_tarihi=$input['giris_tarihi'];
    $cikis_tarihi=$input['cikis_tarihi'];
    $toplam=$yetiskin + $cocuk;

    $user = array(
        'giris_tarihi'=> $giris_tarihi,
        'cikis_tarihi'=> $cikis_tarihi);

    $rules = array(
    'giris_tarihi'  => 'required',
    'cikis_tarihi'  => 'required');
    $messages = array(
    'giris_tarihi.required'       => 'Giriş tarihi alanı boş geçilemez.',
    'cikis_tarihi.required'   => 'Çıkış tarihi alanı boş geçilemez.');
    $validate = Validator::make($user, $rules, $messages);
    if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
    }




    $giris_tarihi=format::dateFormat($giris_tarihi);
    $cikis_tarihi=format::dateFormat($cikis_tarihi);

    $giris_tarihi= new DateTime($giris_tarihi);
    $giris_tarihi=$giris_tarihi->format('Y-m-d');
    $cikis_tarihi= new DateTime($cikis_tarihi);
    $cikis_tarihi=$cikis_tarihi->format('Y-m-d');


    $bugun_tarihi= new DateTime();
    $bugun_tarihi=$bugun_tarihi->format('Y-m-d');
    if ($giris_tarihi>=$bugun_tarihi and $cikis_tarihi>$giris_tarihi) {

    $veriler = DB::table('oda_bilgileri')
            ->leftJoin('rezervasyon_bilgileri', 'oda_bilgileri.oda_id', '=', 'rezervasyon_bilgileri.oda_id')->where('oda_kapasite','>=',$toplam)
            ->where(function ($query) use ($giris_tarihi,$cikis_tarihi) {
                $query->where('bitis_tarihi','<=',$giris_tarihi)
                      ->orWhere('baslangic_tarihi','>',$cikis_tarihi)
                      ->orWhereNull('bitis_tarihi')
                      ->orWhereNull('baslangic_tarihi');
            })
           ->orderBy('oda_kapasite','asc')
           ->get();
           
           if (count($veriler)>0) {
               
           
           return view('reservation')->with('veriler',$veriler)->with('isaret',1)->with('giris',$giris_tarihi)->with('cikis',$cikis_tarihi)
           ;
           }
           else{
            Session::flash('message2', "Uygun oda bulunamadı.");
        return redirect('reservation')->withInput();
           }



       }
    else
   {
        Session::flash('message2', "Hatalı tarih girişi yaptınız.");
        return redirect('reservation')->withInput();
    }
   }

   else
   {
    Session::flash('message2', "Üye girişi yapınız.");
    return redirect('login');
    }
}

public function randevu_al(Input $veriler)
{   

    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
    $kullanici_id=Session::get('kullanici_id');


    $input=$veriler::all();
    $oda_no=$input['oda_no'];
    $giris=$input['giris'];
    $cikis=$input['cikis'];


            $model_oda= new oda_bilgileri;
            $odaBilgileri=$model_oda::where('oda_no', $oda_no)->first();
            $oda_id=$odaBilgileri->oda_id;


    $veriler = DB::table('oda_bilgileri')
            ->leftJoin('rezervasyon_bilgileri', 'oda_bilgileri.oda_id', '=', 'rezervasyon_bilgileri.oda_id')
            ->where('oda_no',$oda_no)
            ->where(function ($query) use ($giris,$cikis) {
                $query->where('bitis_tarihi','<=',$giris)
                      ->orWhere('baslangic_tarihi','>',$cikis)
                      ->orWhereNull('bitis_tarihi')
                      ->orWhereNull('baslangic_tarihi');
            })
           ->get();

           if (count($veriler)>0) {
               $model_rez=new rezervasyon_bilgileri;
               $model_rez->kullanici_id=$kullanici_id;
               $model_rez->oda_id=$oda_id;
               $model_rez->baslangic_tarihi=$giris;
               $model_rez->bitis_tarihi=$cikis;
               $kayit=$model_rez->save();

               if ($kayit) {

                   Session::flash('message', "Rezervasyon işlemi başarılı.");
        
                   }
                else{
                    Session::flash('message2', "Rezervasyon işlemi başarısız.");
        
                }
                return redirect('reservation')->withInput();

           }
           else{
                    Session::flash('message2', "Seçtiğiniz oda doludur.");
                    return redirect('reservation')->withInput();

           }




}

public function cikis(){
   Session::flush();
   return redirect('');
}


public function admin()
{
    $rutbe=Session::get('rutbe');
    $id=Session::get('id');
    if($rutbe == 'admin')
    {
        return view('admin.index');
    }
    else
    {
           Session::flash('message', "Bu sayfaya girme yetkiniz yok.");
            return redirect('login');
    }

}  



}





