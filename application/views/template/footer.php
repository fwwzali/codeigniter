   </main>
  </div>
</div>


    <script src="<?php echo base_url(); ?>assets/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/dashboard.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>
</html>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin untuk menghapus data yang dipilih?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirm">Hapus Data</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    var to_go=null;

    $('.delete').click(function(){
        to_go = $(this).attr("data-href");
       //alert(to_go);
    });

    $('#confirm').click(function () {
        window.location.replace(to_go);
    });

</script>