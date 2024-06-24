<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Http\Request;

interface CategoryRepositoryInterface
{
    public function getAll();
    public function getPostByCategory(Request $req, $categoryid);
    public function addCategory(array $data);
    public function deleteCategory($id);
    public function editCategory(Category $category, string $data);
}
