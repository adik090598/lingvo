<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-left text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase text-light mb-4 font-weight-bold">{{ settings()->site }}</h6>
                <p>{{ settings()->footer_banner_text }}</p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase text-light mb-4 font-weight-bold">Cілтемелер</h6>
                <p>
                    <a href="{{route('front.quiz.index')}}">Олимпида</a>
                </p>
                <p>
                    <a href="{{route('front.quiz.projects')}}">Жобалар</a>
                </p>
                <p>
                    <a href="{{route('front.quiz.competition')}}">Байқаулар</a>
                </p>
            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 id="contacts" class="text-uppercase text-light mb-4 font-weight-bold">Байланыс:</h6>
                <p>
                <p><b>Жұмыс уақыты:</b><br>{{ settings()->working_hours}}</p>
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i>
                    {{ settings()->email }}
                </p>
                <p>Редакциямен байланыс:<br>
                    <i class="fas fa-phone mr-3"></i> {{ settings()->phone1 }} <br>
                    <i class="fas fa-phone mr-3"></i> {{ settings()->phone2 }} <br>
                    <i class="fas fa-phone mr-3"></i> {{ settings()->phone3 }} <br>
                </p>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>
        <!-- Grid row -->
        <div class="row d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-light text-md-left">© {{date('Y')}} Copyright:
                    <a class="text-light" href="https://mdbootstrap.com/">
                        <strong> {{ settings()->site }}</strong>
                    </a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating text-light btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating text-light btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-vk"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating text-light btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

</footer>
<!-- Footer -->
