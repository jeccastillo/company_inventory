<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TestCategories;

class TestCategoryController extends Controller
{
    public function TestCategoryAll(){
        //$categories=TestCategories::latest()->get();

        $categories =  TestCategories::all();

       
            
        

        // foreach($categories as $category){
        //     $cats = $category->getProduct;

        //     // print each category**
        //     // print all product related to category

        //     echo $category->name.'<br>';
        //     echo '<hr>';
        //     foreach($cats as $cat){                
        //         echo $cat['name'].'<br>';                
        //     }
        //     echo '<hr>';            
        // }
        

        
        // echo $categories->name.'<br>';
        // echo '<hr>';
        // foreach($categories->testProduct as $category){
        //     echo $category->name.'<br>';            
        // }
        
        return view('backend.test.categories.testCategories_all')->with('categories',$categories);
    }
}
