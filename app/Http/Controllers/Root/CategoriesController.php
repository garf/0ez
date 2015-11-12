<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Categories;
use App\Models\Posts;
use Input;
use Notifications;
use Redirect;
use View;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = [
            'title'      => 'Categories',
            'categories' => Categories::i()->allWithPostsCount(),
        ];
        $this->title->prepend($data['title']);
        View::share('menu_item_active', 'categories');

        return view('root.categories.index', $data);
    }

    public function newCategory()
    {
        $data = [
            'title'    => 'New Category',
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
            'title'    => 'Edit Category - '.$category->title,
            'category' => $category,
            'save_url' => route('root-categories-store', ['category_id' => $category->id]),
        ];
        $this->title->prepend($data['title']);

        return view('root.categories.category', $data);
    }

    public function store(Requests\StoreCategoryRequest $request, $category_id = null)
    {
        $category = Categories::findOrNew($category_id);
        $category->title = strip_tags(Input::get('title'));
        $seo_title = strip_tags(Input::get('seo_title'));
        $category->seo_title = (trim($seo_title) == '') ? $category->title : $seo_title;
        $category->seo_description = strip_tags(Input::get('seo_description'));
        $category->seo_keywords = strip_tags(Input::get('seo_keywords'));
        if (Input::has('update_slug')) {
            $category->resluggify();
        }
        $category->save();



        Notifications::add('Category saved', 'success');

        return Redirect::route('root-categories-edit', ['category_id' => $category->id]);
    }

    public function remove($category_id)
    {
        $category = Categories::find($category_id);
        $category->delete();
        if (Input::get('with_posts', '0') == '1') {
            Posts::where('category_id', $category_id)->delete();
            Notifications::add('Category removed with posts', 'success');
        } else {
            Posts::where('category_id', $category_id)->update(['category_id' => '1']);
            Notifications::add('Category removed. Posts moved to Uncategorized', 'success');
        }

        return Redirect::route('root-categories');
    }
}
