<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    //
    public function showAdminHomePage()
    {
        return view('admins.admin_home_page');
    }

    public function showAdminAddCategoryPage()
    {
        return view('admins.admin_add_category_page');
    }

    public function showAdminAddProductPage()
    {
        $categories = Category::all();
        return view('admins.admin_add_product_page', ['categories' => $categories]);
    }

    public function showProductListPage()
    {
        $products = Product::all();
        return view('admins.admin_product_list_page', ['products' => $products]);
    }

    public function showCategoryListPage()
    {
        $categories = Category::all();
        return view('admins.admin_category_list_page', ['categories' => $categories]);
    }

    public function registerNewCategory(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'unique:categories,category_name']
        ]);

        $category = new Category();
        $category->category_name = $request->input('category_name');
        $category->save();

        return back()->with('success_message', 'Category has been saved.');
    }

    public function registerNewProduct(Request $request)
    {
        $request->validate([
            'product_name' => ['required', 'unique:products,product_name'],
            'product_category' => ['required', 'notIn:-- Select Category --'],
            'product_description' => ['required'],
            'product_price' => ['required', 'numeric', 'min:100'],
            'product_image' => ['required', 'image', 'max:10000']
        ]);

        $product = new Product();
        $product->product_name = $request->input('product_name');
        //get product id from product name
        $product->category_id = $this->getCategoryId($request->input('product_category'));
        $product->product_description = $request->input('product_description');
        $product->product_price = $request->input('product_price');

        //store image
        $image = $request->file('product_image');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        $productImage = Image::make($image->getRealPath());

        $productImage->stream();

        Storage::disk('local')->put($filename, $productImage, 'public');
        $product->product_image = 'storage/app/' . $filename;
        $product->save();

        return back()->with('success_message', 'Product has been saved.');
    }

    public function deleteProduct($id)
    {
        Product::where('product_id', $id)->delete();
        return back();
    }

    public function showProductByCategoryId($categoryName)
    {
        $categoryId = $this->getCategoryId($categoryName);
        $products = Product::where('category_id', $categoryId)->get();

        return back()->with('products', $products)->with('category', $categoryName);
    }

    public function getCategoryId($categoryName)
    {
        $category = Category::where('category_name', $categoryName)->first();
        return $category->category_id;
    }
}
