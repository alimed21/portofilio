
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2021 &copy; Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                            href="http://ahmadsaugi.com">A. Saugi</a></p>
                </div>
            </div>
        </footer>
    </div>
</div>
    <script src="<?php echo base_url();?>assets/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/bootstrap.bundle.min.js"></script>
    
    <script src="<?php echo base_url();?>assets/admin/vendors/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/ckeditor/ckeditor.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/mazer.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/toastr.min.js"></script>

    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    
    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <!--lightbox-->
    <script src="<?php echo base_url();?>assets/admin/lightbox/dist/js/lightbox-plus-jquery.js"></script>

    <script src="<?php echo base_url();?>assets/admin/lightbox/dist/js/lightbox.js"></script>


    <!--
    <script src="<?php echo base_url();?>assets/admin/js/extensions/sweetalert2.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/vendors/toastify/toastify.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/extensions/toastify.js"></script>-->
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    
    <script>
        function save()
        {
            if($('#nom_cat').val() == "")  
            {  
                Swal.fire(
                    'Erreur',
                    "champ obligatoire, veuillez remplir",
                    'error'
                )
            }
            else{
                var url;
            
                url = "<?php echo base_url();?>Admin/Categories/ajoutCate";
            
                // ajax adding data to database
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#insert_form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success close modal and reload ajax table
                        $('#ajoutCat').modal('hide');
                        location.reload();// for reload a page
                       

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }

        function modifierCat(id)
        {
            //save_method = 'update';
            $('#update_form')[0].reset(); // reset form on modal
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('Admin/Categories/modifierCat')?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_cat"]').val(data[0].id_cat);
                    $('[name="nom_cat"]').val(data[0].nom_cat);
        
                    $('#modCat').modal('show'); // show bootstrap modal when complete loaded
                    //$('.modal-title').text('Edit Mobile'); // Set title to Bootstrap modal title
        
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function saveUpdate()
        {
            if($('#nom_cat').val() == "")  
            {  
                Swal.fire(
                    'Erreur',
                    "champ obligatoire, veuillez remplir",
                    'error'
                )
            } 
            else{
                var url;
            
                url = "<?php echo base_url();?>Admin/Categories/modificationCat";
            
                // ajax adding data to database
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#update_form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success close modal and reload ajax table
                        $('#modCat').modal('hide');
                        location.reload();// for reload a page
                       

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }

        function supCat(id)
        {
            if(confirm('Êtes-vous sûr de supprimer ces données ?'))
            {
                // ajax delete data from database
                $.ajax({
                    url : "<?php echo site_url('Admin/Categories/supprimerCat')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        location.reload();
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }
        
        function supSsCat(id){
            if(confirm('Êtes-vous sûr de supprimer ces données ?'))
            {
                // ajax delete data from database
                $.ajax({
                    url : "<?php echo site_url('Admin/Sous_Categories/supprimerSsCat')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        location.reload();
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }

        function bloquerClient(id){
            if(confirm('Êtes-vous sûr de bloquer ce client?'))
            {
                // ajax delete data from database
                $.ajax({
                    url : "<?php echo site_url('Admin/clients/bloquerClient')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        location.reload();
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }
        
        function debloquerClient(id){
            if(confirm('Êtes-vous sûr de vouloir débloquer ce client?'))
            {
                // ajax delete data from database
                $.ajax({
                    url : "<?php echo site_url('Admin/clients/debloquerClient')?>/"+id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        location.reload();
                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }

        function modCmd(id)
        {
            $('#update_cmd_form')[0].reset(); // reset form on modals
            //console.log(id);
            //Ajax Load data from ajax
            $.ajax({
                url : "<?php echo site_url('Admin/Commandes/modCmd/')?>" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="id_cmd"]').val(data[0].id_cmd);
        
                    $('#modEtat').modal('show'); // show bootstrap modal when complete loaded
                    //$('.modal-title').text('Edit Mobile'); // Set title to Bootstrap modal title
        
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }

        function saveModCmd(){
            var etat_cmd = $('#etat_cmd');

            if (etat_cmd.val() === '')
            {  
                Swal.fire(
                    'Erreur',
                    "champ obligatoire, veuillez choisir un champs",
                    'error'
                )
            } 
            else{
                var url;
            
                url = "<?php echo base_url();?>Admin/Commandes/modificationEtatCmd";
            
                // ajax adding data to database
                $.ajax({
                    url : url,
                    type: "POST",
                    data: $('#update_cmd_form').serialize(),
                    dataType: "JSON",
                    success: function(data)
                    {
                        //if success close modal and reload ajax table
                        $('#modEtat').modal('hide');
                        location.reload();// for reload a page
                       

                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        Swal.fire(
                            'Erreur',
                            "Veuillez réessayer",
                            'error'
                        )
                    }
                });
            }
        }
    </script>
</body>
</html>
