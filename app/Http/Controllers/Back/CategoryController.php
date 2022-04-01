<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Config;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('back.categories.index',compact('categories'));
    }
    
    public function create(Request $request){
       $isExists=Category::whereSlug(Str::slug($request->category))->first(); //slug yerine name de olur garanti amaçlı slug iyi
       if($isExists){
        toastr()->error($request->category.' adında bir kategori zaten mevcut!');
           return redirect()->back();

       }
       $category=new Category;
       $category->name=$request->category;
       $category->slug=Str::slug($request->category); 
       $category->save();
       toastr()->success('Kategori Başarıyla Eklendi');
       return redirect()->back();
    }

    public function update(Request $request){
        $isSlug=Category::whereSlug(Str::slug($request->slug))->whereNotIn('id',[$request->id])->first(); 
        $isName=Category::whereName($request->category)->whereNotIn('id',[$request->id])->first(); //slug yerine name de olur garanti amaçlı slug iyi

        if($isSlug or $isName){
            toastr()->error($request->category.' adında bir kategori zaten mevcut!');
            return redirect()->back();
 
        }
        $category= Category::find($request->id);
        $category->name=$request->category;
        $category->slug=Str::slug($request->slug); 
        $category->save();
        toastr()->success('Kategori Başarıyla Güncellendi');
        return redirect()->back();
     }

     public function delete(Request $request){
        $category=Category::findOrFail($request->id);
        $defaultCategory=Category::find(1);
        if($category->id==1){
            toastr()->error('Bu kategori silinemez');
            return redirect()->back();
        }
        $allArticle = Article::withTrashed()->where('category_id',$category->id);
        $allArticles = Article::withTrashed()->where('category_id',$category->id)->get();
        $message='';
        $count=$category->articleCount();
        if($count>0)
        {
            $allArticle->update(['category_id'=>1]);
            $message='Bu kategoriye ait '.$count.' makale '.$defaultCategory->name.' kategorisine taşındı.';
        } elseif ($count==0 and count($allArticles)>0) 
        {
            $allArticle->update(['category_id'=>1]);
        }

            $category->delete();
            toastr()->success($message,'Kategori Başarıyla silindi!');
            return redirect()->back();
     }


    public function getData(Request $request){
        $category=Category::findOrFail($request->id);
        return response()->json($category);
        
     }


     


    public function switch1(Request $request){
      $category=Category::findOrFail($request->id);
      $category->status=$request->statu=="true" ? 1 : 0 ;
      $category->save();
      
    }

    
}

