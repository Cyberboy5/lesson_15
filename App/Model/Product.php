<?php
namespace App\Model; 

use App\Model\Model; 

class Product extends Model {
    protected static $table_name = 'products'; 

    public static function uploadImage($file, $uploadDir) {
        // Check if the file was uploaded without errors
        if ($file['error'] != UPLOAD_ERR_OK) {
            return "Error uploading file. Error code: " . $file['error'];
        }
    
        // Define allowed image types
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($file['tmp_name']);
    
        // Validate file type
        if (!in_array($fileType, $allowedTypes)) {
            return "Unsupported file type. Please upload a JPEG, PNG, or GIF.";
        }
    
        // Create a unique file name to avoid conflicts
        $fileName = uniqid() . "_" . basename($file['name']);
    
        // Set the upload path
        $uploadPath = $uploadDir . '/' . $fileName;
    
        // Move the file to the desired location
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return "Image uploaded successfully to " . $uploadPath;
        } else {
            return "Failed to move the uploaded file.";
        }
    }

    public static function create($data) {
        // Database connection
        $db = self::connect(); 

        // SQL Insert Query
        $sql = "INSERT INTO products (name, price, category_id, image) VALUES (:name, :price, :category_id, :image)";

        // Prepare the statement
        $stmt = $db->prepare($sql);

        // Bind the parameters from the $data array
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':image', $data['image']);

        // Execute the statement and return the result
        return $stmt->execute();
    }
    
}
?>
