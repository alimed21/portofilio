<section class="ftco-section" id="blog-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h1 class="big big-2">Projets</h1>
				<h2 class="mb-4">Mes projets</h2>
				<p>La liste des projets que j'ai réalisé ou qui sont en cours de réalisation.</p>
			</div>
		</div>
		<?php if($results != false):?>
			<div class="row d-flex">
				<?php foreach ($results as $pro):?>
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
										<a href="<?php echo base_url();?>Projets/detailProjet/<?php echo $pro->token;?>" class="mr-2"><?php echo $pro->type;?></a>
									</p>
								</div>
								<a href="<?php echo base_url();?>Projets/detailProjet/<?php echo $pro->token;?>">
									<h3 class="heading"><?php echo $pro->titre_pro;?></h3>
								</a>
								<p>
									<?php echo $pro->slide_descrip;?>
								</p>
							</div>
						</div>
					</div>
				<?php endforeach;?>
				<div id="pagination" class="col-md-12">
					<ul class="tsc_pagination">
						<!-- Show pagination links -->
						<?php foreach ($links as $link) {
							echo "<li style='margin:10px; display:block;'>". $link."</li>";
						} ?>
					</ul>
				</div>
			</div>
		<?php endif;?>
	</div>
</section>
