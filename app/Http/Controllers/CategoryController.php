<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository = null) {
        $this->categoryRepository = $categoryRepository;
    }
    public function getAllCategories(){
        $posts = $this->categoryRepository->getAll();
        return response()->json($posts);
    }

    public function addCategory(Request $req){
        try {
            $this->categoryRepository->addCategory([
                "title"=>$req->input("title")
            ]);

            return response()->json("created");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleteCategory(Request $req, $id){
        try {
            $this->categoryRepository->deleteCategory($id);

            return response()->json("deleted");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function editCategory(Request $req, $id){
        try {

            $category = Category::find($id);
            $this->categoryRepository->editCategory($category, $req->input("title"));

            return response()->json("updated");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
