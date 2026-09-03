
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EnvLab Tracker - @yield('title')</title>
</head>
<body>
    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('samples.index') }}">Daftar Sampel</a>
    </nav>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>