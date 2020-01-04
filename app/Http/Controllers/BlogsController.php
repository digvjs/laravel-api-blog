<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();

        return response()->json($blogs);
    }

    /**
     * Get blog details by Id
     *
     * @param int $blogId
     * @return \Illuminate\Http\Response
     */
    public function show($blogId)
    {
        $blogs = Blog::where('id', $blogId)
            ->with('user')->first();

        return response()->json($blogs);
    }


    /**
     * Get a listing of the blogs based on category ID.
     *
     * @param int $categoryId
     * @return \Illuminate\Http\Response
     */
    public function getByCategoryId($categoryId)
    {
        $blogs = Blog::whereHas('categories', function ($q) use ($categoryId) {
            $q->where('categories.id', '=', $categoryId);
        })->with('user')->get();

        return response()->json($blogs);
    }
}
