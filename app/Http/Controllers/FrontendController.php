<?php
namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class FrontendController extends Controller {
    public function home() {
        $categories = Category::with('products')->get();
        return view('frontend.home', compact('categories'));
    }

    public function product($id) {
        $product = Product::findOrFail($id);
        return view('frontend.products.show', compact('product'));
    }

    public function addToCart($id) {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function cart() {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }

    public function placeOrder(Request $request) {
        $cart = session()->get('cart', []);
        foreach($cart as $id => $item) {
            Order::create([
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'status' => 'Pending'
            ]);
        }
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
