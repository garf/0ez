<?php

namespace App\Http\Controllers\Root;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
use Input;
use Redirect;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Categories',
            'categories' => Categories::i()->allWithPostsCount(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'categories');
        return view('root.categories.index', $data);
    }

    public function newCategory()
    {
        $data = [
            'title' => 'New Category',
            'category' => null,
            'save_url' => route('root-categories-store'),
        ];
        $this->title->prepend($data['title']);

        return view('root.categories.category', $data);
    }

    public function editCategory($category_id)
    {
        $category = Categories::find($category_id);
        $data = [
            'title' => 'Edit Category - ' . $category->title,
            'category' => $category,
            'save_url' => route('root-categories-store', ['category_id' => $category->id]),
        ];
        $this->title->prepend($data['title']);

        return view('root.categories.category', $data);
    }

    public function store($category_id=null)
    {
        $category = Categories::findOrNew($category_id);
        $category->title = strip_tags(Input::get('title'));
        $seo_title = strip_tags(Input::get('seo_title'));
        $category->seo_title = (trim($seo_title) == '') ? $category->title : $seo_title;
        $category->seo_description = strip_tags(Input::get('seo_description'));
        $category->seo_keywords = strip_tags(Input::get('seo_keywords'));
        $category->slug = str_slug($category->seo_title);
        $category->save();

        return Redirect::route('root-categories-edit', ['category_id' => $category->id]);
    }

    public function remove($category_id)
    {
        $category = Categories::find($category_id);
        $category->delete();
        if(Input::get('with_posts', '0') == '1') {
            Posts::where('category_id', $category_id)->delete();
        } else {
            Posts::where('category_id', $category_id)->update(['category_id' => '1']);
        }
        return Redirect::route('root-categories');
    }
}
