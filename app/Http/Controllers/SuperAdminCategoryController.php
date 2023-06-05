<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperAdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view('super-admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super-admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);


        Category::create([
            'name' => $request->name
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);


        return redirect()->route('super-admin-category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('super-admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id
        ]);

        $category->update([
            'name' => $request->name
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')
            ->autoClose(3000);

        return redirect()->route('super-admin-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $isHave = Ticket::where('category_id', $category->id)->exists();

        if ($isHave){
            Alert::alert('Cant Delete', 'This Category is already assigned to another Ticket record.', 'error')
                ->autoClose(3000);
        }else{
            $category->delete();
            Alert::alert('Deleted', 'Deleted Successfully.', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('super-admin-category.index');
    }
}
