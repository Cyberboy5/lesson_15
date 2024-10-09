<?php

namespace App\Controllers;

use App\Model\Category;
use App\Model\Product;

class StudentController{

    public function product() {
        $models = Product::getAll();
        return view('product','Product Page',$models);
    }
    
    public function category(){
        $models = Category::getAll();
        return view('category','Category Page',$models);
    }

    public function createProduct(){

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';
        
        // if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category_id'])) {
    
        //     // Clean input data
        //     $name = htmlspecialchars(strip_tags($_POST['name']));
        //     $price = htmlspecialchars(strip_tags($_POST['price']));
        //     $category_id = htmlspecialchars(strip_tags($_POST['category_id']));
        
        //     // Handle image upload
        //     if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        //         $imageDir = 'uploads'; // Set your upload directory
        //         $imagePath = Product::uploadImage($_FILES['image'], $imageDir); // Use uploadImage function
        //     } else {
        //         $imagePath = null; // No image uploaded
        //     }
        
        //     $data = [
        //         'name' => $name,
        //         'price' => $price,
        //         'category_id' => $category_id,
        //         'image' => $imagePath // Store image path if uploaded
        //     ];
        
        //     if (Product::create($data)) {
        //         header("Location:/product");
        //         exit(); 
        //     } 
        // }
        // // return view('createProduct','ProductCreation');
    }
    
    public function createCategory(){
        return view('createCategory','CategoryCreation');
    }
}

?>