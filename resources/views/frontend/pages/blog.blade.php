@extends('frontend.layouts.master')

@section('title','E-SHOP || Blog Page')

@section('main-content')
<div class="block-title">
    <div class="block-title__inner section-bg section-bg_second">
        <div class="bg-inner">
            <h1 class="ui-title-page">latest news</h1>
            <div class="decor-1 center-block"></div>
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">HOME</a></li>
                <li class="active">Liste des articles</li>
            </ol>
        </div><!-- end bg-inner -->
    </div><!-- end block-title__inner -->
</div><!-- end block-title -->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <main class="main-content">

                <div class="wrap-post">
                    
                    @foreach($posts as $post)
                    <article class="post post_mod-c clearfix">
                        <div class="entry-media">
                            <img class="img-responsive" src="{{url('storage/posts/'.$post->photo)}}" width="370" height="250" alt="l'image de vehicule"/>
                            <div class="post-hover"></div>
                        </div>

                        <div class="entry-main entry-main_mod-a">
                            <div class="entry-main__inner">
                                <h3 class="entry-title"><a href="{{route('blog.detail',$post->slug)}}">{{$post->title}}</a></h3>
                                <div class="entry-meta">
                                    @php 
                                    $author_info=DB::table('users')->select('name')->where('id',$post->added_by)->get();
                                @endphp
                                    <span class="entry-meta__item">By:: <a class="entry-meta__link" href="javascript:void(0);">   
                                        @foreach($author_info as $data)
                                        @if($data->name)
                                            {{$data->name}}
                                        @else
                                            Anonymous
                                        @endif
                                    @endforeach</a></span>
                                    <span class="entry-meta__item">COMMENTS :: <a class="entry-meta__link" href="javascript:void(0);">{{$post->allComments->count()}}</a></span>
                                </div>
                            </div>
                            <div class="decor-1"></div>
                            <div class="entry-date"><span class="entry-date__inner"><span class="entry-date__number">{{$post->created_at->format('d')}}</span><br>{{$post->created_at->format('M')}}</span></div>
                            <div class="entry-content">
                                <p>{!!$post->summary!!}</p>
                            </div>
                            <a class="post-link" href="{{route('blog.detail',$post->slug)}}">read more</a>
                        </div>
                    </article>
                    @endforeach

                </div><!-- end wrap-post -->



            </main><!-- end main-content -->
        </div><!-- end col -->

    </div><!-- end row -->
</div><!-- end container -->
@endsection
@push('styles')
    <style>
        .pagination{
            display:inline-flex;
        }
    </style>

@endpush