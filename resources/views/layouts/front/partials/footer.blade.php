<footer class="section-footer bg-white shadow">
    <div class="container">
        <section class="footer-main py-5">
            <div class="row">
                <aside class="col-lg-4">
                    <article class="me-lg-4 mb-4"> <img src="{{ asset('images/logo_h&f.png') }}" class="logo-footer">
                        <p class="mt-3"> You might remember the Lenovo computer commercials in which a youth reports
                            this exciting news to his friends. </p>
                        <nav> <a class="btn btn-icon btn-light" title="Facebook" target="_blank"
                                href="#"><i
                                    class="fab fa-facebook-f"></i></a> <a class="btn btn-icon btn-light"
                                title="Instagram" target="_blank"
                                href="#"><i
                                    class="fab fa-instagram"></i></a> <a class="btn btn-icon btn-light" title="Youtube"
                                target="_blank" href="#"><i
                                    class="fab fa-youtube"></i></a> <a class="btn btn-icon btn-light" title="Twitter"
                                target="_blank" href="#"><i
                                    class="fab fa-twitter"></i></a> </nav>
                    </article>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">About</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="#">About us</a></li>
                        <li> <a href="#">Services</a></li>
                        <li> <a href="#">Rules and terms</a></li>
                        <li> <a href="#">Blogs</a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">Services</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="#">Help center</a></li>
                        <li> <a href="#">Money refund</a></li>
                        <li> <a href="#">Terms and Policy</a></li>
                        <li> <a href="#">Open dispute</a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-3 col-lg-2">
                    <h6 class="title">For users</h6>
                    <ul class="list-menu mb-4">
                        <li> <a href="{{ url('login') }}"> User Login </a></li>
                        <li> <a href="{{ url('register') }}"> User register </a></li>
                        <li> <a href="#"> Account Setting </a></li>
                        <li> <a href="#"> My Orders </a></li>
                    </ul>
                </aside>
                <aside class="col-6 col-sm-2 col-lg-2">
                    <h6 class="title">Call us</h6>
                    <a href="tel:+212 64 54 66 77 90" class="mb-0">+212 64 54 66 77 90</a>
                </aside>
            </div>
            <!-- row.// -->
        </section>
        <!-- footer-top.// -->
        <section class="footer-bottom d-flex justify-content-lg-between border-top">
            <p class="text-muted mb-0"> © 2022 All rights reserved. </p>
            <img class="cmi_cards" src="{{ asset('images/cartes.png') }}" alt="">
        </section>
    </div>
    <!-- container end.// -->
</footer>
