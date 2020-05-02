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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// admin section
//category
Route::get('admin/categories','admin\category\CategoryController@category')->name('categories');
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

//products


