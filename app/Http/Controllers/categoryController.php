<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use DB;
use App\Categorypage;
use App\Language;
class categoryController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Request $request) {
        $categories = Category::get();
        $languages = Language::get();
        if($request->ajax() ){
            $lang= $request->lang;
            $cat =  $request->cat;
           $priceMin =  $request->priceMin;
            $priceMax =  $request->priceMax;

            $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
                ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
                ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
                ->leftJoin('users', 'categoryPages.user', '=', 'users.id')
               ->where('categoryPages.price', '>=',$priceMin)
                ->where('categoryPages.price', '<=',$priceMax)
               ->when($lang, function ($language) use ($lang){
                    return $language ->where('one.id', $lang);
                })
               ->when($cat, function ($category) use ($cat){
                    return $category ->where('categories.id', $cat);
                })
                ->select('categoryPages.id  as  id', 'categoryPages.img as img', 'categoryPages.ad as ad', 'categoryPages.complexity as complexity',
                    'one.language  as  language', 'two.language  as  translation', 'categories.category as category',
                    'users.name as  user')->get();
           /* if  ($lang->exists){
                $Data ->where('one.id', $lang)->get();
            }*/

        //   dd($Data);
             response()->json($Data);
            return view('categorys.products', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);

        }
        else {
            $Data = Categorypage:: leftJoin('categories', 'categoryPages.type_category', '=', 'categories.id')
                ->leftJoin('languages as one', 'categoryPages.language', '=', 'one.id')
                ->leftJoin('languages as two', 'categoryPages.language_translation', '=', 'two.id')
                ->leftJoin('users', 'categoryPages.user', '=', 'users.id')
                ->select('categoryPages.id  as  id', 'categoryPages.img as img', 'categoryPages.ad as ad', 'categoryPages.complexity as complexity',
                    'one.language  as  language', 'two.language  as  translation', 'categories.category as category',
                    'users.name as  user')
                ->get();

            return view('category', ['languages' => $languages, 'categories' => $categories, 'Data' => $Data]);

        }
    }



    public function getDetails($id) {
        $data=Categorypage::leftJoin('categories','categorypages.type_category','=','categories.id')
            ->leftJoin('languages as one','categoryPages.language','=','one.id')
            ->leftJoin('languages as two','categoryPages.language_translation','=','two.id')
            ->leftJoin('users','categorypages.user','=','users.id')
            ->select('categorypages.img as img','categorypages.ad as ad','categorypages.complexity as complexity',
                'categorypages.category_pages as categoryPages',
                'one.language  as  language','two.language  as  translation','categories.category as category','users.name  as  user')
            ->where('categorypages.id', $id)->get();
        return view('categorys.details', ['data'=>$data]);
    }
    public function create()
    {
        $categories = Category::get();
        $languages = Language::get();
        return view('create',['categories'=>$categories], ['languages'=>$languages]);
    }
    public function store()
    {
        $categoryPage = new Categorypage;
        $category = new Category;
        $language = new Language;

       if (request('language2') != NULL) {
           Language::insert(['language'  =>  request('language2')]);
           $Language = Language:: where('language', request('language2'))->value('id');

       }
       else
       {
           $Language= Language:: where('language', request('language'))->value('id');
       }
        if (request('language_translation2') != NULL) {
           Language::insert(['language'  =>  request('language_translation2')]);
            $language_translation = Language:: where('language', request('language_translation2'))->value('id');

       }
       else {
           $language_translation = Language:: where('language', request('language_translation'))->value('id');
       }

        if (request('type_category2') != NULL) {
            Category::insert(['category'  =>  request('type_category2')]);
            $type_category = Category:: where('category', request('type_category2'))->value('id');

        }
        else {
            $type_category =Category:: where('category', request('type_category'))->value('id');
        }

        Categorypage::insert([
            'language' =>$Language,
            'language_translation' =>$language_translation,
            'type_category' =>$type_category,
            'price' => request('price'),
            'complexity'=> request('complexity'),
            'ad'=> request('add'),
            'complexity'=> request('complexity'),
            'category_pages' =>request('category_pages'),
            'date_start' =>request('dateStart'),
            'date_finish' =>request('dateFinish'),
            /*'lmg' =>request('img'),*/
            'link' =>request('link'),

            ]);
    }
}
