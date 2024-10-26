<!-- Start Hero Section -->
<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Komputer <span clsas="d-block"></span></h1>
								<p class="mb-4">Komputer adalah perangkat elektronik yang dirancang untuk memproses, menyimpan, dan mengelola data secara otomatis. Komponen utama seperti CPU, RAM, penyimpanan, dan perangkat input-output bekerja bersama untuk menjalankan berbagai perintah melalui perangkat lunak. Komputer digunakan dalam berbagai bidang, mulai dari komputasi dasar hingga aplikasi kompleks seperti desain grafis, pemrograman, dan komunikasi.</p>
								
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="assets/images/gaming2fix.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

<!-- Start Blog Section -->
<div class="blog-section">
			<div class="container">
				
				<div class="row">

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="https://unsplash.com/photos/black-and-blue-computer-tower-EOAKUQcsFIU" class="post-thumbnail"><img src="assets/images/gaming4.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Beberapa Komponen PC</a></h3>
								<div class="meta">
									<span>by <a href="https://unsplash.com/@andyjh07">Andy Holmes</a></span> <span>on <a href="#">Aug 19, 2020</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="https://unsplash.com/photos/macro-shot-photography-of-intel-core-i5-processor-eM6WUs4nKMY" class="post-thumbnail"><img src="assets/images/gaming5.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Bentuk Dari Processor Dengan Merek Intel Core i5-8600K</a></h3>
								<div class="meta">
									<span>by <a href="https://unsplash.com/@bogzilla">Alexandru-Bogdan Ghita</a></span> <span>on <a href="#">Dec 15, 2017</a></span>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-6 col-md-4 mb-5">
						<div class="post-entry">
							<a href="https://unsplash.com/photos/a-pink-keyboard-with-a-white-background-kFE4TeU6Ajw" class="post-thumbnail"><img src="assets/images/gaming6.jpg" alt="Image" class="img-fluid"></a>
							<div class="post-content-entry">
								<h3><a href="#">Keyboard dengan fitur mechanical</a></h3>
								<div class="meta">
									<span>by <a href="https://unsplash.com/@thekidph">Jan Loyde Cabrera
                                    </a></span> <span>on <a href="#">Aug 27, 2022</a></span>
								</div>
							</div>
						</div>
					</div>
        <!-- Stop Blog Section -->

		<!-- Start Data Table -->
        
		<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Kode</th>
            <th scope="col">Merek</th>
            <th scope="col">Tipe</th>
            <th scope="col">Harga</th>
            <!--<th scope="col">Action</th>-->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($produk as $prd): ?>
            <tr>
                <th scope="row"><?= $prd['kode']; ?></th>
                <td><?= $prd['merek']; ?></td>
                <td><?= $prd['tipe']; ?></td>
                <td><?= $prd['harga']; ?></td>
                <!--<td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal<?= $prd['id']; ?>">Ubah</button>
                    <a href="<?= base_url('produk/hapus/' . $prd['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin');">Hapus</a>
                </td>-->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


		<!-- Stop Data Table -->

        <!-- Start Contact Form -->
		<div class="untree_co-section">
      <div class="container">
        

        <div class="block">
          <div class="row justify-content-center">


            <div class="col-md-8 col-lg-8 pb-4">


            <div class="col-lg-6 mx-auto text-center">
						<h2 class="section-title">KONTAK</h2>
					</div>
              <form>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="fname">Masukkan Nama</label>
                      <input type="text" class="form-control" id="fname">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label class="text-black" for="lname">Masukkan Nama akhir</label>
                      <input type="text" class="form-control" id="lname">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="text-black" for="email">Masukkan Email</label>
                  <input type="email" class="form-control" id="email">
                </div>

                <div class="form-group mb-5">
                  <label class="text-black" for="message">Pesan</label>
                  <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary-hover-outline">Kirim Pesan</button>
              </form>

            </div>

          </div>

        </div>

      </div>


    </div>
  </div>

  <!-- End Contact Form -->

        <!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="assets/images/gaming1.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="assets/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Hubungi Saya!</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Komputer<span>.</span></a></div>
						<p class="mb-4">Terima kasih telah membaca deskripsi tentang komputer. Sebagai perangkat penting dalam era digital, komputer memungkinkan pemrosesan data, komunikasi, dan penyimpanan informasi secara efisien. Dengan mempelajari teknologi komputer lebih dalam, Anda akan semakin siap menghadapi tantangan dunia digital yang terus berkembang. Semoga pengetahuan ini bermanfaat bagi Anda!</p>

						<ul class="list-unstyled custom-social">
							<li><a href="https://x.com/itsZ3K"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="https://www.instagram.com/z3kama/"><span class="fa fa-brands fa-instagram"></span></a></li>
							
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="Tentang">Tentang</a></li>
									<li><a href="#">Services</a></li>
									<!--<li><a href="#">Blog</a></li>-->
									<li><a href="Kontak">Kontak</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="https://x.com/itsZ3K">Support</a></li>
									<!--<li><a href="#">Knowledge base</a></li>
									<!--<li><a href="#">Live chat</a></li>-->
								</ul>
							</div>

							
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Raditya Cahaya Putra</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
