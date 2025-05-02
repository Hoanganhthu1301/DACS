<?php
session_start();

require_once 'app/helpers/SessionHelper.php';
require_once 'app/config/database.php';

// Xử lý URL
$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Controller & Action
$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : 'ProductController';
$action = $url[1] ?? 'index';

// Đường dẫn tới controller
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die('❌ Controller not found: ' . $controllerName);
}

require_once $controllerFile;

// Tạo đối tượng controller
$controller = new $controllerName();

// Kiểm tra hàm (action) có tồn tại không
if (!method_exists($controller, $action)) {
    die("❌ Action '$action' not found in controller $controllerName");
}

// Gọi action và truyền các tham số còn lại
$params = array_slice($url, 2);
call_user_func_array([$controller, $action], $params);
