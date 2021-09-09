<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->when(request()->q, function($products) {
            $products = $products->where('title', 'like', '%'. request()->q . '%');
        })->paginate(10);

        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'title' => 'required|unique:products',
            'category_id' => 'required',
            'content' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'discount' => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        $product = Product::created([
            'image' => $image->hashName(),
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'),
            'category_id' => $request->category_id,
            'content' => $request->content,
            'unit' => $request->unit,
            'weight' => $request->weight,
            'price' => $request->price,
            'discount' => $request->discount,            
        ]);

        if($product) {
            return redirect()->route('admin.product.index')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('admin.product.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit(Product $product)
    {
        $categories = Category::latest()->get();
        return view('admin.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => 'required|unique:products,title,'.$product->id,
            'category_id' => 'required',
            'content' => 'required',
            'weight' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);

        if($request->file('image') == '') {

            $product = Product::findOrFail($product->id);
            $product->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'category_id' => $request->category_id,
                'content' => $request->content,
                'unit' => $request->unit,
                'weight' => $request->weight,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);

        } else {
            Storage::disk('local')->delete('public/products/'.$product->image);
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            $product = Product::findOrFail($product->id);
            $product->update([
                'image' => $image->hashName(),
                'title' => $request->title,
                'slug' => Str::slug($request->title, '-'),
                'category_id' => $request->category_id,
                'content' => $request->content,
                'unit' => $request->unit,
                'weight' => $request->weight,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        }

        if($product) {
            return redirect()->route('admin.product.index')->with(['success' => 'Data berhasil di update!']);
        } else {
            return redirect()->route('admin.product.index')->with(['error' => 'Data gagal diupdate!' ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $image = Storage::disk('local')->delete('public/products/'.$product->image);
        $product->delete();

        if($product) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }       
    }
}
