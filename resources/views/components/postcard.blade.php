<article class="postcard dark blue">
    <a class="postcard__img_link" href="#">
        <img class="postcard__img" src="images/{{$image}}" alt="Image Title" />
    </a>
    <div class="postcard__text">
        <h1 class="postcard__title blue on-top"><a href="{{route('posts.show',$id)}}">{{$title}}</a></h1>
        <div class="postcard__subtitle small">
            <time datetime="2020-05-25 12:00:00">
                <ion-icon class="pe-2" name="calendar"></ion-icon>{{$created_at}}
            </time>
            <span><ion-icon class="pe-1 ps-2" name="person"></ion-icon>{{$createdBy}}</span>
            <span><ion-icon class="pe-1 ps-2" name="document"></ion-icon>
                @foreach ($categories as $category)
                    {{ $category->name }}
                @endforeach
            </span>
        </div>
        <div class="postcard__bar on-top"></div>
        <div class="postcard__preview-txt on-top">{{ Str::limit(strip_tags($content), 200, '...') }}</div>
        <ul class="postcard__tagbox on-top">
            <li class="tag__item play blue">
                <a href="{{route('posts.show',$id)}}"><i class="fas fa-play mr-2"></i>Read More</a>
            </li>
        </ul>
    </div>
</article>