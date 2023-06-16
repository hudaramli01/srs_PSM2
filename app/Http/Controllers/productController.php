<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;

class productController extends Controller
{
    public function listProduct()
    {
        $productList = DB::table('product')
            ->orderBy('id', 'desc')
            ->get();
        return view('product.listOfProduct', compact('productList'));
    }
    public function newProduct()
    {
        return view('product.addProduct');
    }

    public function insertProduct(Request $request)
    {
        $productName = $request->input('productName');
        $productDesc = $request->input('productDesc');
        $quantity = $request->input('quantity');
        $price = $request->input('price');
        $picture = $request->file('picture');
        $status = $request->input('status');


        // to rename the proposal file
        $filename = time() . '.' . $picture->getClientOriginalExtension();

        // to store the file by moving to assets folder
        $picture->move('assets', $filename);


        $data = array(
            'productName' => $productName,
            'productDesc' => $productDesc,
            'quantity' => $quantity,
            'price' => $price,
            'picture' => $filename,
            'status' => $status,
            

        );
        // insert query
        DB::table('product')->insert($data);

        return redirect()->route('listOfProduct');
    }

    public function displayProduct(Request $request, $id)
    {
        $product = Product::find($id);

        return view('product.displayProduct', compact('product'));
    }

    public function editProduct(Request $request, $id)
    {
        $product = DB::table('product')
        ->where('id',$id)
        ->first();


        return view('product.editProduct', compact('product'));
    }

    public function UpdateProduct(Request $request, $id)
    {
        // find the id from proposal
        $product = Product::find($id);

        // unlink the old proposal file from assets folder
        $path = public_path() . '/assets/' . $product->picture;
        if (file_exists($path)) {
            unlink($path);
        }

        $product->productName = $request->input('productName');
        $product->productDesc = $request->input('productDesc');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->picture = $request->file('picture');
        $product->status = $request->input('status');
        
        // to rename the proposal file
        $filename = time() . '.' . $product->picture->getClientOriginalExtension();
        // to store the new file by moving to assets folder
        $request->picture->move('assets', $filename);

        $product->picture = $filename;
        
         // Check if the quantity is 0 and set the status accordingly
    if ($product->quantity == 0) {
        $product->status = 'unavailable';
    } else {
        $product->status = $request->input('status');
    }

        // upadate query in the database
        $product->update();



        // display message box in the same page
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    //function delete proposal from database for committee view 
    public function deleteProduct(Request $request, $id)
    {
        // find proposal id
        $product = Product::find($id);

        // unlink the file in the assets folder
        $path = public_path() . '/assets/' . $product->picture;
        if (file_exists($path)) {
            unlink($path);
        }

        // delete the record from the database
        DB::delete('DELETE FROM product WHERE id = ?', [$id]);

        echo "Record deleted successfully.<br/>";
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
}