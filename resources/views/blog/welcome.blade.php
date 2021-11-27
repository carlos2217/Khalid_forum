@extends('layouts.blog')
@section('content')
<div class="header-spacer"></div>

<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            @foreach($first_post as $first_post)
            @if($first_post->count() > 0)
            <article class="hentry post post-standard has-post-thumbnail sticky">

                <div class="post-thumb">
                    <img src="/storage/{{$first_post->post_image}}" width="100%" height="30%" alt="{{$first_post->title}}">
                    <div class="overlay"></div>
                    <a href="/storage/{{$first_post->post_image}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>
                <div class="post__content">
                    <div class="post__content-info">
                        <h2 class="post__title entry-title ">
                            <a href="{{route('blog.show',$first_post->slug)}}">{{$first_post->title}}</a>
                        </h2>
                        <div class="post-additional-info">
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published" datetime="2016-04-17 12:00:00">
                                    April 17, 2016
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                @foreach($first_post->tags as $post)
                                <a href="{{route('blog.tag',$post->slug)}}">
                                    <span class="">{{$post->name}},</span>
                                </a>
                                @endforeach
                            </span>

                            <span class="post__comments">
                                <a href="{{route('blog.category',$first_post->category->slug)}}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    {{$first_post->category->title}}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

            </article>
            @else
            NO Post Found
            @endif
            @endforeach
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row">
        @foreach($posts as $post)
        @if($first_post->id != $post->id)
        <div class="col-lg-6">
            <article class="hentry post post-standard has-post-thumbnail sticky">
                <div class="post-thumb">
                    <img src="/storage/{{$post->post_image}}" alt="{{$post->title}}">
                    <div class="overlay"></div>
                    <a href="/storage/{{$post->post_image}}" class="link-image js-zoom-image">
                        <i class="seoicon-zoom"></i>
                    </a>
                    <a href="#" class="link-post">
                        <i class="seoicon-link-bold"></i>
                    </a>
                </div>
                <div class="post__content">
                    <div class="post__content-info">
                        <h2 class="post__title entry-title ">
                            <a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a>
                        </h2>
                        <div class="post-additional-info">
                            <span class="post__date">
                                <i class="seoicon-clock"></i>
                                <time class="published" datetime="2016-04-17 12:00:00">
                                    April 17, 2016
                                </time>
                            </span>
                            <span class="category">
                                <i class="seoicon-tags"></i>
                                @foreach($post->tags as $tag)
                                <a href="{{route('blog.tag',$tag->slug)}}">
                                    {{$tag->name}},
                                </a>
                                @endforeach
                            </span>
                            <span class="post__comments">
                                <a href="{{route('blog.category',$post->category->slug)}}">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                    {{$post->category->title}}
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

            </article>
        </div>
        @endif
        @endforeach
    </div>
    {{$posts->links()}}
</div>
@foreach($categories as $category)
@if($category->posts()->count() != 0)
<div class="container-fluid">
    <div class="row  bg-border-color">
        <div class="container">
            <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{$category->title}}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="">
                            @foreach($category->posts()->orderBy('created_at','DESC')->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="/storage/{{$post->post_image}}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{route('blog.show',$post->slug)}}">{{$post->title}}</a></h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

<div class="container-fluid bg-green-color">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="subscribe scrollme">
                    <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                        <h4 class="subscribe-title">Email Newsletters!</h4>
                        <form class="subscribe-form" method="post" action="">
                            <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                            <button class="subscr-btn">subscribe
                                <span class="semicircle--right"></span>
                            </button>
                        </form>
                        <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                    </div>

                    <div class="images-block">
                        <img src="{{asset('blog/img/subscr-gear.png')}}" alt="gear" class="gear">
                        <img src="{{asset('blog/img/subscr1.png')}}" alt="mail" class="mail">
                        <img src="{{asset('blog/img/subscr-mailopen.png')}}" alt="mail" class="mail-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('title')
{{$setting->site_name}}
@endsection