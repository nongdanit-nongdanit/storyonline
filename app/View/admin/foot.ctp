<div class="ajax-loader">
    <?php echo $this->Html->image('loading.gif');?>
</div>
<script>
    $(document).ready(function() {
        //$("#flashMessage").hide(4000);
        $('#dataTables-example').dataTable({
            "ordering": false,
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]],
            
        });
    });
</script>