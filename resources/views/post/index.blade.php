<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Post</title>
</head>
<body>

    <h1>Daftar Post</h1>

    @forelse ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
        </div>
    @empty
        <p>Belum ada data post.</p>
    @endforelse

</body>
</html>