<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Imports\ImportProducts;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
      // public function __construct()
      // {
      //       $this->middleware('auth');
      // }

      public function index()
      {
            $products = Product::all();
            return view('products.index', compact('products'));
      }

      public function create()
      {
            return view('products.create');
      }

      public function store(Request $request)
      {
            $product = new Product;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Product created successfully.');
      }

      public function show(Product $product)
      {
            return view('products.show', [
                  'product' => $product,
                  'other_products' => Product::where('category_id', $product->category->id)->take(4)->get(),
            ]);
      }

      public function edit(Product $product)
      {
            return view('products.edit', compact('product'));
      }

      public function update(Request $request, Product $product)
      {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();

            return redirect()->route('products.index')->with('success', 'Product updated successfully.');
      }

      public function destroy(Product $product)
      {
            $product->delete();

            return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
      }

      public function import(Request $request)
      {
            $this->validate($request, [
                  'excel_product' => 'required|mimes:csv,xls,xlsx'
            ]);
            
            Excel::import(new ImportProducts, $request->file('excel_product'));

            if ($request->hasFile('excel_product')) {
                  $proofNameToStore = $request->file('excel_product')->getClientOriginalName();
                  $request->file('excel_product')->storeAs('public/files/imports', $proofNameToStore);
            }
      
            return redirect()->back();
      }
}
