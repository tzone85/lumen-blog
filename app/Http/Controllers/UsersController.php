<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Hashing\BcryptHasher;

class UsersController extends Controller {

	public function add(Request $request) {
		$request['api_token'] = str_random(60);
		$request['password'] = app('hash')->make($request['password']);
		$user = User::create($request->all());

		return response()->json($user);
	}

	public function edit(Request $request, $id) {
		$user = User::find($id);
		$post = update($request->all());

		return response()->json($post);
	}

	public function view($id) {
		$post = Post::find($id);

		return response()->json($post);
	}

	public function delete($id) {
		$post = Post::find($id);
		$post->delete();

		return response()->json('Removed successfully');
	}

	public function index() {
		$post = Post::all();

		return response()->json($post);
	}
}