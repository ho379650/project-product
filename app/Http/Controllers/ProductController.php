<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product =Product::all();
        return view('products.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '_name' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            '_price' => 'required',
        ]);
        $product = new Product();
        $product->user_id = Auth ::id();      
        $product->name = $request->_name;
        $product->price = $request->_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect()
                    ->back()
                    ->with('status', 'Ảnh không hợp lệ');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '_' . $name;
            while (file_exists('uploads/image/' . $Hinh)) {
                $Hinh = Str::random(4) . '_' . $name;
            }
            $file->move('uploads/image', $Hinh);
            $product->image = $Hinh;
        } else {
            $truyen->image = '';
        }
        $product->save();
           return back()->with('status', 'Product craeted Successfully');
    }
         

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $product = Product::find($id);
        
        return view('products.show', compact('product'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->_name;
        $product->price = $request->_price;
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $duoi = $file->getClientOriginalExtension();
            if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
                return redirect()
                    ->back()
                    ->with('status', 'Ảnh không hợp lệ');
            }
            $name = $file->getClientOriginalName();
            $Hinh = Str::random(4) . '_' . $name;
            while (file_exists('uploads/image/' . $Hinh)) {
                $Hinh = Str::random(4) . '_' . $name;
            }
            $file->move('uploads/image', $Hinh);
            $product->image = $Hinh;
        } else {
            $truyen->image = '';
        }
        $product->update();
        return back()->with('status', 'Product Updating Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $destination_path = 'uploads/image/'.$product->image;
        if(File::exists($destination_path))
        {
            File::delete($destination_path);
        }
        $product->delete();
        return back()->with('status', 'Product Deleted Successfully');
    }
    public function getSearch(Request $request)
        {
            
            $keyword=  $request->search;
            $product = Product::query()
            ->where('name', 'LIKE', "%{$keyword}%")->get();
             return view('products.search',compact('product'));
        }
}
