<?php
namespace App\Service;

use Illuminate\Support\Facades\DB;

class WebService
{


    public function addItem($id,$num,$sid){
        $items = session()->get("items",[]);
        $items2 = session()->get("items2",[]);
         $as = session()->get("as",[]);
        $bs = session()->get("bs",[]);
        $bs2 = session()->get("bs2",[]);
        $cs = session()->get("cs",[]);
        $k = 0;
        $k = count($items2);
        for($i = 0; $i < $k+1; $i++){
        if(empty($items2[$i]) and $i == $k){
            $item = DB::table('product')->where('PRO_ID',$id)->first();
      $items[] = $item;
      session()->put("items",$items);
        $items2[] = $id;
        session()->put("items2",$items2);
      $as[] = $num;
      session()->put("as",$as);
      $b = DB::table('size')->where('SIZE_ID',$sid)->first();
      $bs[] = $b;
      session()->put("bs",$bs);
      $bs2[] = $sid;
      session()->put("bs2",$bs2);
        $c = DB::table('price')->where('SIZE_ID',$sid)
            ->where('PRO_ID',$id)->first();
        $d = $num*"{$c->PRICE_PRICE}";
      $cs[] = $d;
      session()->put("cs",$cs);
        }elseif(empty($items2[$i])){
            $k++;
        }elseif($items2[$i] == $id and $bs2[$i] == $sid){
            $as[$i] += $num;
      session()->put("as",$as);
            $c = DB::table('price')->where('SIZE_ID',$sid)
            ->where('PRO_ID',$id)->first();
            $d = $as[$i]*"{$c->PRICE_PRICE}";
            $cs[$i] = $d;
      session()->put("cs",$cs);
            break;
        }else{
        }
    }
    }

    public function clear(){
      session()->forget("items");
        session()->forget("items2");
      session()->forget("as");
      session()->forget("bs");
        session()->forget("bs2");
      session()->forget("cs");
    }

    public function removeItem($k){
        for($i = 0; $i < count($k); $i++){
        session()->forget("items.$k[$i]");
        session()->forget("items2.$k[$i]");
        session()->forget("as.$k[$i]");
        session()->forget("bs.$k[$i]");
        session()->forget("bs2.$k[$i]");
        session()->forget("cs.$k[$i]");
        }
        
    }

    
    public function kup($index,$kosu){
         $as = session()->get("as",[]);
         $as[$index] = $kosu;
      session()->put("as",$as);
        $items2 = session()->get("items2",[]);
        $id = $items2[$index];
        $bs2 = session()->get("bs2",[]);
        $sid = $bs2[$index];
            $c = DB::table('price')->where('SIZE_ID',$sid)
            ->where('PRO_ID',$id)->first();
            $d = $kosu*"{$c->PRICE_PRICE}";
        $cs = session()->get("cs",[]);
            $cs[$index] = $d;
      session()->put("cs",$cs);
    }
}
