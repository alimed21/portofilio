<?php if($projets != false):?>
	<?php foreach ($projets as $pro):?>
		<section class="hero-wrap js-fullheight" style="background-image: url('<?php echo base_url();?>uploads/projets/<?php echo $pro->image_pro;?>');margin-top: 90px;" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
					<div class="col-md-12 ftco-animate pb-5 mb-3 text-center">
						<h1 class="mb-3 bread">
							<?php echo $pro->titre_pro;?>
						</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row">

					<div class="col-lg-12 ftco-animate">
						<?php echo $pro->contenu_pro;?>
						<p>
							Etat du projet : <?php echo $pro->type;?>
						</p>
						<p>
							Lien : <a href="<?php echo $pro->lien;?>" class="tag-cloud-link"><?php echo $pro->lien;?></a>
						</p>
					</div>
				</div>
			</div>
		</section> <!-- .section -->
	<?php endforeach;?>
<?php else:?>
<?php endif;?>
