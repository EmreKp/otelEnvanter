<?php

namespace App\Http\Controllers;

use Request;
use DB;

class AnaKontroler extends Controller
{
	public function index(){
		$req=Request::input();
		if(!Request::has("checkIn") || !Request::has("checkOut") || !Request::has("pax")){
			return response("Hata: Parametrelerin hepsini girmeniz gerekmektedir.",400);
		}
		$checkIn=$req["checkIn"];
		$checkOut=$req["checkOut"];
		$pax=$req["pax"];
		$odaAl=DB::table("inventories")->where([
			["date",">=",$checkIn],
			["date","<",$checkOut]
		])->get();
		$odalar=$odaAl->groupBy("room_code");
		$keys=$odalar->keys();
		$prices=[];
		foreach($keys as $k){
			$fyt=[];
			$total=0;
			foreach($odalar[$k] as $oda){
				if ($oda->allotment==0 || $oda->max_pax<$pax){
					$total=null;
					break;
				}
				$fiyat=$oda->price;
				$indir=$oda->discount;
				if($indir==null) $indir=0;
				$fiyat=$fiyat-$fiyat*$indir/100;
				$total+=$fiyat;
			}
			$fyt=["roomCode" => $k, "price" => $total];
			$prices[]=$fyt;
		}
		return response()->json($prices);
	}
}
