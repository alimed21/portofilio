<section id="home-section" class="hero">
	<div class="home-slider  owl-carousel">
		<div class="slider-item ">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
					<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?php echo base_url();?>assets/images/pic_1.jpg);">
						<div class="overlay"></div>
					</div>
					<div class="one-forth d-flex  align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading">Salut!</span>
							<h1 class="mb-4 mt-3">Je me nomme <span>Ali Mohamed</span></h1>
							<h2 class="mb-4">Je suis développeur web</h2>
							<p><a href="#" class="btn btn-primary py-3 px-4">Contactez-moi</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">Mes projets</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="slider-item">
			<div class="overlay"></div>
			<div class="container">
				<div class="row d-flex no-gutters slider-text align-items-end justify-content-end" data-scrollax-parent="true">
					<div class="one-third js-fullheight order-md-last img" style="background-image:url(<?php echo base_url();?>assets/images/pic_2.jpg);">
						<div class="overlay"></div>
					</div>
					<div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
						<div class="text">
							<span class="subheading">Salut!</span>
							<h1 class="mb-4 mt-3">Je suis <span>développeur web</span> baser à Djibouti</h1>
							<p><a href="#" class="btn btn-primary py-3 px-4">Contactez-moi</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">Mes projets</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
	<div class="container">
		<div class="row d-flex">
			<div class="col-md-6 col-lg-5 d-flex">
				<div class="img-about img d-flex align-items-stretch">
					<div class="overlay"></div>
					<div class="img d-flex align-self-stretch align-items-center" style="background-image:url(<?php echo base_url();?>assets/images/pic_3.jpg);">
					</div>
				</div>
			</div>
			<div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
				<div class="row justify-content-start pb-3">
					<div class="col-md-12 heading-section ftco-animate">
						<h1 class="big">A propos</h1>
						<h2 class="mb-4">A propos de moi</h2>
						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
						<ul class="about-info mt-4 px-md-0 px-2">
							<li class="d-flex"><span>Nom:</span> <span>Ali Mohamed</span></li>
							<li class="d-flex"><span>Date de naissance:</span> <span>21 Septembre 1994</span></li>
							<li class="d-flex"><span>Adresse:</span> <span>Quartier 4, Djibouti</span></li>
							<li class="d-flex"><span>Email:</span> <span>alimohamedaliahmed@outlook.fr</span></li>
							<li class="d-flex"><span>Téléphone: </span> <span>+253-77632669/+253-77580622</span></li>
						</ul>
					</div>
				</div>
				<div class="counter-wrap ftco-animate d-flex mt-md-3">
					<div class="text">
						<p class="mb-4">
							<span class="number" data-number="30">0</span>
							<span>Project complete</span>
						</p>
						<p><a href="<?php echo base_url();?>uploads/Documents/CV.pdf" class="btn btn-primary py-3 px-3" download="">Télécharger CV</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pb" id="resume-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-10 heading-section text-center ftco-animate">
				<h1 class="big big-2">Formations</h1>
				<h2 class="mb-4">Formations</h2>
				<!--<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>-->
			</div>
		</div>
		<div class="row">
			<?php if($formations != false):?>
				<?php foreach ($formations as $for):?>
					<div class="col-md-6">
						<div class="resume-wrap ftco-animate">
							<span class="date"><?php echo $for->annee;?></span>
							<h2><?php echo $for->titre;?></h2>
							<span class="position"><?php echo $for->intro;?></span>
						</div>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center ftco-animate">
				<p><a href="<?php echo base_url();?>uploads/Documents/CV.pdf" class="btn btn-primary py-4 px-5" download="">Télécharger CV</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section" id="services-section">
	<div class="container">
		<div class="row justify-content-center py-5 mt-5">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big big-2">Services</h1>
				<h2 class="mb-4">Services</h2>
				<!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>-->
			</div>
		</div>
		<div class="row">
			<?php if($services != false):?>
				<?php foreach ($services as $ser):?>
					<div class="col-md-4 text-center d-flex ftco-animate">
						<a href="#" class="services-1">
							<span class="icon">
								<!--<i class="flaticon-analysis"></i>-->
								<img src="<?php echo base_url();?>uploads/service/<?php echo $ser->image_ser;?>" alt="Image" class="imgClass">
							</span>
							<div class="desc">
								<h3 class="mb-5"><?php echo $ser->titre_ser;?></h3>
							</div>
						</a>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center ftco-animate">
				<p><a href="<?php echo base_url();?>Services/allServices" class="btn btn-primary py-4 px-5">Voir plus</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section" id="skills-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big big-2">Compétences</h1>
				<h2 class="mb-4">Mes compétences</h2>
			</div>
		</div>
		<div class="row">
			<?php if($competences != false):?>
				<?php foreach ($competences as $cmp):?>
					<div class="col-md-6 animate-box">
						<div class="progress-wrap ftco-animate">
							<h3><?php echo $cmp->titre_cmp;?></h3>
							<div class="progress">
								<div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
									aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $cmp->taille_cmp;?>%">
									<span><?php echo $cmp->taille_cmp;?>%</span>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	</div>
</section>

<section class="ftco-section ftco-project" id="projects-section">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<h1 class="big big-2">Projects</h1>
				<h2 class="mb-4">Mes projets</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php if($projets != false):?>
				<?php foreach ($projets as $pro):?>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="<?php echo base_url();?>Projets/detailProjet/<?php echo $pro->token;?>" class="block-20" style="background-image: url('<?php echo base_url();?>uploads/projets/<?php echo $pro->image_pro;?>');">
							</a>
							<div class="text mt-3 float-right d-block">
								<div class="d-flex align-items-center mb-3 meta">
									<p class="mb-0">
										<span class="mr-2">
											<?php echo  date("d-m-Y", strtotime($pro->date_pro)) ;?>
										</span>
									</p>
								</div>
								<a href="<?php echo base_url();?>Projets/detailProjet/<?php echo $pro->token;?>">
									<h3 class="heading">
										<?php echo $pro->titre_pro;?>
									</h3>
								</a>
								<p>
									<?php echo $pro->slide_descrip;?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
			<?php endif;?>
		</div>
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center ftco-animate">
				<p><a href="<?php echo base_url();?>Projets" class="btn btn-primary py-4 px-5">Voir plus</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section" id="blog-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h1 class="big big-2">Articles</h1>
				<h2 class="mb-4">Mes articles</h2>
			</div>
		</div>
		<div class="row d-flex">
			<?php if($articles != false):?>
				<?php foreach ($articles as $art):?>
					<div class="col-md-4 d-flex ftco-animate">
						<div class="blog-entry justify-content-end">
							<a href="<?php echo base_url();?>Articles/detailArticle/<?php echo $art->token;?>" class="block-20" style="background-image: url('<?php echo base_url();?>uploads/article/<?php echo $art->article_image_path;?>');">
							</a>
							<div class="text mt-3 float-right d-block">
								<div class="d-flex align-items-center mb-3 meta">
									<p class="mb-0">
										<span class="mr-2">
											<?php echo  date("d-m-Y", strtotime($art->article_date)) ;?>
										</span>
										<!--<a href="#" class="mr-2">Admin</a>
										<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>-->
									</p>
								</div>
								<h3 class="heading"><a href="<?php echo base_url();?>Articles/detailArticle/<?php echo $art->token;?>"><?php echo $art->article_title;?></a></h3>
								<p>
									<?php echo $art->slide_descrip;?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach;?>
			<?php else:?>
			<?php endif;?>
		</div>
		<div class="row justify-content-center mt-5">
			<div class="col-md-6 text-center ftco-animate">
				<p><a href="<?php echo base_url();?>Articles" class="btn btn-primary py-4 px-5">Voir plus</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
	<div class="container">
		<div class="row d-md-flex align-items-center">
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text">
						<strong class="number" data-number="30">0</strong>
						<span>Projets terminer</span>
					</div>
				</div>
			</div>
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text">
						<strong class="number" data-number="5">0</strong>
						<span>Projets en cours</span>
					</div>
				</div>
			</div>
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text">
						<strong class="number" data-number="30">0</strong>
						<span>Clients satisfait</span>
					</div>
				</div>
			</div>
			<div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
				<div class="block-18">
					<div class="text">
						<strong class="number" data-number="5">0</strong>
						<span>Expériences</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-hireme img margin-top" style="background-image: url(<?php echo base_url();?>assets/images/2.jpg)">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-7 ftco-animate text-center">
				<h2>Je suis <span>disponible</span> en freelance</h2>
				<p style="color:white">Développeur indépendant je travailles en freelance depuis chez moi.</p>
					<p class="mb-0"><a href="#" class="btn btn-primary py-3 px-5">Contactez-moi</a></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-3">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h1 class="big big-2">Contact</h1>
				<h2 class="mb-4">Contactez-moi</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>

		<div class="row d-flex contact-info mb-5">
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-map-signs"></span>
					</div>
					<h3 class="mb-4">Adresse</h3>
					<p>Quartier 4, Rue 08, Djibouti</p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-phone2"></span>
					</div>
					<h3 class="mb-4">Numéro de téléphone Number</h3>
					<p><a href="tel://1234567920">+ 253 77 63 26 69</a></p>
					<p><a href="tel://1234567920">+ 253 77 58 06 22</a></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-paper-plane"></span>
					</div>
					<h3 class="mb-4">Adresse électronique</h3>
					<p><a href="mailto:alimohamedaliahmed@outlook.fr">alimohamedaliahmed@outlook.fr</a></p>
				</div>
			</div>
			<div class="col-md-6 col-lg-3 d-flex ftco-animate">
				<div class="align-self-stretch box p-4 text-center">
					<div class="icon d-flex align-items-center justify-content-center">
						<span class="icon-globe"></span>
					</div>
					<h3 class="mb-4">Site web</h3>
					<p><a href="#">portofilio.d-shipca.com</a></p>
				</div>
			</div>
		</div>

		<div class="row no-gutters block-9">
			<div class="col-md-6 order-md-last d-flex">
				<form action="<?php echo base_url();?>Contact" method="post" class="bg-light p-4 p-md-5 contact-form">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Votre nom...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Votre adresse électronique...">
					</div>
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Votre sujet...">
					</div>
					<div class="form-group">
						<textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Votre message..."></textarea>
					</div>
					<div class="form-group">
						<input type="submit" value="Envoyer" class="btn btn-primary py-3 px-5">
					</div>
				</form>

			</div>

			<div class="col-md-6 d-flex">
				<div class="img" style="background-image: url(<?php echo base_url();?>assets/images/pic_1.jpg);"></div>
			</div>
		</div>
	</div>
</section>






