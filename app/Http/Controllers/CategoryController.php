<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create_category(Request $request)
    {
        $form_data = $request->validate([
            'title' => 'required|string|max:255',
        ]);
        return Category::create($form_data);
    }

    public function get_categories()
    {
        return Category::all();
    }

    public function get_category($id)
    {
        if ($id) {
            return Category::find($id);
        }
    }

    public function update_category(Request $request, $id)
    {
        if ($id) {
            $form_data = $request->validate([
                'title' => 'required|string|max:255'
            ]);
            $category = Category::find($id);
            return $category->update($form_data);
        }
    }

    public function delete_category($id)
    {
        if ($id) {
            $category = Category::find($id);
            if ($category) {
                $category->delete();
                return response()->json(['message' => 'Category deleted successfully'], 200);
            }
        }
    }
}
