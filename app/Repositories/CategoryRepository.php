<?php

namespace App\Repositories;
use App\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface{

    private $categoryModel;

    public function __construct(Category $categoryModel) {
        $this->categoryModel = $categoryModel;
    }

    public function getAll(){
        return $this->categoryModel->all()->toArray();
    }

    public function getPostByCategory(Request $req, $categoryid){
        $datas = $this->categoryModel->findOrFail($categoryid);
        return $datas["posts"];
    }

    public function addCategory(array $data){
        return $this->categoryModel->create($data);
    }
    public function editCategory(Category $category, string $data){
        return $category->update(["title"=>$data]);
    }
    public function deleteCategory($id){
        return $this->categoryModel->destroy($id);
    }
}