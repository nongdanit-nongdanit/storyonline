<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog login">
        <div class="modal-content clearfix">
            <div class="modal-header">
                <button onclick="displayMess();" type="button" class="close" data-dismiss="modal">
                <span style="font-size: 25px;" aria-hidden="true" class="font-thin h1">×</span>
                <span class="sr-only font-thin">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Thông báo</h4>
            </div>
            <div class="modal-body">
                <div style="line-height:20px" id="msg"><?php echo h($message); ?><center><div class="dk-bt"><button onclick="displayMess();" id="btnOK">OK</button></div></center></div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade in"></div>