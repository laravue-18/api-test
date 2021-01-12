<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\User;
use App\Seller;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    function addClient(Request $request){
        $param = $request->except(['_token', 'endpoint']);
        $endpoint = $request->get('endpoint');
        $password = $request->get('password');
        $param = array_filter($param,'strlen');

        $response = Http::post($endpoint.'/api/addClient', $param);

        if($response->json()['success']){
            $data = $response->json()['data'];
            $user = User::create([
                'email' => $data['email_id'],
                'api_token' => $data['api_token'],
                'password' => Hash::make($password),
                'url' => $endpoint
            ]);
            Auth::login($user);
        }
        $response = $response->json();
        return response()->json($response);
    }

    function addSeller(Request $request){
        $param = $request->except('_token');
        $url = auth()->user()->url;
        $param = array_filter($param,'strlen');

        $response = Http::withToken(auth()->user()->api_token)->post($url, $param);

        if($response->json()['success']){
            $data = $response->json()['data'];
            $data['user_id'] = auth()->id();
            $seller = Seller::create($data);
        }
        $response = $response->json();
        return response()->json($response);
    }
    
    function addSellerDeal(Request $request){
        $param = $request->except('_token', 'seller_id');
        $url = auth()->user()->url;
        $token = auth()->user()->api_token;
        $seller = Seller::find($request->get('seller_id'));
        $param['seller_email'] = $seller->email_id;
        $param['seller_phone'] = $seller->contact_number;
        $param['seller_currency'] = $seller->currency;
        $param['seller_first_name'] = $seller->first_name;
        $param = array_filter($param,'strlen');

        $response = Http::withToken($token)->post($url.'/api/addSellerDeal', $param);

        $response = $response->json();
        if($response['success']){
            $data = $response['data'];
            $data['seller_id'] = Seller::firstWhere('email_id', $data['seller_email'])->id;
            $product = Product::create($data);
        }
        return response()->json($response);
    }

    public function getProducts(Request $request){
        $seller = Seller::find($request->get('seller_id'));
        $products = $seller->products;
        return response()->json($products);
    }

    public function addSellerLeaseParameters(Request $request){
        $url = auth()->user()->url;
        $token = auth()->user()->api_token;
        $seller = Seller::find($request->get('seller_id'));
        $product = Product::find($request->get('product_id'));
        $param = $request->except('_token', 'seller_id', 'product_id');
        $param['seller_email'] = $seller->email_id;
        $param['seller_phone'] = $seller->contact_number;
        $param['upc_product_code'] = $product->upc_product_code;
        $param['seller_negotiation_mode'] = $product->seller_negotiation_mode;
        $param['seller_orignal_quantity'] = $product->seller_orignal_quantity;
        $param = array_filter($param,'strlen');
        
        $response = Http::withToken($token)->post($url.'/api/seller-lease-parameters/store', $param);

        $response = $response->json();
        
        return response()->json($response);
    }
    
    public function discount(Request $request){
        $url = auth()->user()->url;
        $token = auth()->user()->api_token;
        $seller = Seller::find($request->get('seller_id'));
        $product = Product::find($request->get('product_id'));
        $param = $request->except('_token', 'seller_id', 'product_id');
        $param['seller_email'] = $seller->email_id;
        $param['upc_product_code'] = $product->upc_product_code;
        $param = array_filter($param,'strlen');
        
        $response = Http::withToken($token)->post($url.'/api/product/discount', $param);

        $response = $response->json();
        
        return response()->json($response);
    }
    
    public function addDealNegotiationParameters(Request $request){
        $url = auth()->user()->url;
        $token = auth()->user()->api_token;
        $seller = Seller::find($request->get('seller_id'));
        $product = Product::find($request->get('product_id'));
        $param = $request->except('_token', 'seller_id', 'product_id');
        $param['seller_email'] = $seller->email_id;
        $param['upc_product_code'] = $product->upc_product_code;
        $param = array_filter($param,'strlen');
        
        $response = Http::withToken($token)->post($url.'/api/addDealNegotiationParameters', $param);

        $response = $response->json();
        
        return response()->json($response);
    }

    public function loan(Request $request){
        $url = auth()->user()->url;
        $token = auth()->user()->api_token;
        $seller = Seller::find($request->get('seller_id'));
        $product = Product::find($request->get('product_id'));
        $param = $request->except('_token', 'seller_id', 'product_id');
        $param['seller_email'] = $seller->email_id;
        $param['seller_phone'] = $seller->contact_number;
        $param['upc_product_code'] = $product->upc_product_code;
        $param['seller_negotiation_mode'] = $product->seller_negotiation_mode;
        $param['seller_orignal_quantity'] = $product->seller_orignal_quantity;
        $param = array_filter($param,'strlen');
        
        $response = Http::withToken($token)->post($url.'/api/seller-finance-parameters/store', $param);

        $response = $response->json();
        
        return response()->json($response);
    }

    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)){
            return redirect('addSeller');
        }else{
            return redirect()->back()->with('flash_message_error', 'Invalid Username and Password!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }


}
