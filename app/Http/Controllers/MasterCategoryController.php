<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MasterCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.category.index', compact('categories'));
        }else if ($role == "Administrator"){
            return view('administrator.category.index', compact('categories'));
        }else if ($role == "Developer"){
            return view('developer.category.index', compact('categories'));
        }else if ($role == "Licenser"){
            return view('licenser.category.index', compact('categories'));
        }else if ($role == "Support"){
            return view('support.category.index', compact('categories'));
        }
    }

    public function create()
    {
        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.category.create');
        }else if ($role == "Administrator"){
            return view('administrator.category.create');
        }else if ($role == "Developer"){
            return view('developer.category.create');
        }else if ($role == "Licenser"){
            return view('licenser.category.create');
        }else if ($role == "Support"){
            return view('support.category.create');
        }

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



        $role = getRole();

        if ($role == "Super Admin"){
            return view('super-admin.category.edit', compact('category'));
        }else if ($role == "Administrator"){
            return view('administrator.category.edit', compact('category'));
        }else if ($role == "Developer"){
            return view('developer.category.edit', compact('category'));
        }else if ($role == "Licenser"){
            return view('licenser.category.edit', compact('category'));
        }else if ($role == "Support"){
            return view('support.category.edit', compact('category'));
        }

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
