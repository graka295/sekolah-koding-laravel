<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index($name)
    {
        // try {
        //     DB::connection()->getPdo();
        //     echo "Connected successfully to: " . DB::connection()->getDatabaseName();
        // } catch (\Exception $e) {
        //     die("Could not connect to the database. Please check your configuration. error:" . $e );
        // }
        // $article = [
        //     ["title" => "Judul pertama", "subTitle" => "Keterangan judul pertama"],
        //     ["title" => "Judul kedua", "subTitle" => "Keterangan judul kedua"],
        //     ["title" => "Judul ketiga", "subTitle" => "Keterangan judul ketiga"],
        // ];
        $article =  Article::orderBy('id', 'DESC')->paginate(15);
        return view('article.index', ["name" => $name, "data" => $article]);
    }
    public function create()
    {
        return view('article.form');
    }
    public function doCreate(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'subTitle' => 'required|max:255|min:3',
        ]);

        // $article = new Article;
        // $article->title = $request->title;
        // $article->subTitle = $request->subTitle;
        // $article->save();

        // mass assignment
        Article::Create([
            "title" => $request->title,
            "slug" => Str::slug($request->title,"-"),
            "subTitle" => $request->subTitle,
        ]);

        return redirect('/article/galang');
    }
    public function update($id)
    {
        $data =  Article::find($id);
        return view('article.form', compact('data'));
    }
    public function doUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255|min:3',
            'subTitle' => 'required|max:255|min:3',
        ]);

        // $article =  Article::find($id);
        // $article->title = $request->title;
        // $article->subTitle = $request->subTitle;
        // $article->save();

        // mass assignment
        Article::find($id)->update([
            "title" => $request->title,
            "subTitle" => $request->subTitle,
        ]);
        return redirect('/article/galang');
    }
    public function doDelete($id)
    {
        $article =  Article::find($id);
        if ($article == null){
            abort(404);
        }

        $article->delete();
        return redirect('/article/galang');
    }
}
