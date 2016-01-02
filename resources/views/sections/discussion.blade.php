<div id="discussion">
	<h2 class="comments-header text-20 mt-40">
		Comments
	</h2>

	@if($article->comments)
		<ol class="comments">
			@foreach($article->comments as $comment)
			<li>
				<div class="media mt-60">
			<!-- Image, Left -->
				<div class="media-left">
					<a href="#">
						<img class="media-object" src="{{ asset('/images/user_01.jpg') }}" alt="User">
					</a>
				</div>
			<!-- Body -->
				<div class="media-body">
					<div class="details">
					<!-- Header -->
						<h4 class="media-heading">
							{{$comment->user->name}}
							<span class="light mini-text ml-15">{{$comment->created_at->diffForHumans()}}</span>
						</h4>
						{{$comment->text}}
					<!-- Votes -->
						<p class="votes t-right helvetica mt-20">
						<!-- Like -->
							<a href="#" class="like">
								<i class="fa fa-thumbs-o-up"></i>
								<span>+22</span>
							</a>
						<!-- Unlike -->
							<a href="#" class="unlike">
								<i class="fa fa-thumbs-o-down"></i>
								<span>-3</span>
							</a>
			</li>
			@endforeach
		</ol>
	@endif

	<!-- Reply Form -->


	{!! Form::open(['url' => 'comment/store', 'method' => 'post']) !!}
		{{-- Text Field --}}
		<div class="form-group">
			<p class="uppercase comments-header light post-text">
				Leave a Comment
			</p>
			<div class="col-xs-12 pr-00 pl-00 mt-15">
		        {!! Form::textarea('text', null, [
		        'class' => 'form-control transparent light-form',
		        'placeholder' => 'You can join to discussion here...',
		        'rows' => 3,
		        ]) !!}
			</div>
			{{-- Add comment Button --}}
			<div class="form-group">
				{!! Form::hidden('article_id', $article->id) !!}
			    {!! Form::button('Add comment', [
			        'type' => 'submit', 
			        'class' => 'colored-bg uppercase',
			        'id' => 'add-comment'
				]) !!}
			</div>
		</div>

	{!! Form::close() !!}

	<!-- End Reply Form -->

</div>