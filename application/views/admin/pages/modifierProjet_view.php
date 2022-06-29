<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Modification d'un projet</h3>
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
						<?php if($this->session->flashdata('error')):?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif;?>
						<div class="card-body">
							<?php if($detailProjets != false):?>
								<?php foreach($detailProjets as $pro):?>
									<form class="form" action="<?php echo base_url();?>Admin/Projets/modificationProjet" method="post">
										<div class="row">
											<input type="hidden" name="token" value="<?php echo $pro->token;?>">
											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="last-name-column">Titre</label>
													<input type="text" id="titre" name="titre" class="form-control" value="<?php echo $pro->titre_pro;?>">
													<span class="messageErreur">
                                                <?php echo form_error('titre'); ?>
                                            </span>
												</div>
											</div>

											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="first-name-column">Date</label>
													<input type="date" id="date_art" name="date_art" class="form-control" value="<?php echo $pro->date_pro;?>">
													<span class="messageErreur">
                                                <?php echo form_error('date_art'); ?>
                                            </span>
												</div>
											</div>

											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="first-name-column">Etat</label>
													<select name="etat" id="etat" class="form-control">
														<?php if($pro->type == "En cour"):?>
															<option value="En cour" selected>En cour</option>
															<option value="Terminer">Terminer</option>
														<?php else:?>
															<option value="En cour">En cour</option>
															<option value="Terminer" selected>Terminer</option>
														<?php endif;?>
													</select>
													<span class="messageErreur">
                                                <?php echo form_error('etat'); ?>
                                            </span>
												</div>
											</div>

											<div class="col-md-6 col-12">
												<div class="form-group">
													<label for="last-name-column">Lien</label>
													<input type="text" id="lien" name="lien" class="form-control" value="<?php echo $pro->lien;?>">
													<span class="messageErreur">
                                                <?php echo form_error('lien'); ?>
                                            </span>
												</div>
											</div>

											<div class="col-md-12 col-12">
												<div class="form-group">
													<label for="city-column">Description</label>
													<textarea class="form-control" name="description" id="editor" rows="10">
														<?php echo $pro->contenu_pro;?>
													</textarea>
													<span class="messageErreur">
                                                <?php echo form_error('description'); ?>
                                            </span>
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
