<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="icon" href="{{ asset('images/iconLaravel.svg') }}">
    <title>Admin</title>
</head>

<body>
    <div class="container">
        <div class="left">
            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif
            @if (count($posts) > 0)
                <table>
                    <thead>
                        <tr>
                            <th>Số thứ tự</th>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Mô tả ngắn</th>
                            <th>Link thân thiện</th>
                            <th>Chỉnh sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($posts as $post)
                            @php
                                $id = $post['id'];
                                $thumbnail = $post['thumbnail'];
                            @endphp
                            <tr>
                                <td>{{ $post['id'] }}</td>
                                <td><img src="{{ asset("$thumbnail") }}" alt="Ảnh bài viết" class="image"></td>
                                <td>{{ $post['title'] }}</td>
                                <td>{{ $post['description'] }}</td>
                                <td>{{ $post['slug'] }}</td>
                                <td><a href="{{ url("/admin/post/show/$id") }}" class="edit">Chỉnh sửa</a></td>
                                <td><a href="{{ url("/admin/post/delete/$id") }}" class="delete"
                                        onclick="if (confirm('Are you sure? :))')){return true;}else{event.stopPropagation(); event.preventDefault();};">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="error">Không
                    tìm thấy bài viết nào
            @endif
        </div>
        <div class="right">
            <form enctype="multipart/form-data" class="form" method="POST" action="{{ url('/admin/post/create') }}"
                files="true">
                @csrf
                <label for="title">Tiêu đề:</label>
                <input name="title" type="text" id="title" placeholder="Nhập tiêu đề"
                    value="{{ old('title') }}">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="content">Mô tả ngắn:</label>
                <textarea name="description" id="description" placeholder="Nhập mô tả ngắn" rows="4">{{ old('description') }}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="slug">Link thân thiện:</label>
                <textarea name="slug" id="slug" placeholder="Nhập link thân thiện" rows="4">{{ old('slug') }}</textarea>
                @error('slug')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="file">Tệp ảnh:</label>
                <input name="file" type="file" id="file" accept="image/*">
                @error('file')
                    <p class="error">{{ $message }}</p>
                @enderror
                @if (session('error_file'))
                    <p class="error">{{ session('error_file') }}</p>
                @endif
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
