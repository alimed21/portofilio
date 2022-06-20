<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Ajout d'un menu</h3>
            </div>
        </div>
    </div>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulaire d'ajout d'un menu</h4>
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
                            <form class="form" action="<?php echo base_url();?>Admin/Menus/verificationAjout" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Menu</label>
                                            <input type="text" id="menu" name="menu" class="form-control" placeholder="Saisissez le nom du menu">
                                            <span class="messageErreur">
                                                <?php echo form_error('menu'); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Lien externe</label>
                                            <input type="text" id="lien" name="lien" class="form-control" placeholder="Saisissez le lien externe du menu">
                                            <span class="messageErreur">
                                                <?php echo form_error('lien'); ?>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Ordre</label>
                                            <input type="number" id="ordre" name="ordre" class="form-control" placeholder="Saisissez l'ordre">
                                            <span class="messageErreur">
                                                <?php echo form_error('ordre'); ?>
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