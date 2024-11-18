<?php

namespace App\Http\Controllers;
use App\Models\Categories;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view("category_list", compact("categories"));
    }

    public function create_form()
    {
        return view("CreateCategories");
    }


    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->save();

        return redirect("dashboard");
    }

    public function update_form(Request $request, $id)
    {
        $category = Categories::findOrFail($id);

        return view("update_category", compact("category"));
    }

    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);

        $category->name = $request->name;
        $category->save();

        return redirect("dashboard");
    }

}
