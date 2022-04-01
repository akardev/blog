<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Config;

class PageController extends Controller
{




    public function index()
    {
        $pages = Page::all();
        return view('back.pages.index', compact('pages'));
    }

    public function switch(Request $request)
    {
        $page = Page::findOrFail($request->id);
        $page->status = $request->statu == 'true' ? 1 : 0;
        $page->save();
    }

    public function create()
    {
        return view('back.pages.create',);
    }


    public function update($id)
    {
        $page=Page::findOrFail($id);
        return view('back.pages.update', compact('page'));
    }

    public function updatePost(Request $request, $id)
    {
        $request->validate([
            'title' => 'min:3',
        ]);
        $page = page::findOrFail($id);
        $page->title = $request->title;
        $page->content = $request->content;
        $page->slug = Str::slug($request->title);
        $page->save();
        toastr()->success('sayfa başarıyla güncellendi.', 'O iş tamam!');
        return redirect()->route('admin.pages.index');
    }



    public function post(Request $request)
    {
        $request->validate([
            'title' => 'min:3',

        ]);

        $last = Page::orderBy('order', 'DESC')->first();


        $page = new Page;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->order = $last->order + 1;
        $page->slug = Str::slug($request->title);

        $page->save();
        toastr()->success('Sayfa başarıyla oluşturuldu.');
        return redirect()->route('admin.pages.index');
    }

    public function delete($id){
        $page=Page::find($id);
        
        $page->delete();
        toastr()->success('Sayfa başarıyla silindi');
        return redirect()->back();
    }
}
