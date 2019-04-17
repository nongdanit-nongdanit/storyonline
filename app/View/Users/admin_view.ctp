<div id="toolbar-box">
    <div class="t"> <!-- Boder Top -->
        <div class="t">
            <div class="t"></div>
        </div>
    </div> <!-- End Top -->
    
    <div class="m"><!-- Boder Medium -->
        <div class="toolbar-title">Chi tiết User</div>
        <div class="toolbar" id="toolbar">
            <div class="toolbar-button">
                     <?php
                    $image = $this->App->image('icon-32-cancel.png', array('alt'=>'Back'));
                    echo $this->Html->link($image, array('admin'=>true, 'controller'=>'users', 'action'=>'index'), array('escape'=>false));
                ?><br />
                    Trở lại danh sách 
            </div>
        </div>
        <div class="header icon-48-icon-48-install"></div>
        <div class="clr"></div>
    </div> <!-- Boder End Medium -->
    
    <div class="b"> <!-- Boder Bottom -->
        <div class="b">
            <div class="b"></div>
        </div>
    </div><!-- Boder end Bottom -->
</div>

<div id="element-box">
    <div class="t">
        <div class="t">
            <div class="t"></div>
        </div>
    </div>
    <div class="m">
        <div id="adminfieldset">
            <div class="adminheader">Chi tiết User</div>
            <div id="row">
                <div class="label">Username:  </div>
                <div class="row">                        
                    <?php echo $user['User']['username']; ?>
                </div>
            </div>
            <div id="row">
                <div class="label">Họ tên:  </div>
                <div class="row">
                    <?php echo $user['User']['name']; ?>
                </div>
            </div>
            <div id="row">
                <div class="label">Email: </div>
                <div class="row">
                    <?php echo $user['User']['email']; ?>
                </div>
            </div>
            <div id="row">
                <div class="label">Quyền: </div>
                <div class="row">
                    <?php echo $user['Role']['name']; ?>
                </div>
            </div>
            <div id="row">
                <div class="label">Ngày giờ khởi tạo: </div>
                <div class="row">
                    <?php echo $user['User']['date_created']; ?>
                </div>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div class="b">
        <div class="b">
            <div class="b"></div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript">
    $(function(){
        $('#linkUpdate').click(function(){
            document.forms['appForm'].submit();
        });
    });
    
</script>