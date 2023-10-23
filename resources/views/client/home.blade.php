<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/client/css/style.css') }}">
    <link rel="icon" href="{{ asset('images/iconLaravel.svg') }}">
    <title>Danh sách bài viết</title>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="site-title">
                <h1>Duy Mup's News</h1>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Tìm kiếm...">
                <button type="submit">Tìm kiếm</button>
            </div>
            <nav class="menu">
                <ul>
                    <li><a href="#">Thể thao</a></li>
                    <li><a href="#">Giải trí</a></li>
                    <li><a href="#">Chính trị</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                @php
                    $slug = $post['slug'];
                    $thumbnail = $post['thumbnail'];
                @endphp
                <div class="post">
                    <a href="{{ url("/post/show/detail/$slug") }}" target="_blank" rel="noopener noreferrer"><img
                            src="{{ asset("$thumbnail") }}" alt="Hình ảnh bài viết 2"></a>
                    <div class="post-info">
                        <h2></h2>
                        {{-- /post/show/detail/{{ $post['slug'] }} --}}
                        <a class="title" href="{{ url("/post/show/detail/$slug") }}"
                            target="_blank">{{ $post['title'] }}</a>
                        <p>Ngày tạo: {{ date('H:i:s d-m-Y', strtotime($post['created_at'])) }}</p>
                        <p>Ngày chỉnh sửa: {{ date('H:i:s d-m-Y', strtotime($post['updated_at'])) }}</p>
                        <br>
                        <p>{{ $post['description'] }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="error">Không có bài viết</p>
        @endif
    </div>
    <footer>
        <div class="footer-content">
            <div class="contact-info">
                <h3>Liên hệ</h3>
                <br>
                <p>Địa chỉ: 123 Đường ABC, Thành phố XYZ.</p>
                <br>
                <p>Điện thoại: 0123-456-789.</p>
                <br>
                <p>Giám đốc tòa soạn: Nguyễn Vũ Anh Duy.</p>

            </div>
            <div class="social-icons">
                <h3>Kết nối với chúng tôi</h3>
                <a href="#" class="icon"><i class="fa-brands fa-facebook"></i> Facebook</a>
                <a href="#" class="icon"><i class="fa-brands fa-twitter"></i> Twitter</a>
                <a href="#" class="icon"><i class="fa-brands fa-youtube"></i> Youtube</a>
                <a href="#" class="icon"><i class="fa-brands fa-tiktok"></i> Tiktok</a>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/f64911c489.js" crossorigin="anonymous"></script>
</body>

</html>
