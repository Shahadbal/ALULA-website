<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\activity;
use App\Models\categories;
use App\Models\User;
use App\Models\cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;



class MainController extends Controller
{
    public function sendWelcomeEmail()
{
    // Customize the email for the user and send it
    $user = auth()->user(); // Assuming you are sending it to the authenticated user
    Mail::to($user->email)->send(new WelcomeMail());

    // Optionally, you can check if the email was sent successfully
    if (Mail::failures()) {
        return response()->json(['message' => 'Email could not be sent.'], 500);
    }

    return response()->json(['message' => 'Email sent successfully.']);
}
    //////////////////////////////
    //Sport control panel Controllers
    public function GetSports(){
        $type='sports';
        $data = categories::where('type', $type)->get();
        return view('dashboard.addSports', ['data' => $data, 'type' => $type]);
    }
    public function SaveSport(Request $request){
        
        $data = categories::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'description'=>$request->description,
            'price'=>$request->price,
            'img'=>$request->img
        ]);
        $data->save();
        return redirect('GetSports');
    }
    public function DelSport($x){
        $item = categories::find($x);
        $item->delete();

        return redirect('GetSports');
    }
    public function EditSport($x){
        $item = categories::where('id', $x)->first(); //for edit
        return view('dashboard.editSports',['item'=>$item]);
    }
    public function UpdateSport(Request $request){
        $item = categories::where('id', $request->id)->first(); 
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->img = $request->img;
        $item->save();
    
        return redirect('GetSports');
    }
    //////////////////////////////
    //Adventures control panel Controllers
    public function GetAdventure(){
        $type='adventure';
        $data = categories::where('type', $type)->get();
        return view('dashboard.addAdventure', ['data' => $data, 'type' => $type]);
    }
    public function SaveAdventure(Request $request){
        
        $data = categories::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'description'=>$request->description,
            'price'=>$request->price,
            'img'=>$request->img
        ]);
        $data->save();
        return redirect('GetAdventure');
    }
    public function DelAdventure($x){
        $item = categories::find($x);
        $item->delete();

        return redirect('GetAdventure');
    }
    public function EditAdventure($x){
        $item = categories::where('id', $x)->first(); //for edit
        return view('dashboard.editAdventure',['item'=>$item]);
    }
    public function UpdateAdventure(Request $request){
        $item = categories::where('id', $request->id)->first(); 
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->img = $request->img;
        $item->save();
    
        return redirect('GetAdventure');
    }
    //////////////////////////////
    //Tours control panel Controllers
    public function GetTours(){
        $type='tours';
        $data = categories::where('type', $type)->get();
        return view('dashboard.addTours', ['data' => $data, 'type' => $type]);
    }
    public function SaveTours(Request $request){
        
        $data = categories::create([
            'name'=>$request->name,
            'type'=>$request->type,
            'description'=>$request->description,
            'price'=>$request->price,
            'img'=>$request->img
        ]);
        $data->save();
        return redirect('GetTours');
    }
    public function DelTours($x){
        $item = categories::find($x);
        $item->delete();

        return redirect('GetTours');
    }
    public function EditTours($x){
        $item = categories::where('id', $x)->first(); //for edit
        return view('dashboard.editTours',['item'=>$item]);
    }
    public function UpdateTours(Request $request){
        $item = categories::where('id', $request->id)->first(); 
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->img = $request->img;
        $item->save();
    
        return redirect('GetTours');
    }
    //////////////////////////////////
    public function logout(){
        Auth::logout();
        return view('welcome');
    }
    public function spor(){
        $type='sports';
        $data = categories::where('type', $type)->get();
        return view('sports', ['data' => $data]);
    }
    public function tour(){
        $type='tours';
        $data = categories::where('type', $type)->get();
        return view('tours', ['data' => $data]);
    }
    public function adv(){
        $type='adventure';
        $data = categories::where('type', $type)->get();
        return view('adventure', ['data' => $data]);
    }
    //////////////////////////////////
    public function GetInfo($id){
        $data = categories::where('id', $id )->get();

        return view('book', ['data' => $data]);
    }
    /////////////////////////////////
    public function AddToCart(Request $request){
        
        $data = cart::create([
            'idCategory' => $request->idC,
            'qty' => $request->qty,
            'date' => $request->date,
            'price' => $request->totalPrice
        ]);
    
        $count = DB::table('carts')->get()->count();
        Session::put('count', $count);

        $category=categories::where('id', $data->idCategory)->get();
        
        return view('book', ['data' => $category]);

    }
    public function checkout(){
        $data = DB::table('categories')
        ->join('carts', 'carts.idCategory', '=', 'categories.id')
        ->select('categories.name as name', 'categories.description as description', 'categories.img as img', 'carts.date as date', 'carts.qty as qty','carts.price as price')
        ->get();
        return view('checkout',['data'=>$data]);
    }
    public function saveOrder(){
        $data = DB::table('categories')
        ->join('carts', 'carts.idCategory', '=', 'categories.id')
        ->select('categories.name as name','categories.id as typeId' ,'categories.description as description', 'categories.img as img', 'carts.date as date', 'carts.qty as qty','carts.price as price')
        ->get();

        $email = auth()->check() ? auth()->user()->email : 'null';

        foreach ($data as $record) {
            $new = activity::create([
                'qty' => $record->qty,
                'date' => $record->date,
                'typeName' => $record->name,
                'typeId' => $record->typeId,
                'email' => $email
            ]);
        }
        $new->save();
        DB::table('carts')->truncate();
        return view('welcome');
    }

    public function GetBills(){
        $data = activity::All();
        return view('bills', ['data' => $data]);
    }
}
