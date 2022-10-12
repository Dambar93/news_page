<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function list()
    {
        $news = News::all();
        return view('news.list', compact('news'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate(
                [
                'title' => 'required|max:50',
                'text' => 'required',
                'category' => 'required|array',
                ]
            );
            $news = News::create($data);
            foreach ($data['category'] as $category) {
                DB::table('news_categories')
                ->updateOrInsert(
                    ['news_id' => $news['id'], 'category_id' => $category],
                );
            }
            $news -> save();
            return redirect(route('news.list'))
                ->with('success', 'News created successfully!');
        }

        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function show(int $id)
    {
        $news = News::find($id);
        return view('news.show', compact('news'));
    }

    public function table()
    {
        $news = News::all();
        return view('news.table', compact('news'));
    }

    public function destroy(News $news)
    {
        // dd($news);
        $news->delete();
        return redirect(route('news.table'))
                ->with('success', 'News deleted successfully!');
    }

    public function edit(Request $request, News $news)
    {
        if ($request->isMethod('POST')) {
            $data = $request->validate(
                [
                'title' => 'required|max:50',
                'text' => 'required|min:3|max:1000',
                'category' => 'required|array',
                ]
            );
            DB::table('news_categories')->where('news_id', $news -> id)->delete();
            $data['updated_at'] = Carbon::now();
             
            $news -> update($data);
            foreach ($data['category'] as $category) {
                DB::table('news_categories')
                ->updateOrInsert(
                    ['news_id' => $news['id'], 'category_id' => $category],
                );
            }
            $news -> save();
            return redirect(route('news.table'))
                ->with('success', 'News updated successfully!');
        }
        $activeCategories = array();
        foreach ($news -> categories as $category) {
            $activeCategories[$category -> id] = $category -> id;
        }
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories', 'activeCategories'));
    }
}
