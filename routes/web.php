<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/home','adminController@index');
// Authentication
Auth::routes();

Route::get('/welcome', 'HomeController@index')->name('home');
// Admin Section
//category
Route::get('admin/categories','admin\category\CategoryController@category')->name('categorie');
Route::post('admin/store/category','admin\category\CategoryController@Storecategory')->name('store.category');
Route::get('delete/category/{id}','admin\category\CategoryController@Deletecategory');
Route::get('edit/category/{id}','admin\category\CategoryController@Editcategory');
Route::post('update/category/{id}','admin\category\CategoryController@Updatecategory');
//brand
Route::get('admin/brands','admin\brand\BrandController@brand')->name('brands');
Route::post('admin/store/brand','admin\brand\BrandController@Storebrand')->name('store.brand');
Route::get('delete/brand/{id}','admin\brand\BrandController@Deletebrand');
Route::get('edit/brand/{id}','admin\brand\BrandController@Editbrand');
Route::post('update/brand/{id}','admin\brand\BrandController@Updatebrand');

//subcategories
Route::get('admin/subcategories','admin\Subcategory\SubcategoryController@category');
Route::get('admin/subcategories','admin\Subcategory\SubcategoryController@subcategory')->name('subcategories');
Route::post('admin/store/subcategories','admin\Subcategory\SubcategoryController@Storesubcategory')->name('store.subcategories');
Route::get('edit/subcategory/{id}','admin\subcategory\SubcategoryController@EditSubcategory');
Route::post('update/subcategory/{id}','admin\subcategory\SubcategoryController@UpdateSubcategory');
Route::get('delete/subcategory/{id}','admin\subcategory\SubcategoryController@DeleteSubcategrory');
//blogpost
Route::get('admin/addpost','admin\BlogPost\BlogpostController@Blogpost')->name('addposts');
Route::get('admin/allpost','admin\BlogPost\BlogpostController@AllBlogpost')->name('allposts');
Route::post('admin/store/blogposts','admin\BlogPost\BlogpostController@BlogpostStore')->name('store.blogposts');
Route::get('delete/blogpost/{id}','admin\BlogPost\BlogpostController@DeleteBlogpost');
Route::get('edit/blogpost/{id}','admin\BlogPost\BlogpostController@EditBlogpost');
Route::post('update/blogpost/{id}','admin\BlogPost\BlogpostController@UpdateBlogpost');

//products
Route::get('admin/addproduct','admin\Product\ProductController@Product')->name('addproducts');
Route::post('admin/store/product','admin\Product\ProductController@StoreProduct')->name('store.products');
Route::get('admin/allproduct','admin\Product\ProductController@AllProduct')->name('allproducts');
Route::get('edit/product/{id}','admin\Product\ProductController@EditProduct');
Route::post('update/product/{id}','admin\Product\ProductController@UpdateProduct');
Route::get('delete/product/{id}','admin\Product\ProductController@DeleteProduct');

//Frontend Section
//Category
Route::get('user/profile/','Frontend\Product\ProductController@UserProfile')->name('profile');
Route::get('front/category/','Frontend\Category\CategoryController@Category')->name('categories');
//Route::get('show/category/{id}','Frontend\Category\CategoryController@ShowCategory');

//Product
Route::get('front/product/{id}','Frontend\Product\ProductController@Product');
//Cart
Route::get('front/cart/{id}','Frontend\Product\ProductController@CartProduct');
Route::post('cart/product/{id}','Frontend\Cart\CartController@AddCart');
Route::get('showcart','Frontend\Cart\CartController@showcart')->name('cart.product');
Route::get('user/view','Frontend\Cart\CartController@Cartshipping')->name('cart.shipping');
Route::post('cart/shipping','Frontend\Cart\CartController@shippingUser')->name('shipping');
//payment

Route::get('checkout/payment','Frontend\Cart\CartController@shippingPayment');

//confirm order

Route::post('confirm/order','Frontend\Cart\CartController@ConfirmOrder')->name('confirm.order');






