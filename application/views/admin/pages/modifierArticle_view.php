<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Modification d'un article</h3>
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
							<form class="form" action="<?php echo base_url();?>Admin/Articles/modificationArticle" method="post">
								<?php if($articlesDetail != false):?>
									<div class="row">
										<?php foreach($articlesDetail as $art):?>
											<input type="hidden" name="token" value="<?php echo $art->token;?>">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="last-name-column">Titre</label>
													<input type="text" id="titre" name="titre" class="form-control" value="<?php echo $art->article_title;?>">
													<span class="messageErreur">
													<?php echo form_error('titre'); ?>
												</span>
												</div>
											</div>
	
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="first-name-column">Date</label>
													<input type="date" id="date_art" name="date_art" class="form-control" value="<?php echo $art->article_date;?>">
													<span class="messageErreur">
													<?php echo form_error('date_art'); ?>
												</span>
												</div>
											</div>
	
											<div class="col-md-12 col-12">
												<div class="form-group">
													<label for="city-column">Description</label>
													<textarea class="form-control" name="description" id="editor" rows="10">
														<?php echo $art->article_content;?>
													</textarea>
													<span class="messageErreur">
													<?php echo form_error('description'); ?>
												</span>
												</div>
											</div>
											<div class="col-12 d-flex justify-content-end">
												<button type="submit" class="btn btn-primary me-1 mb-1">Modifier</button>
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
