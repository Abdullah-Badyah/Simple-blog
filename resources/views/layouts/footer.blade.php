<footer class="footer-01 pb-1">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-lg-3 pl-lg-5 mb-4 mb-md-0">
                <h2 class="footer-heading">Quick Links</h2>
                <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Home</a></li>
                    <li><a href="#" class="py-2 d-block">About</a></li>
                    <li><a href="#" class="py-2 d-block">Services</a></li>
                    <li><a href="#" class="py-2 d-block">Works</a></li>
                    <li><a href="#" class="py-2 d-block">Blog</a></li>
                    <li><a href="#" class="py-2 d-block">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <h2 class="footer-heading">Latest News</h2>
                @foreach ($posts->take(2) as $item)
                    <div class="block-21 mb-4 d-flex">
                    <a class="img me-4 rounded" style="background-image: url({{ asset('images/' . $item->image) }});"></a>
                    <div class="text">
                        <h3 class="heading"><a href="{{route('posts.show',$item->id)}}">{{$item->title}}</a></h3>
                        <div class="meta">
                        <div class="text-secondary"><ion-icon name="calendar"></ion-icon> {{$item->created_at}}</a></div>
                        <div class="text-secondary"><ion-icon name="person"></ion-icon>{{$item->createdBy->name}}</div>
                        <div class="text-secondary"><ion-icon name="document"></ion-icon> 
                            @foreach ($item->categories as $category)
                                {{ $category->name }}
                            @endforeach
                        </div>
                        </div>
                    </div>
                    </div>  
                @endforeach
            </div>
            <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
                <h2 class="footer-heading">Get in touch with us</h2>
                <div class="block-23 mb-3">
                    <ul>
                        <li><ion-icon name="location"></ion-icon></span><span class="text ps-4">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                        <li><a href="#"><ion-icon name="call"></ion-icon><span class="text ps-4">+2 392 3929 210</span></a></li>
                        <li><a href="#"><ion-icon name="mail"></ion-icon></span><span class="text ps-4">info@yourdomain.com</span></a></li>
                    </ul>
                    <ul class="ftco-footer-social p-0 d-flex align-self-center">
                        <li><a class="d-flex align-items-center justify-content-center" href="#" data-toggle="tooltip" title="Twitter"><ion-icon name="logo-twitter"></ion-icon></a></li>
                        <li><a class="d-flex align-items-center justify-content-center" href="#" data-toggle="tooltip" title="Facebook"><ion-icon name="logo-facebook"></ion-icon></a></li>
                        <li><a class="d-flex align-items-center justify-content-center" href="#" data-toggle="tooltip" title="Instagram"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <ion-icon name="heart"></ion-icon> by Abdullah Badyah
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>