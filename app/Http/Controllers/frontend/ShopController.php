<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Banner;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Blog;
use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use App\Models\Admin\ProductDocument;
use App\Models\Admin\Setting;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    //index page

   public function home()
   {
       $blog                   = Blog::orderBy('updated_at','DESC')->get();
       $product                = Product::all()->take(20);
       $product_digital        = Product::where('type','digital')->get();
       $product_featured       = Product::all()->take(8);
       $banners                = Banner::select('image')->where('status','active')->get();
       $setting     = Setting::where('id',1);

       return view('frontend.index',compact('blog','product','product_featured','product_digital','banners'));

   }

    // shop page
        public function shop(Request $request)
        {

                // $brands      = Brand::with('products')->get();
                $brands =   DB::table('products')
                ->join('brands','brands.id','=','products.brand_id')
                ->select('brands.title')
                ->groupBy('brands.title')->get();

                // $categories  = Product::with('category')->get();
                $categories = DB::table('products')
                ->join('categories','categories.id','=','products.category_id')
                ->select('categories.title','categories.id','categories.slug')
                ->groupBy('categories.title','categories.id','categories.slug')->get();

                if ($request->slug) {
                        $products   = DB::table('products')
                        ->leftjoin('categories','categories.id','=','products.category_id')
                        ->select('categories.id','products.id','products.*','categories.title')
                        ->where('categories.slug','=',$request->slug)->paginate(12);
                }else{
                    $products    = Product::paginate(12);
                }
                return view ('frontend.shop',compact('brands','categories','products'));
        }

    // store directory

        public function categories($category)
        {
            # code...
            $categorys      = Category::all();
            $brand          = Brand::all();
            $category       = Category::with('products')->findOrFail( $category );
            return view('frontend.category', [
                'category' => $category,
                'categorys'=> $categorys,
                'brand'    => $brand
            ]);
        }

    // product details
        public function singleshop($slug)
        {
            $product    = Product::where('slug',$slug)->first();
            // gallery
            $gall = $product->id;
            //category
            $category= $product->category_id;
            //grallery
            $product_grallery = Product::find($gall)->product_grallery;
            // document
            $product_documents  =Product::find($gall)->document_product;
            // related
            $product_related  = Product::where('category_id',$category)->get();

            if($product->type == 'simple' || $product->type == 'variable'){
                return view('frontend.product_details',compact('product','product_grallery','product_related','product_documents'));
            }else{
                return view('frontend.digital_product',compact('product','product_grallery','product_related','product_documents'));
            }
        }

    // leave_review

        public function leave_review($slug)
        {
            # code...
            $review =Product::where('slug',$slug)->first();

            return view ('frontend.leave_review',compact('review'));
        }

    // download product document
        public function getDownload($id)
        {
            $document = ProductDocument::find($id);

            $file = public_path()."/backend/product_document/".$document->document;

            $headers = array(

                'Content-Type: application/*',
            );

            return response()->download($file, $document->document, $headers);
        }

    //store directroy

        public function store(){

            $category   =Category::all();

            return view('frontend.store_directory',compact('category'));
        }

        // blog page
        public function blog()
        {
            $blog       = Blog::orderBy('updated_at','DESC')->get();
            $latest     = Blog::orderBy('updated_at','DESC')->take(5)->get();
            $category   = Category::all()->take(7);

            return view ('frontend.blog',compact('blog','latest'));
        }
        // single blog
        public function single_blog($slug)
        {
            $blog   = Blog::where('slug',$slug)->first();
            $latest = Blog::orderBy('updated_at','DESC')->take(7)->get();

            return view ('frontend.single_blog',compact('blog','latest'));
        }

        //////////////////////// show on master.blade.php

        public function compose(View $view){

                $product        = Product::where('status','publish')->get();
                $category       = Category::with('products')->where('parent_id',NUll)->get();
                $cat            = Category::with('products')->get();
                $cat            = DB::table('products')
                ->join('categories','categories.id','=','products.category_id')
                ->select('categories.title','categories.slug')
                ->groupBy('categories.title','categories.slug')->get();
                $view->with("category",$category)->with("cat",$cat)->with("product",$product);

        }

    // public function email_subcription(Request $request)
    // {
    //     $email  =    $request->email;
    //     return response()->json(['success'=>'Document Record has been deleted']);
    // }

    public function autoComplete(Request $request) {

        if($request->ajax()) {

            $data = Product::where('name', 'LIKE', $request->product.'%')
                ->get();

            $output = '';

            if (count($data)>0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row){

                    $output .= '<li class="list-group-item" >'.$row->name.'</li>';
                }

                $output .= '</ul>';
            }
            else {

                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }

            return $output;
        }
    }

}
