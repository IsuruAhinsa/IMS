<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SaveCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        if (request()->status == 'deleted') {
            $categories = Category::onlyTrashed()->get();
        } else {
            $categories = Category::all();
        }
        return view('categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('categories.create')->with('category', new Category);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveCategoryRequest $request)
    {
        $category = new Category;
        $category->asset_category_id = $request->input('asset_category_id');
        $category->ecri_code = $request->input('ecri_code');
        $category->asset_category = $request->input('asset_category');
        $category->asset_definition = $request->input('asset_definition');
        $category->asset_type = $request->input('asset_type');
        $category->classification = $request->input('classification');
        $category->pm_hours = $request->input('pm_hours');
        $category->task_no = $request->input('task_no');
        $category->pm_frequency = $request->input('pm_frequency');
        $category->fda_risk = $request->input('fda_risk');
        $category->proficiency_level = $request->input('proficiency_level');
        $category->tools_required = $request->input('tools_required');
        $category->safety_instructions = $request->input('safety_instructions');
        $category->est_service_life = $request->input('est_service_life');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Category $category)
    {
        return view('categories.view')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveCategoryRequest $request, Category $category)
    {
        $category->asset_category_id = $request->input('asset_category_id');
        $category->ecri_code = $request->input('ecri_code');
        $category->asset_category = $request->input('asset_category');
        $category->asset_definition = $request->input('asset_definition');
        $category->asset_type = $request->input('asset_type');
        $category->classification = $request->input('classification');
        $category->pm_hours = $request->input('pm_hours');
        $category->task_no = $request->input('task_no');
        $category->pm_frequency = $request->input('pm_frequency');
        $category->fda_risk = $request->input('fda_risk');
        $category->proficiency_level = $request->input('proficiency_level');
        $category->tools_required = $request->input('tools_required');
        $category->safety_instructions = $request->input('safety_instructions');
        $category->est_service_life = $request->input('est_service_life');
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'The Category was deleted successfully.');
    }

    public function restore($asset_category_id = null)
    {
        Category::onlyTrashed()->where('asset_category_id', $asset_category_id)->restore();
        return redirect()->route('categories.index')->with('success', 'Category restored successfully.');
    }

    public function fdelete($asset_category_id = null)
    {
        Category::onlyTrashed()->where('asset_category_id', $asset_category_id)->forceDelete();
        return back()->with('success', 'The Category was permanently deleted successfully.');
    }
}
