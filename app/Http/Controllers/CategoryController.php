<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // return Category::all(); // SELECT * FROM categories

        return view('categories/index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        // Insertion en base de données
        $category = new Category();
        $category->name = 'Action';
        $category->save(); // INSERT INTO categories en Laravel

        return redirect('/categories');
    }
}
