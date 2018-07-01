<?php

namespace App\Http\Controllers;

use App\User;
use App\Dialog;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Sodium\compare;

class UserCpController extends Controller
{

    public function reg()
    {
        return view('reg');
    }

    //
    public function get_info()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('user_cp', compact('user'));
    }


    public function user_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);
        $user = new User;
        $user->login = request('login');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->photo = 'grey.jpg';
        $user->save();
        return redirect('/1');

    }


    public function avaUpload(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = User::find(Auth::id())->id . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('/img'), $imageName);
        $user = User::find(Auth::id());
        $user->photo = $imageName;
        $user->save();
        return redirect('/user_cp');
    }

    public function store_about(Request $request)
    {
        $about='jjjj';
        if ($request->isMethod('post')) {
            $id = $request->id;
            $about = $request->about;
            User::where('id', $id)->update(['about' => $about]);
        }
        return $about;
    }
    public function guest($id){
$guest=User::select('users.id as id', 'users.name as name','users.about as about','users.photo as photo' )
    ->where('users.id', $id)
    ->get();

        return view('guest_cp',compact('guest'));
    }
    public function post_mes(Request $request){

        if($request->isMethod('post')){
            dd("das");
        }

        $id_1=User::find(Auth::id());
        $id_2= request('id_2');
//$ifdialog=Dialog::where('id_1',$id_1)
//->orwhere('id_2',$id_1)
//    ->orwhere('id_1',$id_2)
//    ->orwhere('id_2',$id_2);

        $ifdialog = DB::select('SELECT id FROM dialogs WHERE (id_fom = ? or id_to = ?) AND (id_fom = ? or id_to = ?)', [$id_1,$id_1,$id_2,$id_2]);

        dd($ifdialog);

//        if ($ifdialog==0){
//            $dialog = new Dialog();
//            $dialog->id_1 = $id_1;
//            $dialog->id_2 = $id_2;
//            $dialog->save();
//        }

//        $dat= Dialog::leftJoin('users as id_1', 'dialogs.id_1', '=', 'id_1.id')
//            ->leftJoin('users as id_2', 'dialogs.id_2', '=', 'id_2.id')
//            ->select('dialogs.id  as  id','dialogs.id_1  as  id_1', 'id_1.name  as  id_1_name', 'id_1.photo  as  id_1_photo', 'dialogs.id_2  as  id_2',
//                'id_2.name  as  id_2_name', 'id_2.photo  as  id_2_photo')
//            ->where('dialogs.id_1', $id_1)
//            ->orwhere('dialogs.id_2', $id_2)
//            ->orwhere('dialogs.id_1', $id_2)
//            ->orwhere('dialogs.id_2', $id_1)
//            ->get();
//return view('dialog');


    }
}

