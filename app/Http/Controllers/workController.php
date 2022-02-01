<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Product_Category;
use App\Models\Product_Item;
use App\Models\Mail;
use App\Models\Designs;
use App\Models\Delivery_address;
use App\Models\Customer_requirement;
use App\Models\Customer_product;
use App\Models\Customer;
use WithPagination;
use Illuminate\Http\Request;

class workController extends Controller
{
    public function index()
    {
        return view('index')->with([
            'product'=>Product_Item::all(),
            'category'=>Product_Category::all(),
        ]);
    }
    
    public function admin()
    {
        if(session()->has('login3')){
        $customer = Customer::where('id',session()->get('login3'))->first();
        }   
        if(session()->has('login')){
            return view('user.dashboard');
        }elseif(session()->has('login3') && $customer->status !== "accepted"){
            return view('customer.designs')->with([
                'design'=>Designs::all(),
            ]);
        }elseif(session()->has('login3') && $customer->status == "accepted"){
            return view('customer.dashboard')->with([
                'design'=>Designs::all(),
                'customer400'=>$customer->status,
            ]);
        }else{
            return view('login');
        }
    }

    public function customer_requirement($id)
    {
        return view('customer.add_customer_requirement')->with([
            'design'=>Designs::findorfail($id)->first(),
        ]);
    }
    public function login()
    {
        $customer = Customer::where('name',request()->user_name)->first();
        if(request()->user_name == "12345" && request()->password == "12345"){
            session()->put('login','done');
            return redirect()->route('admin');
        }elseif($customer->password == request()->password){
            session()->put('login3',$customer->id);
            return redirect()->route('admin');
        }
    }
    public function logout()
    {
        if(session()->has('login')){
            session()->forget('login');
            return redirect()->route('admin');
        }elseif(session()->has('login3')){
            session()->forget('login3');
            return redirect()->route('admin');
        }else{
            return redirect()->route('admin');
        }
    }





     
    public function add_product()
    {
          if(session()->has('login')){
        return view('user.add_product')->with([
            'category'=>Product_Category::all(),
        ]);
    }else{
        return redirect()->route('admin');
    }
    }
    public function save_product()
    {
        $product = new Product_Item();
        $image = request()->file('image');
        $file = time() . $image->getClientOriginalName();
        $product->title = request()->title;
        $product->image = "product_image/".$file;
        $product->client = request()->client;
        $product->description = request()->description;
        $product->category_name = Product_Category::where('id',request()->category_id)->first()->name;
        $product->category_id = request()->category_id;
        $product->save();

        $image->move('product_image',$file);
        session()->flash('done2','Sucessfully Inserted');
        return view('user.add_product')->with([
            'category'=>Product_Category::all(),
        ]);
    }

    public function add_category()
    {
          if(session()->has('login')){
        return view('user.add_product_category');
        }else{
        return redirect()->route('admin');
    }
    }
    public function save_category()
    {
        $category = new Product_Category();
        $image = request()->file('image');
        $file = time() . $image->getClientOriginalName();
        $category->name = request()->name;
        $category->image = 'category_image/'.$file;
        $category->description = request()->description;
        $category->save();

        $image->move('category_image',$file);
        session()->flash('done','Sucessfully Inserted');
        return view('user.add_product_category');
    }

    public function product()
    {
          if(session()->has('login')){
        return view('user.product')->with([
            'product'=> Product_Item::simplepaginate(10),
        ]);
        }else{
        return redirect()->route('admin');
    }
    }

    public function delete_product($id)
    {
        Product_Item::findorfail($id)->delete();
        session()->flash('done','Successfully Deleted');
        return redirect()->route('product');
    }

    public function edit_product($id)
    {
          if(session()->has('login')){
        return view('user.edit_product')->with([
            'product'=> Product_Item::where('id',$id)->first(),
            'category'=>Product_Category::all(),
        ]);
        }else{
        return redirect()->route('admin');
    }
    }

        public function update_product($id){
        $product = Product_Item::where('id',$id)->first();


        if(request()->image == ""){
        $image = Product_Item::where('id',$id)->first()->image;
        $product->title = request()->title;
        $product->image = $image;
        $product->client = request()->client;
        $product->description = request()->description;
        $product->category_name = Product_Category::where('id',request()->category_id)->first()->name;
        $product->category_id = request()->category_id;
        $product->update();
        }else{
        $image = request()->file('image');
        $file = time() . $image->getClientOriginalName();
        $product->title = request()->title;
        $product->client = request()->client;
        $product->image = "product_image/".$file;
        $product->description = request()->description;
        $product->category_name = Product_Category::where('id',request()->category_id)->first()->name;
        $product->category_id = request()->category_id;
        $product->update();
        $image->move('product_image',$file);
        }
        

        session()->flash('done','Successfully Updated');
        return redirect()->route('product');
        }

        public function category()
    {
          if(session()->has('login')){
        return view('user.category')->with([
            'category'=> Product_Category::simplepaginate(10),
        ]);
        }else{
        return redirect()->route('admin');
    }
    }

    public function delete_category($id)
    {
        Product_Category::findorfail($id)->delete();
        Product_Item::findorfail($id)->delete();
        session()->flash('done','Successfully Deleted');
        return redirect()->route('category');
    }


    public function edit_category($id)
    {
          if(session()->has('login')){
        return view('user.edit_category_product')->with([
            'category'=>Product_Category::where('id',$id)->first(),
        ]);
        }else{
        return redirect()->route('admin');
    }
    }

        public function update_category($id){
        $category = Product_Category::where('id',$id)->first();
        $product = Product_Item::where('category_id',$id)->get();
        foreach($product as $products){
        $products->category_name = request()->name;
        $products->update();
        }


        if(request()->image == ""){
        $image = Product_Category::where('id',$id)->first()->image;
        $category->name = request()->name;
        $category->image = $image;
        $category->description = request()->description;
        $category->update();
        }else{
        $image = request()->file('image');
        $file = time() . $image->getClientOriginalName();
        $category->name = request()->name;
        $category->image = "category_image/".$file;
        $category->description = request()->description;
        $category->update();
        $image->move('category_image',$file);
        }
        

        session()->flash('done','Successfully Updated');
        return redirect()->route('category');
        }


        public function add_designs()
        {
            return view('user.add_designs');
        }
        
        public function save_designs()
        {
            $image = request()->file('image');
            $file = time() . $image->getClientOriginalName();
            Designs::create(
                [
                    'name'=>request()->name,
                    'image'=> "product_designs/".$file,
                    'description'=> request()->description
                ]
            );
            $image->move('product_designs',$file);
            session()->flash('done','You Have Successfully Added');
            return redirect()->route('add_designs');
        }
        
        public function delete_designs($id)
        {
            Designs::findorfail($id)->delete();
            session()->flash('done','It is Successfully Deleted');
            return redirect()->route('designs');
        }

        public function designs()
        {
            return view('user.designs')->with([
                'design'=>Designs::simplepaginate(),
            ]);
        }

        public function add_customer()
        {
            return view('user.add_customer');
        }

        public function save_customer()
        {
            Customer::create(request()->all());
            session()->flash('done','You Have Successfully Added');
            return redirect()->route('add_customer');
        }

        public function delete_customer($id)
        {
            Customer::findorfail($id)->delete();
            session()->flash('done','It is Successfully Deleted');
            return redirect()->route('customer');
        }

        public function show_customer()
        {
            return view('user.customer')->with([
                'customer'=>Customer::simplepaginate(5),
            ]);
        }

        public function customer_product2($id)
        {
            return view('user.customer_product')->with([
                'customer_product' => Customer_product::where('customer_id',$id)->get(),
            ]);
        }


        public function save_customer_requirement($id)
        {
            customer_requirement::create(
                [
                    'title'=>request()->title,
                    'design'=>request()->design,
                    'description'=>request()->description,
                    'status'=>'send',
                    'customer_id'=>session()->get('login3'),
                ]
            );
            session()->flash('done','Message Succssfully send.');
            return redirect()->route('customer_requirement',['id'=>$id]);
        }



        public function show_customer_requirement()
        {
            return view('user.customer_requirement')->with([
                'customer_requirement'=>customer_requirement::simplepaginate(5),
            ]);
        }

        public function delete_customer_requirement($id)
        {
            Customer_requirement::findorfail($id)->delete();
            session()->flash('done','Successfully Deleted.');
            return redirect()->route('show_customer_requirement');
        }

        public function delete_customer_product($id)
        {
            Customer_product::findorfail($id)->delete();
            session()->flash('done','Successfully Deleted.');
            return redirect()->route('customer_product');
        }

        public function status_customer_requirement($id)
        {
            $customer_Requirement = customer_requirement::where('id',$id)->first();
            $customer = Customer::where('id',$customer_Requirement->customer_id)->update([
                'design'=>$customer_Requirement->design,
                'status'=>'accepted',
            ]);
            Customer_requirement::findorfail($id)->delete();
            
            session()->flash('done','Successfully Accepted.');
            return redirect()->route('show_customer_requirement');
        }

        public function add_customer_product()
        {
            return view('customer.add_customer_product')->with([
                'delivery'=>Delivery_address::all(),
            ]);
        }

        public function save_customer_product()
        {
            $image = request()->file('image');
            $file = time().$image->getClientOriginalName();
            $delivery = Delivery_address::findorfail(request()->delivery_address)->first();
            Customer_product::create([
                'name'=>request()->name,
                'image'=>"customer_product/".$file,
                'mobile'=>request()->mobile,
                'email'=>request()->email,
                'address'=>request()->address,
                'deliverey_id'=>$delivery->id,
                'customer_id'=>session()->get('login3'),
            ]);
            $image->move('customer_product',$file);
            session()->flash('done','Successfully Addess');
            return redirect()->route('add_customer_product');
        }

        public function customer_product()
        {
            return view('customer.customer_product')->with([
                'customer_product'=>Customer_product::all(),
            ]);
        }

        public function add_delivery()
        {
            return view('customer.add_delivery');
        }

        public function save_delivery()
        {
            Delivery_address::create([
                'delivery_address'=>request()->delivery_address,
                'customer_id'=>session()->get('login3'),
            ]);
            session()->flash('done','Successfully Added');
            return redirect()->route('add_delivery');
        }

        public function delivery()
        {
            return view('customer.delivery')->with([
                'delivery'=>Delivery_address::all(),
            ]);
        }

        public function delete_delivery($id)
        {
            Delivery_address::findorfail($id)->delete();
            session()->flash('done','Successfully Deleted');
            return redirect()->route('delivery');
        }

        public function edit_delivery($id)
        {
            return view('customer.edit_delivery')->with([
                'delivery'=>Delivery_address::findorfail($id)->first(),
            ]);
        }

        public function update_delivery($id)
        {
            Delivery_address::findorfail($id)->update([
                'delivery_address'=>request()->delivery_address,
            ]);
            session()->flash('done','Successfully Addess');
            return redirect()->route('delivery');
        }









        public function show_category($id)
        {


            return view('show_category')->with([
                'category'=>Product_Category::all(),

                'only_category'=>Product_Category::findOrfail($id)->first(),
                'product'=>Product_Item::where('category_id',$id)->get(),
            ]);

        }

        public function show_product($id)
        {
            return view('show_product')->with([
                'category'=>Product_Category::all(),
                'product'=>Product_Item::where('id',$id)->first(),
            ]);
        }

        public function about()
        {
            return view('about')->with([
            'product'=>Product_Item::all(),
            'category'=>Product_Category::all(),
        ]);
        }

        public function contact()
        {
        return view('contact')->with([
            'product'=>Product_Item::all(),
            'category'=>Product_Category::all(),
        ]);
        }

        public function mail()
        {
            Mail::create(request()->all());
 
            session()->flash('done3','Successfully Send');
            return redirect()->route('contact');
        }

        public function show_mail()
        {
            return view('user.mail')->with([
            'mail'=>Mail::simplepaginate(5),
        ]);           
        }

        public function delete_mail($id)
        {
            Mail::findorfail($id)->delete();
            session()->flash('done3','');
            return redirect()->route('show_mail');
        }


}