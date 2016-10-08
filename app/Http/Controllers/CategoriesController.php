<?php

namespace MonkBlog\Http\Controllers;

use MonkBlog\Models\Category;
use Illuminate\Http\Response;
use Validator;
use Input;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of categories.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        $viewData = [
            'categories' => $categories,
            'pageTitle' => 'Categories',
        ];

        return view('categories.index', $viewData);
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        $viewData = [
            'pageTitle' => 'Create New Category',
            'category' => new Category,
        ];

        return view('categories.create', $viewData);
    }

    /**
     * Store a newly created category in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Category::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Category::create($data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        if (! $category) {
            abort(404);
        }

        $viewData = [
            'category' => $category,
            'pageTitle' => 'Category: '.$category->title,
        ];

        if (current_theme_exists() && theme_view_exists(current_theme(), 'categories.show')) {
            return response(current_theme_view('categories.show', $viewData));
        }

        return view('categories.show', $viewData);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        if (! $category) {
            abort(404);
        }

        $viewData = [
            'category' => $category,
            'pageTitle' => 'Editing Category "'.$category->title.'"',
        ];

        return view('categories.edit', $viewData);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        $category = Category::find($id);

        if (! $category) {
            abort(404);
        }

        $validator = Validator::make($data = Input::all(), Category::$rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $category->update($data);

        return redirect()->route('admin.categories.index');
    }

    public function confirmDestroy($id)
    {
        $category = Category::find($id);

        $viewData = [
            'category' => $category,
            'pageTitle' => 'Confirm Delete '.$category->title,
        ];

        return view('categories.destroy', $viewData);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Category::destroy($id);

        return redirect()->route('admin.categories.index');
    }
}
