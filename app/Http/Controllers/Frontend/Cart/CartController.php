<?php

namespace App\Http\Controllers\Frontend\Cart;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use App\Model\frontend\shipping;
use App\Model\frontend\order;
use App\Model\frontend\Order_detail;
use DB;
use Cart;
use Session;

class CartController extends Controller
{
    //
    public function AddCart(Request $request,$id)
    {
        $product=DB::table('products')->where('id',$id)->first();
       // return Product::find($request->id);
       $data=array();
       $data['id']=$product->id;
       $data['name']=$product->product_name;
       $data['qty']=$request->product_quantity;
       $data['price']=$product->price;
       $data['weight']=1;
       $data['options']['image']=$product->product_image;
      //return response()->json($data);
      Cart::add($data);
      return back();
    }
    public function showcart()
    {
        $content=Cart::content();
        return view('frontend.cart.show_cart_product',compact('content'));

    }
    public function Cartshipping()
    {
        return view('frontend.cart.cart_shipping');
    }
    public function shippingUser(Request $request)
    {
        $user=new shipping();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->address=$request->address;
        $user->save();
        Session::put(['shipping_id'=>$user->id]);
        if ($user) {
            echo "success";
            $notification = array(
              'message' => 'Category inserted successfully!',
              'alert-type' => 'success'
          );

        }else {
            echo "error";
            $notification = array(
              'message' => 'Error! Data not inserted !',
              'alert-type' => 'error'
          );

        }

        return redirect('/checkout/payment')->with($notification);
    }
    public function shippingPayment()
    {
        return view('frontend.payment.payment');
    }

    public function ConfirmOrder(Request $request)
    {
        if($request->payment_type=="cash")
        {
            $order=new Order();
            $order->user_id= Auth::user()->id;
            $order->shipping_id=Session::get('shipping_id');
            $order->total_price=Session::get('total');
            $order->payment_type=$request->payment_type;
            //return response()->json($order);
            $order->save();
         
            $cartcontent=Cart::content();
            //return response()->json($cartcontent);
            foreach( $cartcontent as $row)
            {
                $order_details=new Order_detail();
                $order_details->order_id=$order->id;
                $order_details->product_id=$row->id;
                $order_details->product_name=$row->name;
                $order_details->product_image=$row->options->image;
                $order_details->product_price=$row->price;
                $order_details->product_quantity=$row->qty;
               // return response()->json($order_details);
                $order_details->save();

            }
            Cart::destroy();
            return redirect('/welcome');
        }
        elseif($request->payment_type=="paypal")
        {

        }
        else
        {

        }
        
       
    }

    
}
