<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;


class NewsController extends Controller
{
    public function list()
    {
        $news = News::all();
        return view('news.show', compact('news'));
    }
    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate([
                'title' => 'required|max:2',
                'text' => 'required',
                'category_id' => 'required|array',
            ]);
            dd($data);


            return redirect('news')
                ->with('success', 'News created successfully!');
        }

        $categories = Category::all();
        return view('news.create', compact('categories'));
    }


}
