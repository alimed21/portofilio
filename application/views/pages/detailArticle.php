<?php if($articles != false):?>
	<?php foreach ($articles as $art):?>
		<section class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url();?>uploads/article/<?php echo $art->article_image_path;?>');margin-top: 90px;" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
				<div class="col-md-12 ftco-animate pb-5 mb-3 text-center">
					<h1 class="mb-3 bread">
						<?php echo $art->article_title;?>
					</h1>
				</div>
			</div>
		</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 ftco-animate">
						<?php echo $art->article_content;?>
					</div>
				</div>
			</div>
		</section> <!-- .section -->
	<?php endforeach;?>
<?php else:?>
<?php endif;?>
