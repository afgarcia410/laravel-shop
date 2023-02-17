<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {
        //Cambiar paginación
        $products = product::paginate(6);
        return view('products.index',['products' => $products]); 
    }
    public function indexW()
    {
        $products = product::orderBy('id', 'desc')->take(3)->get();
        return view('welcome',['products' => $products]); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $products = new product();
            $products->title = $request->title;
            $products->type = $request->type;
            $products->product = $request->product;
            $id = Auth::id();
            $products->iduser = $id;
            
            if($request->hasFile('photo') && $request->file('photo')->isValid()) {
             $file = $request->file('photo');
             $path = $file->getRealPath();
             $image = file_get_contents($path);
             $products->thumbnail = base64_encode($image);
            }
            
            $type = lcfirst($products->type);
            $products->save();
            foreach($request->photos as $photo) {
                $image = new Imagen();
                $image->saveInStorage($photo, $products->id);
            }
            return redirect('product/' . $type)->with('message', 'product added successfully');
        } catch(\Exception $e) {
            return back()->withInput($request->all())->withErrors(
                ['default' => 'Something went wrong']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $products
     * @return \Illuminate\Http\Response
     */
    public function show(product $products)
    {
        $type = lcfirst($products->type);
        return view('product.show', ['product' => $products, 'type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(product $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $products)
    {
        //
    }
    public function search(Request $request){
        
        $search= $request->search;
        if($search==''){
            $products = product::paginate(6);
             return view('products.index',compact('products'));
        }
        
        $products =product::where('name','Like', '%'.$search.'%')->paginate(6);
        $products = product::paginate(6);
        return view('products.index',compact('products'));
    }
    
    public function orderAdidas(Request $request){
        $products =product::where('name','Like', '%adidas%')->paginate(3);
        return view('products.index',compact('products'));
    }
    
    public function orderNike(Request $request){
        $high= $request->priceSort;
        $products =product::where('name','Like', '%nike%')->paginate(3);
        return view('products.index',compact('products'));
    }
    
    public function orderJordan(Request $request){
        $high= $request->priceSort;
        $products =product::where('name','Like', '%jordan%')->paginate(3);
        return view('products.index',compact('products'));
    }
    
    public function filterDesc(Request $request){
        $high= $request->priceSort;
        $products = product::orderBy('price', 'desc')->paginate(3);
        return view('products.index',compact('products'));
    }
    
    public function filterAsc(Request $request){
        $high= $request->priceSort;
        $products = product::orderBy('price', 'asc')->paginate(3);;
        return view('products.index',compact('products'));
    }
    public function viewProduct($id){
        $products = product::find($id);
        return view('products.viewProduct',compact('products'));
        
        
    }
}
