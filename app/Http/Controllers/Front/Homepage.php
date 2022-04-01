<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


//models
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\Contact;
use App\Models\Config;


class Homepage extends Controller
{

     public function __construct()
     { if(Config::find(1)->active==0){
          return redirect()->to('site-bakimda')->send();
     }
          view()->share('pages',Page::where('status',1)->orderBy('order','ASC')->get());
          view()->share('categories',Category::where('status',1)->orderBy('name')->get());
     }

     public function index()
     {
          $data['articles'] = Article::with('getCategory')->where('status',1)->whereHas('getCategory',function($query){
          $query->where('status',1);
          })->orderBy('created_at', 'DESC')->paginate(10);
          $data['articles']->withPath(url('yazilar'));
          return view('front.homepage', $data);
     }




     public function single($category, $slug)
     {
          $category = Category::whereSlug($category)->first() ?? abort(404, 'böyle bi şey yok');
          $article = Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(404, 'Böyle bir yazı yok');
          $article->increment('hit');
          $data['article'] = $article;
          return view('front.single', $data);
     }

     public function category($slug, Request $request)
     {
          $category = Category::whereSlug($slug)->first() ?? abort(404, 'böyle bi şey yok');
          $data['category'] = $category;
          $data['articles'] = Article::where('category_id', $category->id)->where('status',1)->orderBy('created_at', 'DESC')->paginate(3);
          $lastpage = $data['articles']->lastPage();
          $page = $request->input('page'); // get page number at url
          if ($page > $lastpage) {
               abort(404);
               return redirect()->route('category', ['category' => $category->slug]); //redirect to category route with category data 
          };
          return view('front.category', $data);
     }

     public function page($slug){
          $page=Page::whereSlug($slug)->first() ?? abort(404,'yok');
          $data['page']=$page;
          return view('front.page',$data);
     }


     public function contact(){
          return view('front.contact');
     }

     public function contactpost(Request $request){


          $validator = Validator::make($request->all(), [
               'name' => 'required|min:5',
               'email' => 'required|email',
               'message' => 'required|min:10'
           ]);

           if ($validator->fails()) {
               return redirect()->route('contact')
                           ->withErrors($validator)
                           ->withInput();
           }

           // Retrieve the validated input...
        $validated = $validator->validated();



          $contact = new Contact;
          $contact->name=$request->name;
          $contact->email=$request->email;
          $contact->message=$request->message;
          $contact->save();
          return redirect()->route('contact')->with('success','mesaj gönderildi.');
     }
}
