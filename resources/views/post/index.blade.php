
<!DOCTYPE html>
<html>

<style>
    nav[role="navigation"] {
        margin-top: 20px;
        font-size: 14px;
    }

    nav[role="navigation"] svg {
        width: 16px;
        height: 16px;
    }

    nav[role="navigation"] a,
    nav[role="navigation"] span {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 12px;
        margin: 2px;
        border: 1px solid #ddd;
        border-radius: 4px;
        text-decoration: none;
    }
</style>

<head>
    <title>Daftar Posts</title>
</head>
<body>

    <h1>Daftar Posts</h1>

    <form action="{{ route('posts.index') }}" method="GET">

        <input
            type="text"
            name="search"
            placeholder="Cari judul post..."
            value="{{ request('search') }}"
        >

        <select name="per_page">
            <option value="5" {{ request('per_page', 10) == 5 ? 'selected' : '' }}>
                5 data
            </option>

            <option value="10" {{ request('per_page', 10) == 10 ? 'selected' : '' }}>
                10 data
            </option>

            <option value="25" {{ request('per_page', 10) == 25 ? 'selected' : '' }}>
                25 data
            </option>
        </select>

        <button type="submit">Cari</button>

        <a href="{{ route('posts.index') }}">Reset</a>

    </form>

    <hr>

    @forelse ($posts as $index => $post)

        <div>
            <h2>
                {{ $posts->firstItem() + $index }}.
                {{ $post->title }}
            </h2>

            <p>{{ $post->description }}</p>
        </div>

        <hr>

    @empty

        <p>Data post tidak ditemukan.</p>

        @endforelse

    <div style="margin-top: 20px; font-size: 14px;">
        <p>Halaman: {{ $posts->currentPage() }}</p>

        <p>Jumlah Data: {{ $posts->total() }}</p>

        <p>Data Per Halaman: {{ $posts->perPage() }}</p>
    </div>

    {{ $posts->links() }}

</body>
</html>
