<?php

namespace App\Repositories;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository implements PostRepositoryInterface {

    private $postModel;

    public function __construct(Post $postModel) {
        $this->postModel = $postModel;
    }

    public function getAll(){
        return $this->postModel->all()->toArray();
    }
    public function getById($id){
        return $this->postModel->find($id);
    }
    public function addPost(array $data){
        return $this->postModel->create($data);
    }
    public function deletePost($id){
        return $this->postModel->destroy($id);
    }
    public function editPost(Post $post, array $data){
        return $post->update($data);
    }
}
