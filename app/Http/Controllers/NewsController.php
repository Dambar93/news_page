<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


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
                'title' => 'required|max:50',
                'text' => 'required',
                'category' => 'required|array',
            ]);
            $news = News::create($data);
            foreach ($data['category'] as $category) {
                DB::table('news_categories')
                ->updateOrInsert(
                    ['news_id' => $news['id'], 'category_id' => $category],
                    
                );
            }
            return redirect('news')
                ->with('success', 'News created successfully!');
        }

        $categories = Category::all();
        return view('news.create', compact('categories'));
    }


}
