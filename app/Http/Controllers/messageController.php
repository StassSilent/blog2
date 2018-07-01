<?php

namespace App\Http\Controllers;

use App\Complain;
use App\Message;
use Illuminate\Http\Request;
use App\User;
use App\Dialog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class messageController extends Controller
{
    public function get_dialog(){
//        $dialog=Dialog::get();
        $id = Auth::id();
        $user = User::find($id);
        $data= Dialog::leftJoin('users as id_1', 'dialogs.id_1', '=', 'id_1.id')
          ->leftJoin('users as id_2', 'dialogs.id_2', '=', 'id_2.id')
        ->select('dialogs.id  as  id','dialogs.id_1  as  id_1', 'id_1.name  as  id_1_name', 'id_1.photo  as  id_1_photo', 'dialogs.id_2  as  id_2',
                'id_2.name  as  id_2_name', 'id_2.photo  as  id_2_photo')
            ->where('dialogs.id_1', $user->id)
            ->orwhere('dialogs.id_2', $user->id)
            ->get();

        return view('dialog',compact('data'));
    }


    public function post_dialog ($id){
        $id_photo=request()->id_photo;
        $id_name=request()->id_name;
        $id_d=$id;
        $id_1= Auth::id();
        $id_2= request('id_2');

//        $info = DB::select('select id from dialogs WHERE (id_1 = ? or id_2 = ?) and (id_1 = ? or id_2 = ?)', [$id_1,$id_1,$id_2,$id_2]);
//
//        dd($info); // в инфо приходит ответ типа:array: 1 [▼0 => {#578 ▼+"id": 9}]            и даже хз как его поправить, может через модель?
//
//
//
//        if(!empty($info)){
//            $id_d=$id;
//            $id_name=request()->id_name;
//            $data_mes= Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
//                ->select('messages.message as message', 'messages.id_from as from','messages.id_to as to' )
//                ->where('messages.dialog', $id)
//                ->get();
////        $data_mes_one=Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
////            ->distinct('messages.id_from as from','messages.id_to as to' )
////            ->where('messages.dialog', $id)
////            ->get();
//            return view('messages',compact('data_mes', 'id_d', 'id_photo','id_name'));
//        }else{
//            $dialog = new Dialog();
//            $dialog->id_1 = $id_1;
//            $dialog->id_2 = $id_2;
//            $dialog->save();
//            $id_1= Auth::id();
//            $id_2= request('id_2');
//
//            $info = DB::select('select id from dialogs WHERE (id_1 = ? or id_2 = ?) and (id_1 = ? or id_2 = ?)', [$id_1,$id_1,$id_2,$id_2]);
//
//            $id_d=info;
//            $id_name=request()->id_name;
            $data_mes= Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
                ->select('messages.message as message', 'messages.id_from as from','messages.id_to as to' )
                ->where('messages.dialog', $id)
                ->get();
//        $data_mes_one=Message::leftJoin('dialogs as d','messages.dialog','=','d.id')
//            ->distinct('messages.id_from as from','messages.id_to as to' )
//            ->where('messages.dialog', $id)
//            ->get();
            return view('messages',compact('data_mes', 'id_d', 'id_photo','id_name'));



/// //ЕЩЕ НЕ СУЩЕСТВУЕТ НУЖНО ДОБАВИТЬ
        }



    public function post_messages(Request $request){
    if ($request->isMethod('post')) {
            $id_dialog = $request->id_dialog;
            $id_to=$request->id_to;
            $mes=$request->mes;
            $message= new Message;
        $message->message=$mes;
        $message->dialog=$id_dialog;
        $message->id_from=Auth::id();
            $message->id_to=$id_to;
            $message->save();
        }

    }
     public function deldialog(Request $request){
         $id_dialog = $request->id;
         Dialog::where('dialogs.id','=',$id_dialog)->delete();
     }
     public function postcomplain(Request $request){

         if ($request->isMethod('post')) {
             $id=Auth::id();
             $compl = $request->compl;
             $complain= new Complain();
             $complain->user_id = $id;
             $complain->complain=$compl;
             $complain->save();
         }

     }
}

