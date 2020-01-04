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
        $blogs = Blog::all();

        return response()->json($blogs);
    }


    /**
     * Get a listing of the blogs based on category ID.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByCategoryId($categoryId)
    {
        $blogs = Blog::whereHas('categories', function ($q) use ($categoryId) {
            $q->where('categories.id', '=', $categoryId);
        })->get();

        return response()->json($blogs);
    }
}
