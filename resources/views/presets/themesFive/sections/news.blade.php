@php
    $news = getContent('news.content', true);
    $newsElements = getContent('news.element', false, 3);
@endphp

{{-- <section class="latest-notice pt-40 pb-10" style="padding-top:15px;padding-bottom:0px">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 text-align-center mt-3" style="padding-left:0px;padding-right:0px;padding-top:5px;">
                <h4 class="news">Latest News :</h4>
            </div>

            <div class="col-lg-10" style="padding-left:0px">
                <h6>
                    <marquee class="marq" behavior="scroll" direction="left" scrollamount="10"
                        onmouseover="this.stop();" onmouseout="this.start();">
                        @foreach ($notices as $notice)
                            {{ $notice->title }}
                            (New) <a class="marquee-btn mt-4" target="blank"
                                href="{{ asset('file/' . $notice->file) }}">Download</a>
                            |
                        @endforeach
                    </marquee>
                </h6>
            </div>

        </div>
    </div>
</section> --}}
