<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    function show()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('posts'));
    }
    function eachShow($id)
    {
        $post = Post::find($id);
        // return $post;
        return view('admin.update', compact('post'));
    }
    function create(Request $request)
    {
        $request->validate(
            [
                'title' => 'required |max:200',
                'description' => 'required',
                'slug' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute tối đa :max ký tự'
            ],
            [
                'title' => 'Tiêu đề',
                'description' => 'Mô tả ngắn',
                'slug' => 'link thân thiện',
            ]
        );
        $input = $request->input();
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $input['thumbnail'] = 'images/' . $file->getClientOriginalName();
            Post::create($input);
            return redirect()->back()->withInput()->with(['success' => 'Đã thêm thành công']);
        } else
            return redirect()->back()->withInput()->with(['error_file' => 'File ảnh không được để trống']);
    }
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required |max:200',
                'description' => 'required',
                'slug' => 'required'
            ],
            [
                'required' => ':attribute không được để trống',
                'max' => ':attribute tối đa :max ký tự'
            ],
            [
                'title' => 'Tiêu đề',
                'description' => 'Mô tả ngắn',
                'slug' => 'link thân thiện',
            ]
        );
        $input = $request->input();
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file->move(public_path() . '/images', $file->getClientOriginalName());
            $input['thumbnail'] = 'images/' . $file->getClientOriginalName();
        }
        Post::find($id)->update($input);
        return redirect('/admin/post/show')->with(['success' => 'Đã cập nhật thành công']);
    }
    function delete($id)
    {
        Post::find($id)->delete();
        return redirect('/admin/post/show')->with(['success' => 'Đã xóa thành công']);
    }
}
