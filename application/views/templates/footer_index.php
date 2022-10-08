 <!-- Footer -->
 <footer class="sticky-footer bg-white">
     <div class="container my-auto">
         <div class="copyright text-center my-auto">
             <span>Copyright &copy; Sari Good Bakery <?= date('Y'); ?></span>
         </div>
     </div>
 </footer>
 <!-- End of Footer -->

 </div>
 <!-- End of Content Wrapper -->

 </div>
 <!-- End of Page Wrapper -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Logout Modal-->
 <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"></span>
                 </button>
             </div>
             <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap core JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
 <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

 <!-- Core plugin JavaScript-->
 <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

 <!-- Custom scripts for all pages-->
 <script src="<?= base_url('assets/'); ?>/js/sb-admin-2.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/chart.js/Chart.bundle.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/chart.js/Chart.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/js/demo/datatables-demo.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/buttons-2.2.3/js/dataTables.buttons.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/buttons-2.2.3/js/buttons.bootstrap4.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/JSZIP-2.5.0/jszip.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/pdfmake-0.1.36/pdfmake.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/pdfmake-0.1.36/vfs_fonts.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/buttons-2.2.3/js/buttons.html5.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/buttons-2.2.3/js/buttons.print.min.js"></script>
 <script src="<?= base_url('assets/'); ?>/vendor/datatables/buttons-2.2.3/js/buttons.colVis.min.js"></script>

 <script>
     $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
     });

     $(document).ready(function() {
         $('#example').DataTable();
     });

     $(document).ready(function() {
         $('#example').DataTable();
         $('#dataTables-example').DataTable();
         $('#dataTables-example2').DataTable();
         $('#dataTables-example3').DataTable();
         $('#dataTables-example4').DataTable();
         $('#dataTables-example5').DataTable();
     });
 </script>
 </body>

 </html>