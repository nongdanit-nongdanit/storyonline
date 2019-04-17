<script type="text/javascript">
$(document).ready(function () {
    $('#CandidatePhone').keyup(function() {
        var val = this.value.replace(/\D/g, '');
        var newVal = '';
        var length = val.length;
        if(length >= 10){
        	if(length == 10){
          	newVal += val.substr(0, 4) + '-';
            val = val.substr(4);
          }
          if(length >= 11){
          	newVal += val.substr(0, 5) + '-';
            val = val.substr(5);
          }
          while (val.length > 3) {
            newVal += val.substr(0, 3) + '-';
            val = val.substr(3);
          }
        }
        newVal += val;
        this.value = newVal;
    });
    $("#phone").on("blur", function() {
        var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

        if( last.length == 3 ) {
            var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
            var lastfour = move + last;

            var first = $(this).val().substr( 0, 9 );

            $(this).val( first + '-' + lastfour );
        }
    });
})
</script>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title_for_layout; ?><button onclick="window.location.href='/admin/candidates/index'" style="float: right;" type="button" class="btn btn-primary">List</button></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Edit candidates
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-9">
                            <?php echo $this->Form->create(array('id'=>'appForm', 'inputDefaults'=>array('label'=>false, 'div'=>false)));
                             
                             ?>
                                <div class="form-group">
                                    <label>Name</label>
                                    <?php echo $this->Form->input('name', array('class'=>'form-control')); ?>   
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <?php echo $this->Form->input('email', array('class'=>'form-control')); ?>
                                </div>

                                <!--<div class="form-group">
                                    <label>Birthday</label>
                                    <?php echo $this->Form->input('birthday', array('class'=>'form-control', 'type'=> 'text')); ?>
                                </div>-->
                                <div class="form-group">
                                    <label>Phone</label>
                                    <?php echo $this->Form->input('phone', array('class'=>'form-control', 'maxlength'=> 13)); ?>
                                </div> 
                                <div class="form-group">
                                    <label>Area</label>
                                    <?php $options = array('1' => 'Northern', '2' => 'Central', '3'=> 'Southern'); 
                                        echo $this->Form->select('area', $options, array('class'=>'form-control','empty'=>false,'default'=>3));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <?php echo $this->Form->input('address', array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <?php echo $this->Form->input('title', array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <?php
                                        $options = array('1' => 'Male', '0' => 'Female');
                                        echo $this->Form->select('gender', $options, array('class'=>'form-control','empty'=>false));
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label>Company</label>
                                    <?php echo $this->Form->input('company', array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label>Last Company</label>
                                    <?php echo $this->Form->input('company2', array('class'=>'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <label>Note</label>
                                    <?php 
                                    echo $this->Form->textarea('note', array('class'=>'form-control ckeditor','id'=>'note'));
                                    ?>
                                </div>
                                <button id="linkUpdate" type="submit" class="btn btn-default">Save</button>
                            <?php echo $this->Form->end();?>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>