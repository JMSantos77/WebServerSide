<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function userGifts(){

        $allGifts = $this->getGifts();

        return view('gifts.users_gifts', compact('allGifts'));
    }

    public function getGifts(){
        $giftsTable = DB::table('gifts')
        ->get();

        return $giftsTable;
    }

    public function giftView($id){

        $gift = DB::table(('gifts'))
        ->where('id', $id)
        ->first();

        return view('gifts.gift_view', compact('gift'));
    }

    public function deleteGift($id){

        DB::table('gifts')->where('id', $id)->delete();

        return redirect() ->back();
    }

}
