<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Sale;
use App\Models\Transaction;
use App\Models\User;

class ProductController extends ResultController
{
    public function category () {
      $result = $this->result();
      return view('category.index', compact('result'));
    }

    public function category_create (String $id, String $string) {
      switch ($string) {
        case 'category':
          $result = $this->result();
          return view('category.section.category', compact('result'));
          break;

        case 'sub-category':
          $result = $this->product_category($id);
          return view('category.section.sub_category', compact('result'));
          break;
        
        default:
          return redirect('category')->with('warning', 'Something went wrong. Try again later!');
          break;
      }
    }

    public function category_store (String $string, Request $request) {
      switch ($string) {
        case 'category':
          $category = new Category;
          $category->name = $request->input('name');
          $category->save();
          return redirect('category')->with('success', 'Category created successfully!');
          break;

        case 'sub-category':
          $category_id = $request->input('category_id');
          $category = Category::where('id',$category_id)->get();
          if (count($category) > 0) {
            $sub_category = new SubCategory;
            $sub_category->category_id = $category_id;
            $sub_category->name = $request->input('name');
            $sub_category->save();
            return redirect('category')->with('success', 'Sub - Category created successfully!');
          } else {
            return redirect('category')->with('danger', 'Sub - Category failed to create. Try again!');
          }          
          break;
        
        default:
          return redirect('category')->with('warning', 'Something went wrong. Try again later!');
          break;
      }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $result = $this->result();
      return view('product.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $result = $this->result();      
      return view('product.section.create', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'category_id' => ['required'],
          'picture' => ['required', 'mimes:png,jpg,jpeg,JPG,JPEG,PNG'],
          'name' => ['required'],
          'description' => ['required'],
          'quantity' => ['required'],
          'price' => ['required'],
          'discount' => ['required'],
      ]);

      $create = new Product;
      $create->category_id = $request->input('category_id');
      $create->sub_category_id = 0;
      if ($request->hasfile('picture')) {
        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->storeAs('public/pictures', $fileName);
        $create->picture = $fileName;
      }
      $create->name = $request->input('name');
      $create->description = $request->input('description');
      $create->quantity = $request->input('quantity');
      $create->price = $request->input('price');
      $create->discount = $request->input('discount');
      $create->vat = $request->input('vat');
      $create->status = 0;
      $create->save();
      return redirect('product')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $result = $this->product($id);
      return view('product.section.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $result[] = 'product-edit';
      $result = $this->result();
      $result['product'] = $this->product($id);
      $category_id = $result['product']['category_id'];
      $result['category'] = $this->product_category($category_id);
      $result['sub-category'] = $this->product_sub_category($category_id);
      return view('product.section.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
          'category_id' => ['required'],
          'picture' => ['required', 'mimes:png,jpg,jpeg,JPG,JPEG,PNG'],
          'name' => ['required'],
          'description' => ['required'],
          'quantity' => ['required'],
          'price' => ['required'],
          'discount' => ['required'],
      ]);

      $create = Product::findOrFail($id);
      $create->category_id = $request->input('category_id');
      $create->sub_category_id = $request->input('sub_category_id');
      if ($request->hasfile('picture')) {
        $file = $request->file('picture');
        $extension = $file->getClientOriginalExtension();
        $fileName = time().'.'.$extension;
        $file->storeAs('public/pictures', $fileName);
        $create->picture = $fileName;
      }
      $create->name = $request->input('name');
      $create->description = $request->input('description');
      $create->quantity = $request->input('quantity');
      $create->price = $request->input('price');
      $create->discount = $request->input('discount');
      $create->vat = $request->input('vat');
      $create->status = $request->input('status');
      $create->update();
      return redirect('product')->with('success', 'Product details updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $result = Product::findOrFail($id);
      $result->delete();
      return redirect('product')->with('success', 'Product deleted successfully!');
    }

    public function category_delete (String $id) {
      $result = Category::findOrFail($id);
      $result->delete();

      return redirect('category')->with('success', 'Category deleted successfully!');
    }
}
