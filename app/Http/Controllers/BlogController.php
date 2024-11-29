<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;

class BlogController extends Controller
{
    public function showBlogs()
    {
        $blogs = Blog::all();
        return view('blogs.list', ['blogs' => $blogs]);
    }

    public function tambahBlog()
    {
        return view('blogs.create');
    }

    public function createBlog(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'pembuat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
        }

        Blog::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'pembuat' => $request->pembuat,
            'foto' => $path,
        ]);

        return redirect('/blogs')->with('success', 'Blog berhasil ditambahkan!');
    }
    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id); 
        return view('blogs.edit', compact('blog')); 
    }
    
    public function updateBlog(Request $request, $id)
    {
        $blog = Blog::findOrFail($id); 
    
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'pembuat' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('uploads', 'public');
            $blog->foto = $path;
        }
    
        $blog->judul = $request->judul;
        $blog->isi = $request->isi;
        $blog->pembuat = $request->pembuat;
        $blog->save();
    
        return redirect('/blogs')->with('success', 'Blog berhasil diupdate!');
    }    

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->foto) {
            Storage::disk('public')->delete($blog->foto);
        }

        $blog->delete();

        return redirect('/blogs')->with('success', 'Blog berhasil dihapus!');
    }
}
