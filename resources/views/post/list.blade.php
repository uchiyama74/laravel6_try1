@extends('layouts.app')

@section('content')
<div class="container">
    {{ $postsPaginator->onEachSide(0)->appends(['sort' => 'asc'])->links() }}
    <table>
        @foreach ($postsPaginator as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
