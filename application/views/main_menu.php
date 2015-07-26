<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="http://mynemo.umt.edu.my/cencikutxxyyzz.php?kp=<?=$_SESSION['icno']?>" width="50px" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=substr($_SESSION['STAFF'],0,20)?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
         <!-- rahim <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div> 
          </form>-->
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!--<li class="header">MAIN NAVIGATION</li> -->
			<li>
              <a href="<?=base_url()?>index.php/admin">
                <i class="fa fa-th"></i> <span>Utama</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            <li class="treeview active">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Penilaian</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li class="active"><a href="<?=base_url()?>index.php/admin/all_aduan"><i class="fa fa-circle-o"></i>Penilaian Prestasi</a></li>
              </ul>
            </li>
           
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-pie-chart"></i>
                <span>Statistik</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?=base_url()?>index.php/admin/stat_by_jenis"><i class="fa fa-circle-o"></i>Mengikut Jenis Aduan</a></li>
                
              </ul>
            </li>
            

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>