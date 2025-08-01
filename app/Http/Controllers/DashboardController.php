<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->where('user_id', Auth::user()->id);

        if (request('search')) {
            $search = request('search');

            $posts->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    //melakukan join ke tabel kategori
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'like', '%' . $search . '%'); // asumsinya field kategori bernama "name"
                    });
            });
        }

        return view('dashboard.index', [
            'posts' => $posts->paginate(10)->withQueryString()
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:posts|min:5|max:255',
            'body' => 'required',
            'category' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'slug' => Str::slug($request->title),
            'body' => $request->body
        ]);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.show', [
            'post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
