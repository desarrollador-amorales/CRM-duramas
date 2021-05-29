  <!-- BEGIN SIDEBAR -->
 <div class="page-sidebar" id="main-menu">
     <!-- BEGIN MINI-PROFILE -->
     <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
         <div class="user-info-wrapper">
             <div class="profile-wrapper"> <img src="../assets/img/supervisor.png" alt="" data-src="../assets/img/supervisor.png"
                     data-src-retina="../assets/img/supervisor.png" width="69" height="69" /> </div>
             <div class="user-info">
                 <div class="greeting" style="font-size:14px;">Bienvenido/a</div>              
                     <div class="username" style="font-size:12px;"><?php echo $_SESSION['name_supervisor'];?></div>
                 <div class="status" style="font-size:10px;"><a href="#">
                         <div class="status-icon green"></div>
                         Conectado
                     </a></div>
             </div>
         </div>
         <!-- END MINI-PROFILE -->
         <!-- BEGIN SIDEBAR MENU -->
         <p class="menu-title"><span class="pull-right"><a href="javascript:;" class="reload"><i
                         class=""></i></a></span></p>

         <ul>
             <li class="start"> <a href="dashboard-supervisor.php"> <i class="icon-custom-home"></i> <span
                         class="title">Escritorio</span> <span class="selected"></span> </a>
             </li>

             <li><a href="change-password.php"><span class="fa fa-file-text-o"></span> Cambiar Contraseña</a></li>
             <li><a href="profile.php"><span class="fa fa-user"></span> Perfil</a></li>
             <li><a href="logout.php"> <span class="fa fa-power-off"></span> Cerrar Sesion</a></li>
            
            <!--
             <li><a href="get-quote.php"> <span class="fa fa-tasks"></span> Request a Quote</a></li>
             <li><a href="create-ticket.php"><span class="fa fa-ticket"></span> Create Ticket</a></li>
             <li><a href="view-tickets.php"><span class="fa fa-ticket"></span> View Ticket</a></li> -->

         </ul>