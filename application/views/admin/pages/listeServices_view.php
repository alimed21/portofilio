<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des services</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>Admin/Services/ajoutService">
                                    <button class="btn btn-primary rounded-pill">
                                        Ajouter un service
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
                                <th>Contenu</th>
                                <th>Image</th>
                                <th>Ajouter le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($services != NULL):?>
                                <?php foreach($services as $ser):?>
                                    <tr>
                                        <td><?php echo $ser->titre_ser;?></td>
                                        <td><?php echo $ser->slide_descrip;?></td>
                                        <td>
                                            <a href="<?php echo base_url();?>uploads/service/<?php echo $ser->image_ser;?>" rel="lightbox"><i class="fa fa-eye"></i></a>
                                           |
                                           <a href="#">
                                               <i class="fa fa-edit"></i>
                                           </a>
                                        </td>
                                        <td>
                                            <?php echo $ser->date_add;?>
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