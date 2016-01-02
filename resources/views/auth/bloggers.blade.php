@extends("layouts.master")

@section("content")

    <div class="container">
        <div class="page-header">
            <h1> Bloggers </h1>
        </div>
		<div class="col-sm-4">
            <ul class="list-group">
            @forelse($users as $user)
                <li class="list-group-item">{{ $user->name }} </li>
            @empty
                <li class="list-group-item"> <h1> There are no bloggers. Register to be first one. </h1> </li>

            @endforelse
            </ul>
        </div>
    </div>


@stop