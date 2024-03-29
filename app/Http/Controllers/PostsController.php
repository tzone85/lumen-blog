<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
	/**
	 * @param Request $request
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function createPost(Request $request) {
		$post = Post::create($request->all());

		return response()->json($post);
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function updatePost(Request $request, $id) {
		$post = Post::find($id);

		$post->title = $request->input('title');
		$post->body = $request->input('body');
		$post->views = $request->input('views');
		$post->save();

		return response()->json($post);
	}

	/**
	 * @param $id
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function deletePost($id) {
		$post = Post::find($id);
		$post->delete();

		return response()->json('Removed successfully');
	}

	/**
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function index() {
		$post = Post::all();

		return response()->json($post);
	}

	public function viewPost($id) {
		$post = Post::find($id);

		return response()->json($post);
	}
}