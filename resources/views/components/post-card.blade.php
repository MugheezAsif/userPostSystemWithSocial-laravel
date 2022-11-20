@props(['post'])
<div class="col-lg-4 col-md-6 portfolio-item filter-app">
    <div class="portfolio-wrap">
        <figure>
            <img src="{{$post->logo ? asset('storage/' . $post->logo) : asset('images/no-image.jpg')}}" class="img-fluid" alt="no-image">
        </figure>

        <div class="portfolio-info">
            <h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4>
            <p>{{$post->subject}}</p>
        </div>
    </div>
</div>  