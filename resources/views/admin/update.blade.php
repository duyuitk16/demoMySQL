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
    <style>
        /* Modal Styles */
        body {
            display: block;
        }

        .modal {
            width: 70%;
            margin: 0px auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }
    </style>
    <div class="modal">
        <div class="modal-content">
            <h2>Edit Form</h2>
            <?php
            $thumbnail = $post['thumbnail'];
            $id = $post['id'];
            ?>
            <form enctype="multipart/form-data" class="form" method="POST"
                action="{{ url("/admin/post/update/$id") }}" files="true">
                @csrf
                <label for="title">Tiêu đề:</label>
                <input name="title" type="text" id="title" placeholder="Nhập tiêu đề"
                    value="{{ $post['title'] }}">
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="description">Mô tả ngắn:</label>
                <textarea name="description" id="description" placeholder="Nhập mô tả ngắn" rows="4">{{ $post['description'] }}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="slug">Link thân thiện:</label>
                <textarea name="slug" id="slug" placeholder="Nhập link thân thiện" rows="4">{{ $post['slug'] }}</textarea>
                @error('slug')
                    <p class="error">{{ $message }}</p>
                @enderror
                <label for="thumbnail">Ảnh bài viết:</label>
                <img src="{{ asset("$thumbnail") }}" width="150px" height="150px" alt="Ảnh bài viết">
                <label for="file">Chọn tệp ảnh:</label>
                <input name="file" type="file" id="file" accept="image/*">
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
