<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des pages</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>Admin/Pages/ajoutPage">
                                    <button class="btn btn-primary rounded-pill">
                                        Ajouter une page
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
                        <?php if($this->session->flashdata('success')):?>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php endif;?>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Lien</th>
                                <th>Image</th>
                                <th>Ajouter le </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($pages != NULL):?>
                                <?php foreach($pages as $pa):?>
                                    <tr>
                                        <td><?php echo $pa->PageTitre;?></td>
                                        <td><?php echo $pa->page_lien;?></td>
                                        <td>
                                        <a href="<?php echo base_url();?>uploads/pages/<?php echo $pa->userfile;?>" rel="lightbox"><i class="fa fa-eye"></i></a>
                                           |
                                           <a href="#">
                                               <i class="fa fa-edit"></i>
                                           </a>
                                        </td>
                                        <td>
                                            <?php echo $pa->date_add;?>
                                        </td>
                                        <td>
                                            <a href="#" target="_blank">
                                                <i class="fa fa-edit">
                                                </i>
                                            </a>
                                           |
                                           <a href="#">
                                               <i class="fa fa-trash"></i>
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