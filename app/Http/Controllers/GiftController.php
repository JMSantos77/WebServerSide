<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GiftController extends Controller
{
    public function userGifts()
    {

        $allGifts = $this->mergeWithUsers();

        return view('gifts.users_gifts', compact('allGifts'));
    }

    public function mergeWithUsers()
    {
        $mergeTables = DB::table('gifts')
            ->join('users', 'users.id', '=', 'gifts.user_Id')
            ->select('gifts.*', 'users.name AS userName',)
            ->get();
        return $mergeTables;
    }

    public function getGifts()
    {
        $giftsTable = DB::table('gifts')
            ->get();

        return $giftsTable;
    }

    public function giftView($id)
    {

        $gift = DB::table(('gifts'))
            ->where('gifts.id', $id)
            ->join('users', 'users.id', '=', 'gifts.user_Id')
            ->select('gifts.*', 'users.name AS userName')
            ->first();

        return view('gifts.gift_view', compact('gift'));
    }

    public function deleteGift($id)
    {

        DB::table('gifts')->where('id', $id)->delete();

        return redirect()->back();
    }
}
