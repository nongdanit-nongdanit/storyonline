<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php if($current_user['role_id']==2){?>
                    <a class="navbar-brand">Manage</a>
                <?php }else{?>
                <a class="navbar-brand" target="_blank" href="/">Truyenweb.info</a>
                <?php }?>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <?=$this->html->link('<i class="fa fa-user fa-fw"></i> User Profile',array(),array('escape'=>false))?>
                        </li>
                        <li>
                            <?=$this->html->link('<i class="fa fa-gear fa-fw"></i> Change Password',array('controller'=>'users','action'=>'changePass','admin'=>true,$current_user['id']),array('escape'=>false))?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <?=$this->html->link('<i class="fa fa-sign-out fa-fw"></i>Logout',array('controller'=>'users','action'=>'logout'),array('escape'=>false))?>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">                        
                        <!--<li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>-->
                        <?php //echo $this->action?>  
                        <?php if($current_user['role_id']==1){?>
                        <li>
                            <a style="<?php echo ($this->params['controller'] =='generals' && $this->action =='admin_dashboard') ? 'background-color: #EF9595;' : ''?>" href="/admin/generals/dashboard"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a style="<?php echo ($this->params['controller'] =='generals' && $this->action =='admin_index') ? 'background-color: #EF9595;' : ''?>" href="/admin/generals"><i class="fa fa-files-o fa-fw"></i> Thông tin chung<span class="fa arrow"></span></a>
                        </li>

                        <li class="<?php echo ($this->params['controller'] =='categories') ? 'active' : ''?>">
                            <a style="<?php echo ($this->params['controller'] =='categories') ? 'background-color: #EF9595;' : ''?>" href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Danh mục<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?=$this->html->link('Danh sách',array('admin'=>true,'controller'=>'categories','action'=>'index'),array('style'=>($this->params['controller'] =='categories' && $this->action =='admin_index') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Thêm',array('admin'=>true,'controller'=>'categories','action'=>'add'),array('style'=>($this->params['controller'] =='categories' && $this->action =='admin_add') ? 'color:red' : ''))?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>                        
                        
                        <li class="<?php echo ($this->params['controller'] =='articles') ? 'active' : ''?>">
                            <a style="<?php echo ($this->params['controller'] =='articles') ? 'background-color: #EF9595;' : ''?>" href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Cập nhật truyện<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?=$this->html->link('Danh sách Articles',array('admin'=>true,'controller'=>'articles','action'=>'index'),array('style'=>($this->params['controller'] =='articles' && $this->action =='index') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Cập nhật chap',array('admin'=>true,'controller'=>'articles','action'=>'add'),array('style'=>($this->params['controller'] =='articles' && $this->action =='add') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Cập nhật Articles',array('admin'=>true,'controller'=>'articles','action'=>'dstruyen'),array('style'=>($this->params['controller'] =='articles' && $this->action =='dstruyen') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Lấy Truyện tranh',array('admin'=>true,'controller'=>'articles','action'=>'cloneOneUrl'),array('style'=>($this->params['controller'] =='articles' && $this->action =='cloneOneUrl') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Lấy dữ liệu trong session',array('admin'=>true,'controller'=>'articles','action'=>'insertSession'),array('style'=>($this->params['controller'] =='articles' && $this->action =='insertSession') ? 'color:red' : ''))?>
                                </li>
<li>
                                    <?=$this->html->link('Cập nhật danh sach truyện tranh',array('admin'=>true,'controller'=>'articles','action'=>'updateliststory'),array('style'=>($this->params['controller'] =='articles' && $this->action =='updateliststory') ? 'color:red' : ''))?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li class="<?php echo ($this->params['controller'] =='articles') ? 'active' : ''?>">
                            <a style="<?php echo ($this->params['controller'] =='articles') ? 'background-color: #EF9595;' : ''?>" href="#"><i class="fa fa-bar-chart-o fa-fw"></i> thichtruyentranh<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?=$this->html->link('Clone từng chap',array('admin'=>true,'controller'=>'articles','action'=>'clonethichtruyentranh'),array('style'=>($this->params['controller'] =='articles' && $this->action =='clonethichtruyentranh') ? 'color:red' : ''))?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <?php }?>

                        <li class="<?php echo ($this->params['controller'] =='candidates') ? 'active' : ''?>">
                            <a style="<?php echo ($this->params['controller'] =='candidates') ? 'background-color: #EF9595;' : ''?>" href="#"><i class="fa fa-user fa-fw"></i> Candidates<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <?=$this->html->link('List',array('admin'=>true,'controller'=>'candidates','action'=>'index'),array('style'=>($this->params['controller'] =='candidates' && $this->action =='admin_index') ? 'color:red' : ''))?>
                                </li>
                                <li>
                                    <?=$this->html->link('Add',array('admin'=>true,'controller'=>'candidates','action'=>'add'),array('style'=>($this->params['controller'] =='candidates' && $this->action =='admin_add') ? 'color:red' : ''))?>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li> 
                        <!-- /.nav-second-level -->
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>