<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des Compétences</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>Admin/Competences/ajoutComptence">
                                    <button class="btn btn-primary rounded-pill">
                                        Ajouter une Compétence
                                    </button>
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table class="table" id="table1">
						<?php if($this->session->flashdata('error')):?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('error'); ?>
							</div>
						<?php endif;?>
                        <?php if($this->session->flashdata('success')):?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif;?>
						<?php if (isset($error_message)) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $error_message; ?>
							</div>
						<?php } ?>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Taille</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($competences != NULL):?>
                                <?php foreach($competences as $cmp):?>
                                    <tr>
                                        <td><?php echo $cmp->titre_cmp;?></td>
                                        <td><?php echo $cmp->taille_cmp;?></td>
                                       
                                        <td>
                                            <a href="<?php echo base_url();?>Admin/Projets/modifierProjet/<?php echo $cmp->id_cmp;?>">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                           |
                                           <a href="<?php echo base_url();?>Admin/Projets/supprimerProjet/<?php echo $cmp->id_cmp;?>">
                                               <i class="fa fa-trash" style="color:red"></i>
                                           </a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                            <?php endif;?>
                         
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
