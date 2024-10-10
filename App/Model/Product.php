<?php
namespace App\Model; 

use App\Model\Model; 

class Product extends Model {
    protected static $table_name = 'products'; 

    public static function uploadImage($file, $uploadDir) {
        // dd($file,$uploadDir);
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = mime_content_type($file['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            return null; 
        }

        $fileName = uniqid() . "_" . basename($file['name']);
        $uploadPath = $uploadDir . '/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            return $uploadPath;
        } else {
            return null; 
        }
    }
    
    public static function create($data) {
        $db = self::connect(); 

        $sql = "INSERT INTO products (name, price, category_id, image) VALUES (:name, :price, :category_id, :image)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':price', $data['price']);
        $stmt->bindParam(':category_id', $data['category_id']);
        $stmt->bindParam(':image', $data['image']);

        return $stmt->execute();
    }

    public static function edit($id, $data) {
        $db = self::connect(); 

        $stmt = $db->prepare("UPDATE products SET name = ?, price = ?, category_id = ?, image = ? WHERE id = ?");
        $stmt->bind_param("ssisi", $data['name'], $data['price'], $data['category_id'], $data['image'], $id);

        return $stmt->execute();
    }

    public static function findById($id) {
        $db = self::connect(); 
        
        $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc();  
    }

}
?>
