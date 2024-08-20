<?php
/* Template Name: Contact Us */
get_header();
?>

<main id="primary" class="site-main">

	<section class="inn-banner type-1 position-relative">
		<div class="bg-wrap">
			<img src="<?php echo home_url(); ?>/wp-content/uploads/2022/11/TEEPLegacybannervision.jpg" alt="" class="bg-img">
			<div class="bg-overly" style="background-color: #007CC3; opacity: 1;"></div>
		</div>
		<div class="banner-content position-relative">
			<h1 class="fs-55 fw-700"><span><?php echo get_the_title(); ?></span></h1>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="contact-details-wrap">
						<h2 class="fs-38 fw-700 mb-4">Tata Education Excellence Programme</h2>
						<h3 class="fs-28" style="color:21211E;">Total Quality Management</h3>
						<ul class="contact-info-list">
							<li><a href="https://goo.gl/maps/uYMoxSMByBS6Sast6" target="_blank"><i class="fa-regular fa-map"></i><p>3rd Floor, Commercial Centre Bistupur, Jamshedpur - 831001 Jharkhand, India</p></a></li>
						<!-- <li><a href="mailto:contact.teep@gmail.com" target="_blank"><i class="fa-regular fa-envelope"></i><p>contact.teep@gmail.com</p></a></li> -->
							<li><a href="mailto:teep@tatasteel.com" target="_blank"><i class="fa-regular fa-envelope"></i><p>teep@tatasteel.com</p></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="comp-map-wrap">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14713.493248764486!2d86.16168510628611!3d22.788627180170813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f5e3611803a28d%3A0x45147fb2f2fd71e8!2sBistupur%2C%20Jamshedpur%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1673935531606!5m2!1sen!2sin" width="100%" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
			
			<div class="row g-5 contact-list">
				<div class="col-md-4">
					<div class="contact-item">
						<div class="contact-user-info">
							<div class="contact-user-pp"><img class="user-pp-img" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/ankur_01.jpg" alt=""></div>
							<div class="user-info-wrap">
								<h3 class="fs-20 mb-2">Mr. Ankur Gandotra</h3>
								<h4 class="fs-16">Head TQM</h4>
							</div>
						</div>
						<ul class="contact-info-list">
							<li>
								<a href="#" target="_blank" style="pointer-events: none">
									<i class="fa-regular fa-map"></i>
									<p>Tata Education Excellence Programme & Business Assessments, Tata Steel Ltd.</p>
								</a>
							</li>
							<li>
								<a href="mailto:ankur.gandotra@tatasteel.com" target="_blank">
									<i class="fa-regular fa-envelope"></i>
									<p>ankur.gandotra@tatasteel.com</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="contact-item">
						<div class="contact-user-info">
							<div class="contact-user-pp"><img class="user-pp-img" src="<?php echo home_url(); ?>/wp-content/uploads/2022/07/Monika-Nidhi.png" alt=""></div>
							<div class="user-info-wrap">
								<h3 class="fs-20 mb-2">Ms. Monika Nidhi</h3>
								<h4 class="fs-16">Senior Manager TQM</h4>
							</div>
						</div>
						<ul class="contact-info-list">
							<li>
								<a href="#" target="_blank" style="pointer-events: none">
									<i class="fa-regular fa-map"></i>
									<p>Tata Education Excellence Programme, Tata Steel Ltd.</p>
								</a>
							</li>
							<li>
								<a href="mailto:monika.nidhi@tatasteel.com" target="_blank">
									<i class="fa-regular fa-envelope"></i>
									<p>monika.nidhi@tatasteel.com</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="contact-item">
						<div class="contact-user-info">
							<div class="contact-user-pp"><img class="user-pp-img" src="<?php echo home_url(); ?>/wp-content/uploads/2023/01/Vidya-P.-Battiwalla.jpg" alt=""></div>
							<div class="user-info-wrap">
								<h3 class="fs-20 mb-2">Ms. Vidya P. Battiwalla</h3>
								<h4 class="fs-16">Project Executive TQM</h4>
							</div>
						</div>
						<ul class="contact-info-list">
							<li>
								<a href="#" target="_blank" style="pointer-events: none">
									<i class="fa-regular fa-map"></i>
									<p>Tata Education Excellence Programme, Tata Steel Ltd.</p>
								</a>
							</li>
							<li>
								<a href="mailto:vidya.battiwalla@partners.tatasteel.com" target="_blank">
									<i class="fa-regular fa-envelope"></i>
									<p>vidya.battiwalla@partners.tatasteel.com</p>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</section>
</main><!-- #main -->

<?php
// get_sidebar();
get_footer();