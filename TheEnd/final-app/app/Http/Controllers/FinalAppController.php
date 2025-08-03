<?php

namespace App\Http\Controllers;

use App\Models\final_app;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class FinalAppController extends Controller
{
    use AuthorizesRequests , DispatchesJobs, ValidatesRequests;
    /**
     * Display a listing of the resource.
     */

    public function index1()
    {
        $totalArticles = final_app::count();
        $recentArticles = final_app::latest()->take(5)->get();

        return view('dashboard', compact('totalArticles', 'recentArticles'));
    }

    public function index()
    {
        $articles = final_app::with('user')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $data = $request->validate([
            'title' => 'required|string|max:255', // Title is required, max 255 characters
            'body' => 'required|string',          // Body is required
        ]);

        // Create article for the current user
        $request->user()->final()->create($data);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(final_app $article)
    {
        $article->load('user'); // eager load author
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(final_app $article)
    {
        // Check if user can update this article (authorization)
        $this->authorize('update', $article);
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, final_app $article)
    {
        // Check if user can update this article (authorization)
        $this->authorize('update', $article);

        // Validate the form data
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Update the article
        $article->update($data);

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(final_app $article)
    {
        // Check if user can delete this article (authorization)
        $this->authorize('delete', $article);

        // Delete the article
        $article->delete();

        // Redirect with success message
        return redirect()->route('articles.index')->with('success', 'Article deleted!');
    }
}
