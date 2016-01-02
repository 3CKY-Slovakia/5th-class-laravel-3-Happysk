@extends('layouts.blog')

@section('content')

    @if (count($errors) > 0)
	    <ul class="alert alert-danger">
		    @foreach ($errors->all() as $error)
			    <li>{{ $error }}</li>
		    @endforeach
	    </ul>
	@endif
		<!-- Blog -->
    <section id="blog" class="clearfix boxed pt-40 mb-80">



		@can('edit-article', $article)
            <a href="{{ url('article/edit/'.$article->id) }}" class="btn btn-warning pull-right">
                <i class="fa fa-pencil"></i>
                Edit Article
            </a>

		    <a href="{{ url('article/delete/'.$article->id) }}" id="delete-butt" class="btn btn-danger pull-right">
                <i class="fa fa-trash"></i>
                Delete
            </a>
        @endcan

        <!-- Posts -->
        <div class="posts pl-00 pr-10 mt-90">

            <!-- Post -->
            <div class="post clearfix">
                <!-- Left, Dates -->
                <div class="dates f-left">
                    <!-- Post Time -->
                    <h6 class="date">
						<span class="day colored helvetica">
							{{ date('d', strtotime($article->created_at)) }}
						</span>
                        {{ date('M', strtotime($article->created_at)) }}, {{ date('Y', strtotime($article->created_at)) }}
                    </h6>
                    <!-- Details -->
                    <div class="details">
                        <ul class="t-right fullwidth">
                            <!-- Posted By -->
                            <li>
                                Posted By <a href="#">{{ $article->user->name }}</a>
                                <i class="fa fa-user"></i>
                            </li>
                            <!-- Comments -->
                            <li>
                                <a href="#">12 Comments</a>
                                <i class="fa fa-comments"></i>
                            </li>
                            <!-- Tags -->
                            <li>
                                @include('sections.tags')
                                <i class="fa fa-tags"></i>
                            </li>
                            <!-- Liked -->
                            <li>
                                <a href="#">Extra Link</a>
                                <i class="fa fa-link"></i>
                            </li>
                        </ul>
                    </div>
                    <!-- End Details -->
                </div>
                <!-- End Left, Dates -->
                <!-- Post Inner -->
                <div class="post-inner f-right">
                    <!-- Header -->
                    <h2 class="post-header semibold">
                        {{ $article->title }}
                    </h2>
                    <!-- Media -->
                    <div class="post-media fitvid">
                        <iframe src="http://player.vimeo.com/video/{{ $article->video }}?title=0&amp;byline=0&amp;portrait=0&amp;color=ff0179"></iframe>
                    </div>
                    <!-- Content -->
                    <p class="post-text light">
                        {!! $article->content !!}
                    </p>


                    <div class="fullwidth">
	                    <!-- Comments section-->
	                    @include('sections.discussion')

                    </div>


                </div>
                <!-- End Post Inner -->
            </div>
            <!-- End Post -->
        </div>
        <!-- End Posts -->

    </section>
    <!-- End Blog -->
@endsection