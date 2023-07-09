    <div class="profile-card-4"><img src="images/{{$image}}">
        <div class="profile-content">
        <h5 class="postcard__title on-top font-weight-bold"><a class="text-black" href="{{route('posts.show',$id)}}">{{$title}}</a></h5>
        <div class="postcard__subtitle small text-muted">
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
            <div class="profile-description">{{ Str::limit(strip_tags($content), 200, '...') }}</div>
            <button type="button" class="btn btn-primary border-0 w-100 mt-2"><a class="text-white" href="{{route('posts.show',$id)}}">Read More</a></button>
        </div>
    </div>
