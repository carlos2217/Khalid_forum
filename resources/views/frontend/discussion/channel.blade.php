@extends('layouts.frontend')
@section('title')
{{$channel->slug}}
@stop
@section('content')
<!-- ... End Header -->

<div class="content-wrapper">

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">Channel: {{$channel->title}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">

                <div class="row">
                    <div class="case-item-wrap">
                        @foreach($channel->discussions()->simplePaginate(6) as $discussion)
                        <div class="col-lg-6">
                            <article class="hentry post post-standard has-post-thumbnail sticky">
                                <div class="post-thumb">
                                    <img src="/storage/{{$discussion->discussion_image}}" alt="seo">
                                    <div class="overlay"></div>
                                    <a href="/storage/{{$discussion->discussion_image}}" class="link-image js-zoom-image">
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
                                                <a href="{{route('discussions.channel',$discussion->channel->slug)}}">
                                                    {{$discussion->channel->title}}
                                                </a>
                                            </span>
                                            <span class="post__comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                                @if($discussion->best_reply)
                                                Close
                                                @else
                                                Open
                                                @endif
                                            </span>
                                            <span class="post__comments">
                                                <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                                replies <span>{{$discussion->replies->count()}}</span>
                                            </span>
                                        </div>
                                        @include('inc.watch')
                                    </div>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{$channel->discussions()->simplePaginate(6)}}

                <!-- End Post Details -->
                <br>
                <br>
                <br>
                <!-- Sidebar-->

                <!-- <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                <a href="#" class="w-tags-item">SEO</a>
                                <a href="#" class="w-tags-item">Advertising</a>
                                <a href="#" class="w-tags-item">Business</a>
                                <a href="#" class="w-tags-item">Optimization</a>
                                <a href="#" class="w-tags-item">Digital Marketing</a>
                                <a href="#" class="w-tags-item">Social</a>
                                <a href="#" class="w-tags-item">Keyword</a>
                                <a href="#" class="w-tags-item">Strategy</a>
                                <a href="#" class="w-tags-item">Audience</a>
                            </div>
                        </div>
                    </aside>
                </div> -->

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

    <!-- Subscribe Form -->

    <div class="container-fluid bg-green-color">
        <div class="row">
            <div class="container">

                <div class="row">

                    <div class="subscribe scrollme">

                        <div class="col-lg-6 col-lg-offset-5 col-md-6 col-md-offset-5 col-sm-12 col-xs-12">
                            <h4 class="subscribe-title">Email Newsletters!</h4>
                            <form class="subscribe-form" method="post" action="http://theme.crumina.net/html-seosight/import.php">
                                <input class="email input-standard-grey input-white" name="email" required="required" placeholder="Your Email Address" type="email">
                                <button class="subscr-btn">subscribe
                                    <span class="semicircle--right"></span>
                                </button>
                            </form>
                            <div class="sub-title">Sign up for new Seosignt content, updates, surveys & offers.</div>

                        </div>

                        <div class="images-block">
                            <img src="img/subscr-gear.png" alt="gear" class="gear">
                            <img src="img/subscr1.png" alt="mail" class="mail">
                            <img src="img/subscr-mailopen.png" alt="mail" class="mail-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('css')
<style>
    .watch {
        background-color: green;
        color: white;
        cursor: pointer;
    }

    .unwatch {
        background-color: red;
        color: white;
        cursor: pointer;
    }
</style>
@stop