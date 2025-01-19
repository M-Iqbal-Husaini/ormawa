<footer class="footer-area section_gap" style="background-color: #2C3E50; color: #ffffff; padding: 40px 0;">
    <div class="container">
        <div class="row align-items-start">
            <!-- Logo and Description -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="footer-logo mb-3">
                    <img src="{{asset('assets/templates/logo/LogoOrmawa.png')}}" alt="Logo Ormawa" style="width: 150px;">
                </div>
                <p style="font-size: 14px; line-height: 1.8; margin-bottom: 0;">
                    Website ORMAWA Politeknik Negeri Bengkalis adalah platform digital yang menyediakan informasi tentang kegiatan dan organisasi Unit Kegiatan Mahasiswa (UKM) di kampus.
                </p>
            </div>

            <!-- Menu Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h6 style="color: #ffcc00; font-size: 18px; font-weight: bold; margin-bottom: 20px;">Menu</h6>
                <ul style="list-style: none; padding: 0; margin: 0;">
                    <li style="margin-bottom: 10px;">
                        <a href="{{route('user.pendaftaran')}}" style="color: #ffffff; text-decoration: none; transition: color 0.3s;">
                            <i style="margin-right: 8px; color: #ffcc00;"></i>Pendaftaran
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="{{route('user.berita')}}" style="color: #ffffff; text-decoration: none; transition: color 0.3s;">
                            <i style="margin-right: 8px; color: #ffcc00;"></i>Berita
                        </a>
                    </li>
                    <li style="margin-bottom: 10px;">
                        <a href="{{route('user.organisasi')}}" style="color: #ffffff; text-decoration: none; transition: color 0.3s;">
                            <i style="margin-right: 8px; color: #ffcc00;"></i>Organisasi
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Address and Map Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h6 style="color: #ffcc00; font-size: 18px; font-weight: bold; margin-bottom: 20px;">Alamat</h6>
                <p style="font-size: 14px; line-height: 1.8; margin-bottom: 10px;">
                    F552+G9C, Sungai Alam, Kec. Bengkalis, Kabupaten Bengkalis, Riau 28714
                </p>
                <div style="margin-top: 10px;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.5251642653093!2d102.14831777396294!3d1.4588084612180408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d15f5cf1bf080b%3A0x65c55404575d4d59!2sPOLITEKNIK%20NEGERI%20BENGKALIS!5e0!3m2!1sid!2sid!4v1737232550289!5m2!1sid!2sid"
                        width="100%"
                        height="200"
                        style="border:0; border-radius: 8px;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap" style="margin-top: 30px; border-top: 1px solid #ffffff30; padding-top: 15px;">
            <p class="footer-text m-0" style="font-size: 14px;">&copy; 2024 Copyright by Bebas. All rights reserved</p>
        </div>
    </div>
</footer>
