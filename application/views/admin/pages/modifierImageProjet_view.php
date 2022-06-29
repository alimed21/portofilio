<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<?php if($detailProjets != false):?>
					<?php foreach($detailProjets as $pro):?>
						<h3>Modification de l'image du projet</h3>
					<?php endforeach;?>
				<?php endif;?>
			</div>
		</div>
	</div>

	<!-- // Basic multiple Column Form section start -->
	<section id="multiple-column-form">
		<div class="row match-height">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Formulaire des projets</h4>
					</div>
					<div class="card-content">
						<?php if (isset($error_message)) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $error_message; ?>
							</div>
						<?php } ?>
						<?php if($this->session->flashdata('error')):?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif;?>
						<div class="card-body">
							<?php if($detailProjets != false):?>
								<?php foreach($detailProjets as $pro):?>
									<form class="form" action="<?php echo base_url();?>Admin/Projets/modificationImage" method="post" enctype="multipart/form-data">
										<div class="row">
											<input type="hidden" name="token" value="<?php echo $pro->token;?>">
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
										</div>
									</form>
								<?php endforeach;?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- // Basic multiple Column Form section end -->
</div>
