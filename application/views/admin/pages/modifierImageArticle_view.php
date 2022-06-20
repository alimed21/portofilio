<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Modification l'image d'un article</h3>
			</div>
		</div>
	</div>

	<!-- // Basic multiple Column Form section start -->
	<section id="multiple-column-form">
		<div class="row match-height">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Formulaire des articles</h4>
					</div>
					<div class="card-content">
						<?php if($this->session->flashdata('error')):?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif;?>
						<div class="card-body">
							<form class="form" action="<?php echo base_url();?>Admin/Articles/modificationImage" method="post" enctype="multipart/form-data">
								<?php if($articlesImage != false):?>
								<div class="row">
									<?php foreach($articlesImage as $img):?>
										<input type="hidden" name="token" value="<?php echo $img->token;?>">
										<div class="col-md-6 col-12">
											<div class="form-group">
												<label for="company-column">Image principale</label>
												<input type="file" name="userfile" id="userfile" class="form-control"
													   placeholder="Company">
												<p>
													Très important : les types des images autorisées sont : jpg, jpeg et png.
												</p>
											</div>
										</div>

										<div class="col-12 d-flex justify-content-end">
											<button type="submit" class="btn btn-success me-1 mb-1">Modifier</button>
											<button type="reset" class="btn btn-light-danger me-1 mb-1">Annuler</button>
										</div>
									<?php endforeach;?>
								</div>
								<?php endif;?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- // Basic multiple Column Form section end -->
</div>
