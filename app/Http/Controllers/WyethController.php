<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WyethMember;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class WyethController extends Controller
{
    public function welcome()
    {
        $mysql2Data = DB::connection('mysql2')
            ->table('account')
            ->select(['CustName', 'Address', 'PhoneNumber1'])
            ->paginate(10); 
        
        $mysqlMembers = Member::all();

        return view('welcome', [
            'sqlServerMembers' => $sqlServerMembers,
            'mysqlMembers' => $mysqlMembers,
        ]);
    }
}
