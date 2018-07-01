<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;
use App\Categorypage;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
//    public function panel(){
//        return view('admin_panel');
//    }
    public function panel(Request $request){
        $user=User::get();
//        $categ=Categorypage::get();
        $user_count=$user->count();
        $user_new= User::whereYear('created_at', '=', (Carbon::now())->year)
            ->whereMonth('created_at', '=',(Carbon::now())->month)
            ->count();


//        $categ_count=$categ->count();
//        $runtime = Categorypage::where('categoryPages.status', '=', 1)->count();
//
//
//        $completed= Categorypage::where('categoryPages.date_finish', '>',Carbon::now())->count();
//
//
//        $Notcompleted= Categorypage::where('categoryPages.date_finish', '<=',Carbon::now())->count();
        $data = User::select('users.id as id', 'users.name  as  login', 'users.photo as photo','users.email as email','users.block as block','users.grant as grant')
            ->get();
        $comp=Complain::LeftJoin('users as users','complains.user_id','=','users.id')
        ->select('complains.id as id','complains.user_id as userc', 'complains.complain as complain', 'users.name as name', 'users.photo as photo')
            ->get();
        return view('admin_panel',compact('user_count','display','user_new' ,'runtime','data','comp'));


    }


    public function find(Request $request)
    {

        $username1 = $request->search;
        if($username1==null){
//        $username1='.';
            $userlist1 = User::select('users.id as id', 'users.name  as  name', 'users.photo as photo', 'users.email as email','users.block as block','users.grant as grant')->get();
        }else{
            $userlist1 = User::select('users.id as id', 'users.name  as  name', 'users.photo as photo', 'users.email as email','users.block as block','users.grant as grant')
                ->when($username1, function ($name) use ($username1) {
                    return $name->where('name', 'like', '%' . $username1 . '%');
                })->get();
        }



        return $userlist1;
    }



    public function block1(Request $request)
    {
        if ($request->isMethod('get')) {

            $b = User::select('users.id as id', 'users.name  as  name', 'users.photo as photo', 'users.email as email', 'users.block as block')
                ->where('users.block', 1)
                ->get();
            return $b;

        } else if($request->isMethod('post')){
            $id = $request->id;
            User::where('id', $id)->update(['block' => 1]);
        }

    }

    public function unblock(Request $request)
    {
        if ($request->isMethod('post')) {
            $id = $request->id;
            User::where('id', $id)->update(['block' => 0]);

        }
    }
    public function grant(Request $request)
    {
        if ($request->isMethod('get')) {
            $b = User::select('users.id as id', 'users.name  as  name', 'users.photo as photo', 'users.email as email', 'users.grant as grant')
                ->where('users.grant','>',1)
                ->get();
            return $b;}
        else if ($request->isMethod('post')) {
            $id = $request->id;
            User::where('id', $id)->update(['grant' => 2]);
            return $request->id;

        }
    }


    public function ungrant(Request $request)
    {

        if ($request->isMethod('post')) {
            $id = $request->id;
            User::where('id', $id)->update(['grant' => 0]);
            return $id;

        }
    }
    public function fullcomp(Request $request)
    {
        $idcomp = $request->idcomp;
        $full=Complain::LeftJoin('users as users','complains.user_id','=','users.id')
        ->select('complains.id as id','complains.user_id as userc', 'complains.complain as complain', 'users.name as name', 'users.photo as photo')
        ->where('complains.id',$idcomp)
        ->get();
        return $full;
    }

    public function deleteComp(Request $request){

        $idc = $request->idcomp;
        $deleteComplain = Complain::find($idc);
        $deleteComplain->delete();

        return $idc;
    }

}

