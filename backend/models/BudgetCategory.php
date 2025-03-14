<?php
// models/BudgetCategory.php
require_once 'config.php';

class BudgetCategory
{
    public static function getAllBudgetCategories()
    {
        global $db;
        if (!$db) {
            // Debugging: Check if $db is null.
            die('Error: $db is null');
        }
        $stmt = $db->prepare("SELECT * FROM Budget_Category");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getBudgetCategoryById($categoryId)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM Budget_Category WHERE Category_ID = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function createBudgetCategory($categoryId, $categoryName, $totalBudgetCategory, $budgetCreationDate, $itemName)
    {
        global $db;
        $stmt = $db->prepare("INSERT INTO Budget_Category (Category_ID, Category_Name, Total_Budget_Category, Budget_Creation_Date, Item_Name) VALUES (:categoryId, :categoryName, :totalBudgetCategory, :budgetCreationDate, :itemName)");
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->bindParam(':totalBudgetCategory', $totalBudgetCategory, PDO::PARAM_STR);
        $stmt->bindParam(':budgetCreationDate', $budgetCreationDate);
        $stmt->bindParam(':itemName', $itemName);
        return $stmt->execute();
    }

    public static function updateBudgetCatgegory($categoryId, $categoryName, $totalBudgetCategory, $budgetCreationDate, $itemName)
    {
        global $db;
        $stmt = $db->prepare("UPDATE Budget_Category SET Category_Name = :categoryName, Total_Budget_Category = :totalBudgetCategory, Budget_Creation_Date = :budgetCreationDate, Item_Name = :itemName WHERE Category_ID = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId);
        $stmt->bindParam(':categoryName', $categoryName);
        $stmt->bindParam(':totalBudgetCategory', $totalBudgetCategory, PDO::PARAM_STR);
        $stmt->bindParam(':budgetCreationDate', $budgetCreationDate);
        $stmt->bindParam(':itemName', $itemName);
        return $stmt->execute();
    }

    public static function deleteBudgetCategory($categoryId)
    {
        global $db;
        $stmt = $db->prepare("DELETE FROM Budget_Category WHERE Category_ID = :categoryId");
        $stmt->bindParam(':categoryId', $categoryId);
        return $stmt->execute();
    }
}
?>