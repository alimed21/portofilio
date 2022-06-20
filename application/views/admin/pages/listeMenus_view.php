<div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Liste des menus</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>Admin/Menu/ajoutMenu">
                                    <button class="btn btn-primary rounded-pill">
                                        Ajouter un menu
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
                                <th>Lien externe</th>
                                <th>Order</th>
                                <th>Etat</th>
                                <th>Ajouter le</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($menus != NULL):?>
                                <?php foreach($menus as $m):?>
                                    <tr>
                                        <td><?php echo $m->menu_name;?></td>

                                        <td>
                                            <?php if($m->lien_externe != ''):?>
                                                <?php echo $m->lien_externe;?>
                                            <?php else:?>
                                                Pas de lien
                                            <?php endif;?>
                                        </td>

                                        <td>
                                            <?php echo $m->Order_menu;?>
                                        </td>

                                        <td>
                                            <?php if($m->Order_menu == "0"):?>
                                                <a href="<?php echo base_url();?>Admin/Menus/desactiverMenu/<?php echo $m->id_menu;?>">
                                                    Désactiver
                                                </a>
                                            <?php else:?>
                                                <a href="<?php echo base_url();?>Admin/Menus/activerMenu/<?php echo $m->id_menu;?>">
                                                    Activer
                                                </a>
                                            <?php endif;?>
                                        </td>
                                        
                                        <td>
                                            <?php echo $m->date_saisie;?>
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