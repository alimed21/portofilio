<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ajout d'une compétence</h3>
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulaire des compétences</h4>
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
                            <form class="form" action="<?php echo base_url();?>Admin/Competences/verificationAjout" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Titre</label>
                                            <input type="text" id="titre" name="titre" class="form-control" placeholder="Saisissez le titre du compétence">
                                            <span class="messageErreur">
                                                <?php echo form_error('titre'); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Taille</label>
                                            <input type="number" id="tail" name="tail" class="form-control">
                                            <span class="messageErreur">
                                                <?php echo form_error('tail'); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Ajouter</button>
                                        <button type="reset" class="btn btn-light-danger me-1 mb-1">Annuler</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>