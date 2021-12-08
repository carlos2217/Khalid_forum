@extends('layouts.frontend')
@section('title')
{{$discussion->slug}}
@stop
@section('content')
<!-- ... End Header -->

<div class="content-wrapper">

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$discussion->title}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Discussion Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="/storage/{{$discussion->discussion_image}}" alt="seo">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    discussion by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$discussion->auther->name}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-03-20 12:00:00">
                                        {{$discussion->created_at->diffForHumans()}}
                                    </time>

                                </span>

                            </div>

                            <div class="post__content-info">
                                {!! $discussion->content !!}
                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        <a href="#" class="w-tags-item">{{$discussion->channel->title}}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Share Implamentation -->
                        <!-- <div class="socials">Share:
                            <div class="addthis_inline_share_toolbox"></div>
                        </div> -->

                    </article>
                    <!-- User Implimentation -->
                    <!-- <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="/storage/{{$discussion->auther->profile->gravater}}" style="width: 100px;height: 100px;" alt="{{$discussion->auther->name}}">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$discussion->auther->name}}</h5>
                                <p class="author-info">SEO Specialist</p>
                            </div>
                            <p class="text">{!!$discussion->auther->profile->about!!}
                            </p>
                            <div class="socials">

                                <a href="{{$discussion->auther->profile->facebook}}" target="_blank" class="social__item">
                                    <img src="{{asset('blog/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('blog/svg/twitter.svg')}}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('blog/svg/google.svg')}}" alt="google">
                                </a>

                                <a href="{{$discussion->auther->profile->youtube}}" target="_blank" class="social__item">
                                    <img src="{{asset('blog/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>  -->

                    <div class="comments">
                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="section bg-gray">
                            <div class="container">

                                <div class="d-flex justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div id="disqus_thread"></div>
                                        <div class="card">
                                            <div class="card-header">
                                                Repliy
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post">
                                                    <input id="content" type="hidden" name="content">
                                                    <trix-editor input="content"></trix-editor>
                                                    <button type="submit" class="creatediscussion">Craate</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- End Discussion Details -->
            </main>
        </div>
    </div>

</div>
@stop
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@stop