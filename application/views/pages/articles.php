<section class="ftco-section" id="blog-section">
	<div class="container">
		<div class="row justify-content-center mb-5 pb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<h1 class="big big-2">Articles</h1>
				<h2 class="mb-4">Mes articles</h2>
				<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
			</div>
		</div>
		<?php if($results != false):?>
			<div class="row d-flex">
				<?php foreach ($results as $art):?>
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
