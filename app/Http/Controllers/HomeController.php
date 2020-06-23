<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Products;
use App\Packages;
use App\PackageDetail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->is_admin()){
            return redirect('admin/orders');
        }
        else if($user->is_client()){
            return redirect('client/dashboard');
        }
        else if($user->is_user()){
            return redirect('user/order-list');
        }
    }
    public function orders(){
        return view('admin.orders');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function product(){
        $products = Products::all();
        return view('admin.product', compact('products'));
    }

    public function package(){
        $product_list = [];
        $packages = Packages::all();
        foreach ($packages as $package){
            $package_list[] = $package->id;
            $product_list[] = Packages::find($package->id)->products;
        }
//        $no = 0;
//        foreach ($packages as $package){
////            echo $package->id."<br>";
//            for ($i=0;$i<count($product_list[$no]);$i++){
//                echo $product_list[$no][$i]->product_name."<br>";
//            }
//            $no++;
//        }
//        dd($product_list);
        return view('admin.package', compact('packages', 'product_list'));
    }
//    client CRUD
    public function clients(){
        $clients = User::where('role','client')->get();
        return view('admin.clients', compact('clients'));
    }
    public function newClient(){
        return view('admin.add-newclient');
    }
    public function addClient(Request $request){

        if ($request->hasFile('profile')){
            $profile_img = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('avatar'), $profile_img);
        }
        $client = new User();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->avatar = $request->file('profile')->getClientOriginalName();
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->note = $request->input('note');
        $client->role = 'client';

        $client->save();
        return redirect('admin/users/clients');
    }
    public function updateGet($id){
        $client = User::where('id', $id)->get();

        return view('admin.update-client', compact('client'));
    }
    public function updateClient(Request $request,$id){
        $profile='default.png';
        if ($request->hasFile('profile')){
            $profile_img = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('avatar'), $profile_img);
            $profile = $profile_img;
        }
        $formData = array(
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'avatar' => $profile,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'note' => $request->input('note')
        );
        User::where('id',$id)->update($formData);
        return back();
    }
    public function deleteClient($id){
        User::whereId($id)->delete();
        return redirect()->route('clients');
    }
//    end client
// delivery man
    public function deliveryMan(){
        $deliverys = User::where('role', 'user')->get();
        return view('admin.delivery', compact('deliverys'));
    }
    public function newDeliveryMan(){
        return view('admin.add-newdelivery');
    }
    public function addDeliveryMan(Request $request){
        if ($request->hasFile('profile')){
            $profile_img = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('avatar'), $profile_img);
        }
        $client = new User();
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->avatar = $request->file('profile')->getClientOriginalName();
        $client->address = $request->input('address');
        $client->phone = $request->input('phone');
        $client->status = $request->input('status');
        $client->note = $request->input('note');
        $client->role = 'user';

        $client->save();
        return redirect('admin/users/delivery-man');
    }
    public function getDelivery($id){
        $delivery = User::where('id', $id)->get();
        return view('admin.delivery-update', compact('delivery'));
    }
    public function updateDelivery(Request $request, $id){
        $profile='default.png';
        if ($request->hasFile('profile')){
            $profile_img = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('avatar'), $profile_img);
            $profile = $profile_img;
        }
        $formData = array(
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'avatar' => $profile,
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status'),
            'note' => $request->input('note')
        );
        User::where('id',$id)->update($formData);
        return redirect()->route('delivery');
    }
    public function deleteDelivery($id){
        User::whereId($id)->delete();
        return redirect()->route('delivery');
    }
//    end delivery man
    public function places(){
        return view('admin.places');
    }
    public function areas(){
        return view('admin.areas');
    }
//    client part
    public function cDashboard(){
        return view('client.dashboard');
    }
    public function cCatalog(){
        return view('client.catalog');
    }
    public function cPlaces(){
        return view('client.places');
    }
    public function orderHistory(){
        return view('client.order-history');
    }
    public function cProfile(){
        return view('client.profile');
    }
//    delivery user
    public function orderList(){
        return view('user.order-list');
    }
}
