@extends('frontend.layouts.master')

@section('title','StreetLocatio|| Blog Detail page')

@section('main-content')

<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">latest news</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">news details</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div><!-- end block-title -->

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <main class="main-content">

                <article class="post post_mod-b clearfix">
                    <div class="entry-media">
                        <img class="img-responsive" src="{{url('storage/posts/'.$post->photo)}}" width="770" height="430" alt="l'image de vehicule"/>
                    </div>

                    <div class="entry-main">
                        <div class="entry-main__inner">
                            <h3 class="entry-title">{{$post->title}}</h3>
                            <div class="entry-meta">
                                <span class="entry-meta__item">By:: <a class="entry-meta__link" href="javascript:void(0);"> {{$post->author_info['name']}}</a></span>
                                <span class="entry-meta__item">COMMENTS :: <a class="entry-meta__link" href="javascript:void(0);">{{$post->allComments->count()}}</a></span>
                            </div>
                        </div>
                        <div class="decor-1"></div>
                        <div class="entry-date"><span class="entry-date__inner"><span class="entry-date__number">{{$post->created_at->format('d')}}</span><br>{{$post->created_at->format('M')}}</span></div>
                        <div class="entry-content">
                           <p>{!!$post->summary!!}</p>
                           <p>{!!$post->description!!}</p>
                          </div>
                       
                    </div>
                </article><!-- end post -->

            
                <section class="section-comment">
                    <h3 class="ui-title-inner">comments :: {{$post->allComments->count()}}</h3>
                    <div class="decor-1"></div>

                    <ul class="comments-list clearfix">
                        @foreach($post->comments as $comment)
                        <li>
                            <article class="comment">
                                <div class="avatar-placeholder">
                                    @if($comment->user_info['photo'])
                                    <img src="{{url('storage/users/'.$comment->user_info['photo'])}}" height="65" width="65" alt="avatar">
                                    @else 
                                        <img src="{{asset('backend/img/avatar.png')}}" height="65" width="65" alt="">
                                    @endif </div>
                                <div class="comment-inner">
                                    <header class="comment-header"> <cite class="comment-author">{{$comment->user_info['name']}} <span class="comment-author__inner">says</span></cite>
                                        <time class="comment-datetime" datetime="2012-10-27 15:20">At {{$comment->created_at->format('g: i a')}} On {{$comment->created_at->format('M d Y')}}</time>
                                    </header>
                                    <div class="comment-body">
                                        <p>{{$comment->comment}}</p>
                                        
                                    </div>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul><!-- end comments-list -->
                </section><!-- end section-comment -->
                @auth
                <form class="comment-reply-form" id="comment-reply-form" action="{{route('post-comment.store',$post->slug)}}" method="POST">
                    @csrf
                    <h3 class="ui-title-inner">leave a comment</h3>
                    <div class="decor-1"></div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control" id="comment-text" name="comment" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                             <input type="hidden" name="parent_id" id="parent_id" value="" />
                        </div>
                        <div class="col-xs-12">
                            <div class="wrap__btn-skew-r">
                                <button class="btn-skew-r btn-skew-r_mod-a btn-effect " type="submit"><span class="btn-skew-r__inner">send message</span></button>
                            </div>
                        </div>
                    </div>
                </form><!-- end comment-reply-form -->
                @else 
                <p class="text-center p-5 mt-2">
                    You need to <a href="{{route('login.form')}}" style="color:rgb(255, 40, 40)">Login</a> OR <a style="color:rgb(250, 40, 40)" href="{{route('register.form')}}">Register</a> for comment.

                </p>
                @endauth
            </main><!-- end main-content -->
        </div><!-- end col -->


        <div class="col-md-4">
            <aside class="sidebar">

                <div class="widget widget_searce">
                    <div class="single-widget search">
                        <form class="form-search form" method="GET" id="search-global-form" action="{{route('blog.search')}}">
                            <input type="text" placeholder="Search Here..." name="search" class="form-search__input">
                            <button class="form-search__submit" type="submit"><i class="icon fa fa-search"></i></button>
                        </form>
                    </div>
                </div><!-- end widget -->

                <section class="widget widget_mod-c">
                    <h3 class="widget-title">latest Posts</h3>
                    <div class="decor-1"></div>
                    <div class="widget-content">
                        @foreach($recent_posts as $post)
                        <div class="widget-post1 clearfix">
                            <div class="widget-post1__img">
                                <img class="img-responsive" src="{{url('storage/posts/'.$post->photo)}}" height="75" width="75" alt="l'image de vehicule">
                            </div>
                            <div class="widget-post1__inner">
                                <div class="widget-post1__info">{{$post->title}}</div>
                                <div class="widget-post1__reviews"><i class="icon fa fa-comment"></i> :: <a href="javascript:void(0);">{{$post->allComments->count()}}</a></div>
                            </div>
                        </div>
                       @endforeach
                    </div>
                </section><!-- end widget -->


                

            </aside>
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end container -->


@endsection
@push('styles')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&Car=inline-share-buttons' async='async'></script>
@endpush
@push('scripts')
<script>
$(document).ready(function(){
    
    (function($) {
        "use strict";

        $('.btn-reply.reply').click(function(e){
            e.preventDefault();
            $('.btn-reply.reply').show();

            $('.comment_btn.comment').hide();
            $('.comment_btn.reply').show();

            $(this).hide();
            $('.btn-reply.cancel').hide();
            $(this).siblings('.btn-reply.cancel').show();

            var parent_id = $(this).data('id');
            var html = $('#commentForm');
            $( html).find('#parent_id').val(parent_id);
            $('#commentFormContainer').hide();
            $(this).parents('.comment-list').append(html).fadeIn('slow').addClass('appended');
          });  

        $('.comment-list').on('click','.btn-reply.cancel',function(e){
            e.preventDefault();
            $(this).hide();
            $('.btn-reply.reply').show();

            $('.comment_btn.reply').hide();
            $('.comment_btn.comment').show();

            $('#commentFormContainer').show();
            var html = $('#commentForm');
            $( html).find('#parent_id').val('');

            $('#commentFormContainer').append(html);
        });
        
 })(jQuery)
})
</script>
@endpush