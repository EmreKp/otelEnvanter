<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AnaKontroler extends Controller
{
    public function index(Request $request){
		$req=$request->input();
		$checkIn=$req["checkIn"];
		$checkOut=$req["checkOut"];
		$pax=$req["pax"];
		$dblOda=DB::table("inventories")->where([
			["room_code","=","STDDBL"],
			["date",">=",$checkIn],
			["date","<",$checkOut]
		])->get();
		$snglOda=DB::table("inventories")->where([
			["room_code","=","STDSNGL"],
			["date",">=",$checkIn],
			["date","<",$checkOut]
		])->get();
		$dblTotal=0; $snglTotal=0;
		foreach($dblOda as $dbl){
			if($dbl->allotment==0 || $dbl->max_pax<$pax){
				$dblTotal=null;
				break;
			}
			$fiyat=$dbl->price;
			$indir=$dbl->discount;
			if($indir==null) $indir=0;
			$dblTotal+=$fiyat-$fiyat*$indir/100;
		}
		foreach ($snglOda as $sngl){
			if($sngl->allotment==0 || $sngl->max_pax<$pax){
				$snglTotal=null;
				break;
			}
			$fiyat=$sngl->price;
			$indir=$sngl->discount;
			if($indir==null) $indir=0;
			$snglTotal+=$fiyat-$fiyat*$indir/100;
		}
		return response()->json([
			["roomCode" => "STDSNGL", "price" => $dblTotal],
			["roomCode" => "STDDBL", "price" => $snglTotal]
		]);
	}
}
