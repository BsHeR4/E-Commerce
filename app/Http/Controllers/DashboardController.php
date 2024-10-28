<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() 
    {

        return view('admin.dashboard.dashboard',[
            'ordersCount' =>$this->getOrdersCount(),
            'usersCount' =>$this->getUsersCount(),
            'adminsCount' =>$this->getAdminsCount(),
            'productsCount' =>$this->getProductsCount(),
            'latestOrders' =>$this->getLatestOrders(),
            'latestUsers' =>$this->getLatestUsers(),
            'latestProducts' =>$this->getLatestProducts(),
        ]);
    }


    
    public function getOrdersCount()
    {
        $orders = Order::count();
        return $orders;
    }

    public function getUsersCount()
    {
        $users = User::where('is_admin','0')->count();
        return $users;
    }

    public function getAdminsCount()
    {
        $admins = User::where('is_admin','1')->count();
        return $admins;
    }
    public function getProductsCount()
    {
        $products = Product::count();
        return $products;
    }


    public function getLatestOrders()
    {
        $latestOrders = Order::latest()->take(10)->get();
        return $latestOrders;
    }

    public function getLatestUsers()
    {
        $latestUsers = User::latest()->take(8)->get();
        return $latestUsers;
    }

    public function getLatestProducts()
    {
        $latestProducts = Product::latest()->take(5)->get();
        return $latestProducts;
    }


}
