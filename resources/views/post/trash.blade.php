<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Trash Posts</title>
</head>
<body>
    <h1>Daftar Post yang Dihapus</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @forelse ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>

            <form action="{{ route('posts.restore', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit">Restore</button>
            </form>

            <form action="{{ route('posts.forceDelete', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus Permanen</button>
            </form>
        </div>
    @empty
        <p>Belum ada post di Trash.</p>
    @endforelse
</body>
</html>