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

class ResultController extends Controller
{
  public function welcome () {
    $result[] = 'result';
    $result['category'] = Category::orderBy('id', 'desc')->get();
    $result['sub-category'] = SubCategory::orderBy('id', 'desc')->get();
    $result['product'] = Product::where('status', '1')->orderBy('id', 'desc')->get();
    return $result;
  }
  public function result () {
    $result[] = 'result';
    $result['admin'] = Admin::where('email', Auth::user()->email)->get();
    $result['category'] = Category::orderBy('id', 'desc')->get();
    $result['sub-category'] = SubCategory::orderBy('id', 'desc')->get();
    $result['product'] = Product::orderBy('id', 'desc')->get();
    $result['order'] = Order::orderBy('id', 'desc')->get();
    $result['order-item'] = OrderItem::orderBy('id', 'desc')->get();
    $result['sale'] = Sale::orderBy('id', 'desc')->get();
    $result['transaction'] = Transaction::orderBy('id', 'desc')->get();
    $result['user'] = User::orderBy('id', 'desc')->get();
    return $result;
  }
  public function product_category (String $id) {
    $result = Category::findOrFail($id);
    return $result;
  }
  public function product_sub_category (String $id) {
    $result = SubCategory::where('category_id', $id)->get();
    return $result;
  }
  public function product (String $id) {
    $result = Product::findOrFail($id);
    return $result;
  }
  public function order (String $id) {
    $result = Order::findOrFail($id);
    return $result;
  }
  public function order_item (String $id) {
    $result = OrderItem::where('order_id', $id)->orderBy('id', 'desc')->get();
    return $result;
  }
  public function payment (String $id) {
    $result[] = 'payment';
    $result['order'] = Order::where('order_id', $id)->get();
    $result['order-item'] = OrderItem::where('order_id', $id)->orderBy('created_at', 'desc')->get();
    return $result;
  }
  public function sale (String $id) {
    $result[] = 'sale';
    $result['order-item'] = Sale::where('order_id', $id)->orderBy('created_at', 'desc')->get();
    return $result;
  }
  public function transaction (String $id) {
    $result[] = 'sale';
    $result['transaction'] = Transaction::where('order_id', $id)->orderBy('created_at', 'desc')->get();
    return $result;
  }
}
