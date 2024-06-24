<?php

namespace App\Http\Controllers;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository) {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts(){
        try {
            $posts = $this->postRepository->getAll();
            return response()->json($posts);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function addPost(Request $req){
        try {
            $this->postRepository->addPost([
                "title"=>$req->input("title"),
                "description"=>$req->input("description"),
                "categoryId"=>$req->input("categoryId"),
                "userId"=>$req->input("userId")
            ]);

            return response()->json("created");
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function editPost(Request $req, $id){
        try {
            $post = Post::find($id);
            $this->postRepository->editPost($post, [
                "title"=>$req->input("title"),
                "description"=>$req->input("description"),
                "categoryId"=>$req->input("categoryId")
            ]);

            return response()->json("updated");
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}

