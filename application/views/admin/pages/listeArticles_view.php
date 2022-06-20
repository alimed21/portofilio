<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des articles</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>Admin/Articles/ajoutArticle">
                                    <button class="btn btn-primary rounded-pill">
                                        Ajouter un article
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
						<?php if (isset($error_message)) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $error_message; ?>
							</div>
						<?php } ?>
                        <?php if($this->session->flashdata('success')):?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif;?>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Contenu</th>
                                <th>Date</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($articles != NULL):?>
                                <?php foreach($articles as $art):?>
                                    <tr>
                                        <td><?php echo $art->article_title;?></td>
                                        <td><?php echo $art->slide_descrip;?></td>
                                        <td><?php echo $art->article_date;?></td>
                                        <td>
                                        <a href="<?php echo base_url();?>uploads/article/<?php echo $art->article_image_path;?>" rel="lightbox"><i class="fa fa-eye" style="color:green"></i></a>
                                           |
                                           <a href="<?php echo base_url();?>Admin/Articles/ModifierImage/<?php echo $art->token;?>">
                                               <i class="fa fa-edit"></i>
                                           </a>
                                        </td>

                                        <td>
                                            <a href="<?php echo base_url();?>Admin/Articles/modifierArticle/<?php echo $art->token;?>">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                           |
                                           <a href="<?php echo base_url();?>Admin/Articles/supprimerArticle/<?php echo $art->token;?>">
                                               <i class="fa fa-trash" style="color: red;"></i>
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
