<?php
require_once 'app/models/ProductModel.php';
require_once 'app/models/CategoryModel.php';

class AdminController {
    private $productModel;
    private $categoryModel;

    public function __construct() {
        $this->productModel = new ProductModel((new Database())->getConnection());
        $this->categoryModel = new CategoryModel((new Database())->getConnection());
    }

    public function addProduct() {
        $categories = $this->categoryModel->getCategories();
        include 'app/views/admin/product/add.php';
    }

    public function saveProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $category_id = $_POST['category_id'] ?? null;
            $image = '';

            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $image = $this->uploadImage($_FILES['image']);
            }

            $this->productModel->addProduct($name, $description, $price, $category_id, $image);
            header('Location: /DACS/admin/product/list');
        }
    }

    public function product() {
        $products = $this->productModel->getProducts();
        include 'app/views/admin/product/list.php';
    }

    private function uploadImage($file) {
        $target_dir = 'uploads/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = time() . '_' . preg_replace('/[^a-zA-Z0-9._-]/', '_', basename($file['name']));
        $target_file = $target_dir . $file_name;

        if (!move_uploaded_file($file['tmp_name'], $target_file)) {
            throw new Exception('Có lỗi xảy ra khi tải lên hình ảnh.');
        }

        return $target_file;
    }
}