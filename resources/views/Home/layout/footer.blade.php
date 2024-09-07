<!-- Home.layout.footer -->
<section id="footer" class="bg-dark text-white py-5">
    <footer>
        <div class="container">
            <div class="row justify-content-center">
                <!-- Logo Section -->
                <div class="col-12 text-center mb-4">
                    <img src="{{ asset('image/logo.svg') }}" alt="Company Logo" class="footer-logo" style="height: 60px;">
                </div>

                <!-- Navigation Links -->
                <div class="col-12 text-center mb-4">
                    <ul class="list-unstyled d-inline-flex justify-content-center mb-0">
                        <li class="mx-3">
                            <a href="{{ route('user.home') }}" class="text-white fw-bold text-decoration-none" id="footerHome">Home</a>
                        </li>
                        <li class="mx-3">
                            <a href="#" class="text-white fw-bold text-decoration-none" id="footerAbout">About</a>
                        </li>
                        <li class="mx-3">
                            <a href="{{ route('user.design.show') }}" class="text-white fw-bold text-decoration-none" id="footerDesign">Design</a>
                        </li>
                        @if (session('login') == 'true')
                        <li class="mx-3">
                            <a href="{{ route('user.contact.show') }}" class="text-white fw-bold text-decoration-none" id="footerContact">Contact</a>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Social Media Icons -->
                <div class="col-12 text-center mb-4">
                    <div class="social-icons d-flex justify-content-center">
                        <a href="#" class="text-white mx-3 fs-4" id="footerFacebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white mx-3 fs-4" id="footerTwitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-white mx-3 fs-4" id="footerInstagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white mx-3 fs-4" id="footerLinkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Copyright Text -->
                <div class="col-12 text-center">
                    <p class="small mb-0">&copy; {{ date('Y') }} VJD Digital. All rights reserved. <br> Developed by <strong>Võ Gia Huy</strong>.</p>
                </div>
            </div>
        </div>
    </footer>
</section>
