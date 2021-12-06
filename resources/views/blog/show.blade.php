@extends('layouts.frontend')
@section('content')
<!-- ... End Header -->

<div class="content-wrapper">

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>

    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="/storage/{{$post->post_image}}" alt="seo">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$post->auther->name}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                    <i class="seoicon-clock"></i>

                                    <time class="published" datetime="2016-03-20 12:00:00">
                                        March 20, 2016
                                    </time>

                                </span>

                            </div>

                            <div class="post__content-info">
                                {!! $post->content !!}
                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($post->tags as $tag)
                                        <a href="{{route('blog.tag',$tag->slug)}}" class="w-tags-item">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials">Share:
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="/storage/{{$post->auther->profile->gravater}}" style="width: 100px;height: 100px;" alt="{{$post->auther->name}}">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$post->auther->name}}</h5>
                                <p class="author-info">SEO Specialist</p>
                            </div>
                            <p class="text">{!!$post->auther->profile->about!!}
                            </p>
                            <div class="socials">

                                <a href="{{$post->auther->profile->facebook}}" target="_blank" class="social__item">
                                    <img src="{{asset('blog/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <!-- <a href="#" class="social__item">
                                        <img src="{{asset('blog/svg/twitter.svg')}}" alt="twitter">
                                    </a>

                                    <a href="#" class="social__item">
                                        <img src="{{asset('blog/svg/google.svg')}}" alt="google">
                                    </a> -->

                                <a href="{{$post->auther->profile->youtube}}" target="_blank" class="social__item">
                                    <img src="{{asset('blog/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- <div class="pagination-arrow">

                            <a href="#" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">Claritas Est Etiam Processus</p>
                                </div>
                            </a>

                            <a href="#" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <p class="btn-content-subtitle">Duis Autem Velius</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>

                        </div> -->

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
                        <!--
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      | Comments
      |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
      !-->
                        <div class="section bg-gray">
                            <div class="container">

                                <div class="d-flex justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div id="disqus_thread"></div>
                                        <script>
                                            /**
                                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                                            var disqus_config = function() {
                                                this.page.url = "{{ config('app.url') }}/blog/{{ $post->slug }}"; // Replace PAGE_URL with your page's canonical URL variable
                                                this.page.identifier = "{{ $post->slug }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                            };

                                            (function() { // DON'T EDIT BELOW THIS LINE
                                                var d = document,
                                                    s = d.createElement('script');
                                                s.src = 'https://larapp.disqus.com/embed.js';
                                                s.setAttribute('data-timestamp', +new Date());
                                                (d.head || d.body).appendChild(s);
                                            })();
                                        </script>
                                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <!-- End Post Details -->
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

    <!-- End Subscribe Form -->

</div>

<!-- Footer -->
@stop
@section('title')
{{$post->slug}}
@stop