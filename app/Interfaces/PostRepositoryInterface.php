<?php

namespace App\Interfaces;

use App\Models\Post;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function getAll();
    public function getById($id);
    public function addPost(array $data);
    public function deletePost($id);
    public function editPost(Post $post, array $data);
}
