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
        return view('createProduct','create-product');
    }

    public function create(){        
        if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category_id'])) {
    
            $name = htmlspecialchars(strip_tags($_POST['name']));
            $price = htmlspecialchars(strip_tags($_POST['price']));
            $category_id = htmlspecialchars(strip_tags($_POST['category_id']));
    
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $imageDir = 'uploads'; 
                
                $imagePath = Product::uploadImage($_FILES['image'], $imageDir);
                if (!$imagePath) {
                    echo "Image upload failed.";
                    exit();
                }
            } else {
                echo "No image uploaded or there was an error.";
                exit();
            }
    
            $data = [
                'name' => $name,
                'price' => $price,
                'category_id' => $category_id,
                'image' => $imagePath 
            ];

            if (Product::create($data)) {
                header("Location: /");
                exit(); 
            } else {
                echo "Product creation failed.";
            }
        } else {
            echo "Please fill in all required fields.";
        }
    }

    public function editProductPage(){
        return view('editProduct','edit-product');
    }

    public function editProduct(){            
            $id = $_POST['id'];
            
            dd($_POST);
            // $product = Product::findById($id);  
        
            // if (!$product) {
            //     echo "Product not found.";
            //     exit();
            // }
            if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['category_id'])) {
                
                $name = htmlspecialchars(strip_tags($_POST['name']));
                $price = htmlspecialchars(strip_tags($_POST['price']));
                $category_id = htmlspecialchars(strip_tags($_POST['category_id']));
                
                if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                    $imageDir = 'uploads'; 
                    
                    $imagePath = Product::uploadImage($_FILES['image'], $imageDir);
                    if (!$imagePath) {
                        echo "Image upload failed.";
                        exit();
                    }
                }
                // dd($imagePath);
                //  else {
                    // $imagePath = $product['image'];
                // }
        
                $data = [
                    'name' => $name,
                    'price' => $price,
                    'category_id' => $category_id,
                    'image' => $imagePath
                ];
                dd($id);
                if (Product::edit($id, $data)) {
                    header("Location: /product");
                    exit();
                } else {
                    echo "Product update failed.";
                }
            } else {
                echo "Please fill in all required fields.";
            }
        }
     

    public function createCategory(){
        return view('createCategory','CategoryCreation');
    }

    public function deleteProduct(){
    
        if(isset($_POST['id'])){
        
            $id = $_POST['id'];
            if (Product::delete($id)) {
                header("Location: /");
                exit(); 
            } 
        }
    }
}

?>