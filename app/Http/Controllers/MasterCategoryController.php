<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class MasterCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::user()->hasPermissionTo('manage-category')) {
                abort(403, 'Unauthorized action.');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $categories = Category::all();
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);


        return view('master.category.index', compact('categories'));
    }

    public function create()
    {
        return view('master.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories'
        ]);

        $category = Category::create([
            'name' => $request->name
        ]);

        if ($category){
            Alert::alert('Success', 'Created Successfully!', 'success')->autoClose(3000);
        }


        return redirect()->route('master-category.index');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('master.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id
        ]);

        $category->update([
            'name' => $request->name
        ]);

        Alert::alert('Success', 'Created Successfully!', 'success')->autoClose(3000);


        return redirect()->route('master-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $isHave = Ticket::where('category_id', $category->id)->exists();

        if ($isHave){
            Alert::alert('Cant Delete', 'This Category is already assigned to another Ticket record.', 'error')
                ->autoClose(3000);
        }else{
            $category->delete();
            Alert::alert('Deleted', 'Deleted Successfully.', 'success')
                ->autoClose(3000);
        }

        return redirect()->route('master-category.index');
    }
}
