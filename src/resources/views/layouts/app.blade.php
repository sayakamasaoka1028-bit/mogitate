<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
<style>
.pagination .page-link {
    border-radius: 50% !important;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}

.pagination .active .page-link {
    background-color: #f4c430;
    border-color: #f4c430;
    color: #fff;
}
.pagination {
    gap: 8px;
}

.pagination .page-link {
    border-radius: 50% !important;
    width: 38px;
    height: 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}

.pagination .active .page-link {
    background-color: #f4c430;
    border-color: #f4c430;
    color: #fff;
}

</style>

</head>
<body class="bg-light">

    {{-- ヘッダー部分 --}}
    <div class="bg-white py-3 shadow-sm">
        <div class="container">
            <span style="
                font-style: italic;
                font-size: 22px;
                color:#f4c430;
                font-weight:500;
            ">
                mogitate
            </span>
        </div>
    </div>

    {{-- メイン部分 --}}
    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>


