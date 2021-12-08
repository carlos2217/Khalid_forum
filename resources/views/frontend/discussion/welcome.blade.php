@extends('layouts.frontend')
@section('title')
Discussion
@stop
@section('content')
<div class="row">
    <div class="col-lg-6">
        @foreach($discussions as $discussion)
        <article class="hentry post post-standard has-post-thumbnail sticky">
            <div class="post-thumb">
                <img src="/storage/{{$discussion->discussion_image}}" alt="seo">
                <div class="overlay"></div>
                <a href="#" class="link-image js-zoom-image">
                    <i class="seoicon-zoom"></i>
                </a>
                <a href="#" class="link-post">
                    <i class="seoicon-link-bold"></i>
                </a>
            </div>
            <div class="post__content">
                <div class="post__content-info">
                    <h2 class="post__title entry-title ">
                        <a href="{{route('discussions.show',$discussion->slug)}}">{{$discussion->title}}</a>
                    </h2>
                    <div class="post-additional-info">
                        <span class="post__date">
                            <i class="seoicon-clock"></i>
                            <time class="published" datetime="2016-04-17 12:00:00">
                                {{$discussion->created_at->diffForHumans()}}
                            </time>
                        </span>
                        <span class="category">
                            <i class="seoicon-tags"></i>
                            <a href="#">
                                {{$discussion->channel->title}}
                            </a>
                        </span>
                        <span class="post__comments">
                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                            6
                        </span>
                    </div>
                </div>
            </div>
        </article>
        @endforeach
    </div>
</div>
@stop