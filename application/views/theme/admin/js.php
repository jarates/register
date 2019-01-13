<!-- jQuery  -->
        <script src="<?=base_url()?>/template/assets/js/jquery.min.js"></script>
        <script src="<?=base_url()?>/template/assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?=base_url()?>/template/assets/js/waves.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.slimscroll.js"></script>

        <script src="<?=base_url()?>/template/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/buttons.bootstrap4.min.js"></script>

        <script src="<?=base_url()?>/template/plugins/datatables/jszip.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/vfs_fonts.js"></script>

        <script src="<?=base_url()?>/template/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/buttons.print.min.js"></script>

        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.colVis.js"></script>
        <script src="<?=base_url()?>/template/plugins/datatables/dataTables.fixedColumns.min.js"></script>

        <!-- init -->
        <script src="<?=base_url()?>/template/assets/pages/jquery.datatables.init.js"></script>


        <!--Wysiwig js-->
        <script src="<?=base_url()?>/template/plugins/tinymce/tinymce.min.js"></script>

        <!-- App js -->
        <script src="<?=base_url()?>/template/assets/js/jquery.core.js"></script>
        <script src="<?=base_url()?>/template/assets/js/jquery.app.js"></script>

        <script>
            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    order: [[ 1, "desc" ]],
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();

        </script>
