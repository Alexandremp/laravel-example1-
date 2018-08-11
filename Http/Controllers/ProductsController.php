<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image;


class ProductsController extends Controller
{

    public function addProduct(Request $request)
    {

        if($request->isMethod('post')){

            $data = $request->all();
           // echo "<pre>"; print_r($data);die;
            if(empty($data['category_id'])){
                return redirect()->back()->with('flash_message_error','Under Category missing!');
            }
           // echo "<pre>"; print_r($data);die;
            $product = new Product;
            $product->categoty_id = $data['category_id'];
            $product->product_name = $data['product_name'];
            $product->product_code = $data['product_code'];
            $product->product_color = $data['product_color'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->image = $data['image'];
   /*         if($request->hasFile('image')){
                $image_tmp = Input::file('image');
                if($image_tmp->isValid()){

                    $extension = $image_tmp->getClientOriginalExtension();
                    $filename = rand(111,99999).'.'.$extension;
                    $large_image_path='images/backend_images/products/large'.$filename;
                    $medium_image_path='images/backend_images/products/medium'.$filename;
                    $small_image_path='images/backend_images/products/small'.$filename;

                    //Resize Images

                    Image::make($image_tmp)->save($large_image_path);
                    Image::make($image_tmp)->resize(600,600)->save($medium_image_path);
                    Image::make($image_tmp)->resize(300,300)->save($small_image_path);

                    //store image in products table
                    $product->image=$filename;

                }
                echo $image_tmp = Input::file('image');die;
            }*/
            $product->save();

            return redirect()->back()->with('flash_message_success','Product has been added successfully!');
        }


        /**categories dropdown starts*/

        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat){
            $categories_dropdown .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat){
                $categories_dropdown .= "<option value = '".$sub_cat->id."'>--&nbsp;"
                    .$sub_cat->name."</options>";
            }
        }

        /**categories dropdown ends*/

        return view('admin.products.add-product')->with(compact('categories_dropdown'));

    }
    public  function viewProducts(){
        $products = Product::get();

       /* foreach($products as $key =>$val){
            $category_name = Category::where(['id'=>$val->category_id])->first();
            $products[$key]->category_name=$category_name->name;
        }*/
        // echo "<pre>"; print_r($data);die;
        return view('admin.products.view-product')->with(compact('products'));

    }

    public function editProduct(Request $request, $id =null){
        if($request->isMethod('post')) {
            $data = $request->all();
            Product::where(['id' => $id])->update([
                'categoty_id' => $data['category_id'],
                'product_name' => $data['product_name'],
                'product_code'=> $data['product_code'],
                'product_color'=> $data['product_color'],
                'description' => $data['description'],
                'price'=>$data['price'],
                'image' => $data['image']
            ]);
            return redirect('/admin/view-product')->with('flash_message_success', 'Product was edited successfully!');
        }
        $productDetails = Product::where(['id'=>$id])->first();

        /**categories dropdown starts*/
        $categories = Category::where(['parent_id'=>0])->get();
        $categories_dropdown = "<option value='' selected disabled>Select</option>";
        foreach ($categories as $cat){
            if($cat->id==$productDetails->categories_id) {
                $selected= "selected";
            }else{
                $selected="";
            }
            $categories_dropdown .= "<option value='".$cat->id."'".$selected.">".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach ($sub_categories as $sub_cat){
                if($sub_cat->id==$productDetails->categories_id) {
                    $selected= "selected";
                }else{
                    $selected="";
                }
                $categories_dropdown .= "<option value = '".$sub_cat->id."' ".$selected.">--&nbsp;"
                    .$sub_cat->name."</options>";
            }
        }

        /**categories dropdown ends*/




        return view('admin.products.edit-product')->with(compact('productDetails','categories_dropdown'));


    }

    public function deleteProduct(Request $request, $id=null){
        if(!empty($id)){
            /** @noinspection PhpUnhandledExceptionInspection */
            Product::where(['id' => $id])->delete();
            return redirect()->back()->with('flash_message_success', 'Product was deleted successfully!');



        }
    }
}
