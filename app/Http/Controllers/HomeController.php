<?php

namespace App\Http\Controllers;

use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\User;
use App\Products;
use App\Packages;
use App\PackageDetail;
use App\Business;
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
        $areas = Area::all();
        return view('admin.areas', compact('areas'));
    }
//    client part
    public function cDashboard(){
        $businesses = Business::where('client_id', Auth::user()->id)->get();
        return view('client.dashboard', compact('businesses'));
    }
    public function cCatalog(){
        $products = Products::all();
        return view('client.catalog', compact('products'));
    }
//    cplace part
    public function cPlaces(){
        $businesses = Business::where('client_id',Auth::user()->id)->get();
        return view('client.places', compact('businesses'));
    }
    public function addPlace(){
        return view('client.add-place');
    }

    /**
     * @param Request $request
     */

    public function storePlace(Request $request){

        $client_id = Auth::user()->id;
        $address = $request->input('address');
        $city = $request->input('city');
        $floor = $request->input('floor');
        $number = $request->input('number');
        $contact_number = $request->input('contact_number');
        $code = $request->input('code');
        $note = $request->input('note');

        $business = new Business();
        $business->address = $address;
        $business->city = $city;
        $business->floor = $floor;
        $business->house_cnt = $number;
        $business->note = $note;
        $business->code = $code;
        if ($request->input('apartment')){
            $business->kind = 0;
        }else{
            $business->kind = 1;
        }

        $business->contact = $contact_number;
        $business->client_id = $client_id;
        $business->save();
        return redirect()->route('client-places');
    }
    public function getPlace($id){
        $place = Business::where('id', $id)->get();
        return view('client.update-place', compact('place'));
    }
    public function updatePlace(Request $request, $id){
        $address = $request->input('address');
        $city = $request->input('city');
        $floor = $request->input('floor');
        $number = $request->input('number');
        $contact_number = $request->input('contact_number');
        $code = $request->input('code');
        $note = $request->input('note');
        if ($request->input('apartment')){
            $kind = 0;
        }else{
            $kind = 1;
        }
        Business::where('id', $id)->update(['address'=>$address, 'city'=>$city, 'floor'=>$floor, 'house_cnt'=>$number,
            'note'=>$note, 'code'=>$code, 'kind'=>$kind, 'contact'=>$contact_number]);
        return redirect()->route('client-places');

    }
    public function placeDestroy($id){
        Business::where('id', $id)->delete();
        return redirect()->route('client-places');
    }
    //    end cplace part
    public function orderHistory(){
        return view('client.order-history');
    }
    public function cProfile(){
        return view('client.profile');
    }
    public function updateProfile(Request $request, $id){
        $profile_img = 'default.png';
        if ($request->hasFile('profile')){
            $profile_img = $request->file('profile')->getClientOriginalName();
            $request->file('profile')->move(public_path('avatar'), $profile_img);
        }
        $name = $request->input('name');
        $email = $request->input('email');
        $avatar = $profile_img;
        $address = $request->input('address');
        $phone = $request->input('phone');
        User::whereId($id)->update(['name'=>$name, 'email'=>$email, 'avatar'=>$avatar, 'address'=>$address
                 ,'phone'=>$phone]);
        return back();
    }
//    delivery user
    public function orderList(){
        return view('user.order-list');
    }
}
