<?php

namespace App\Http\Controllers;

use App\Category;
use App\Categorypage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Language;
class RedactorController extends Controller
{
    public function getRed()
    {
        $categories = Category::get();
        $languages = Language::get();
        $col = Categorypage::count();
        $runtime = Categorypage::where('categoryPages.status', '=', 1)->count();
        $completed= Categorypage::where('categoryPages.date_finish', '>',Carbon::now())->count();
        $Notcompleted= Categorypage::where('categoryPages.date_finish', '<=',Carbon::now())->count();
        return view('redactor', ['col' => $col, 'runtime' =>  $runtime, 'completed' =>  $completed,'Notcompleted' =>  $Notcompleted]);
    }

    public function getAll(Request $request)
    {
        $categories = Category::get();
        $languages = Language::get();
        if ($request->ajax()) {
           $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
                ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
                ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
                ->leftJoin('users', 'categoryPages.user', '=', 'users.id')
                ->select('categoryPages.id  as  id', 'categoryPages.img as img', 'categoryPages.ad as ad', 'categoryPages.complexity as complexity',
                    'one.language  as  language', 'two.language  as  translation', 'categories.category as category', 'categoryPages.date_start as date_start',
                    'categoryPages.date_finish as date_finish', 'users.name as  user')->get();
            response()->json($Data);
           return view('categorys.SelectForUpdate', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);

        }
    }
}

