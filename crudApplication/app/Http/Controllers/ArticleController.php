<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use DB;

class ArticleController extends Controller
{
    public function show() {
        // $articles = DB::table('articles')->orderBy('id', 'desc')->get();
        // $articles = Article::all();
        $articles = Article::orderBy('id')->get();
        return view('list')->with(compact('articles'));
    }

    public function addArticle() {
        return view('add');
    }

    public function saveArticle(Request $request) {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:100'
        ]);

        if ($validator->passes()) {
            // Insert record in DB

            $article = new Article;

            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;

            $article->save();

            $request->Session()->flash('msg', 'Article saved successfully');
            return redirect('articles');

        } else {
            // return with error
            return redirect(route('articles.add'))->withErrors($validator)->withInput();
        }
    }

    public function editArticle($id, Request $request) {
        // Fetch a record from database
        $article = Article::where('id', $id)->first();
       if (!$article) {
           $request->Session()->flash('errorMsg', 'Record not found');
           return redirect('articles');
       } 

        return view('edit')->with(compact('article'));
    } 

    public function updateArticle($id, Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'author' => 'required|max:100'
        ]);

        if ($validator->passes()) {
            // Insert record in DB

            $article = Article::find($id);

            $article->title = $request->title;
            $article->description = $request->description;
            $article->author = $request->author;

            $article->save();

            $request->Session()->flash('msg', 'Article updated successfully');
            return redirect('articles');

        } else {
            // return with error
            return redirect(route('articles.edit.{id}'))->withErrors($validator)->withInput();
        }
    }

    public function deleteArticle($id, Request $request) {
        $article = Article::where('id', $id)->first();
       if (!$article) {
           $request->Session()->flash('errorMsg', 'Record not found');
           return redirect('articles');
       }
       
       Article::where('id', $id)->delete();
       $request->session()->flash('msg', 'Record has been deleted successfully');
       return redirect('articles');
    }

}
