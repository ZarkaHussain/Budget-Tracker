<?php
// routes/budgetRoutes.php
require_once __DIR__ . '/../models/BudgetCategory.php';

header('Content-Type: application/json');

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['categoryId'])) {
            $budgetCategory = BudgetCategory::getBudgetCategoryById($_GET['categoryId']);
            echo json_encode($budgetCategory);
        } else {
            $budgetCategories = BudgetCategory::getAllBudgetCategories();
            echo json_encode($budgetCategories);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->categoryId, $data->categoryName, $data->totalBudgetCategory, $data->budgetCreationDate, $data->itemName)) {
            $result = BudgetCategory::createBudgetCategory($data->categoryId, $data->categoryName, $data->totalBudgetCategory, $data->budgetCreationDate, $data->itemName);
            echo json_encode(["success" => $result]);
        } else {
            echo json_encode(["error" => "Invalid input"]);
        }
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"));
        if (isset($data->categoryId, $data->categoryName, $data->totalBudgetCategory, $data->budgetCreationDate, $data->itemName)) {
            $result = BudgetCategory::updateBudgetCatgegory($data->categoryId, $data->categoryName, $data->totalBudgetCategory, $data->budgetCreationDate, $data->itemName);
            echo json_encode(["success" => $result]);
        } else {
            echo json_encode(["error" => "Invalid input"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['categoryId'])) {
            $result = BudgetCategory::deleteBudgetCategory($_GET['categoryId']);
            echo json_encode(["success" => $result]);
        } else {
            echo json_encode(["error" => "Category_ID required"]);
        }
        break;
}
?>
