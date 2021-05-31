 <style>
/* Style The Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 250px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 10px 56px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
    background-color: #D5D6D5
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

 </style>

 <!-- BEGIN SIDEBAR -->
 <div class="page-sidebar" id="main-menu">
     <!-- BEGIN MINI-PROFILE -->
     <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
         <div class="user-info-wrapper">
             <div class="profile-wrapper" style="border:solid #fff 1px;"> <img src="../assets/img/admin.png" alt=""
                     data-src="../assets/img/admin.png" data-src-retina="../assets/img/admin.png" width="69"
                     height="69" /> </div>

             <div class="user-info">
                 <div class="greeting" style="font-size:14px;">Bienvenido/a</div>
                 <div class="username" style="font-size:12px;"><?php echo $_SESSION['name_admin'];?></div>
                 <div class="status" style="font-size:10px;"><a href="#">
                         <div class="status-icon green"></div>
                         Conectado
                     </a></div>
             </div>
         </div>
         <!-- END MINI-PROFILE -->
         <!-- BEGIN SIDEBAR MENU -->
         <p class="menu-title"><span class="pull-right"><a href="javascript:;"><i class=""></i></a></span></p>

         <ul>
             <li class="start"> <a href="home.php"> <i class="icon-custom-home"></i> <span
                         class="title">Escritorio</span></a></li>
             <li><a href="dashboard-admin.php"><span class="fa fa-bullseye"></span> Leads</a></li>
             <li><a href="change-password.php"><span class="fa fa-file-text"></span> Cambiar contraseña</a></li>
             <li class="dropdown" ><a href="manage-users.php"><span class=" dropdown fa fa-user fa-fw"></span> Usuarios</a>
             <div class="dropdown-content">
                     <a href="manage-users-admin.php"><span class="fa fa-users"></span>   <b>Administradores</b></a>
                     <a href="manage-users-supervisor.php"><span class="fa fa-users"></span>   <b>Supervisores</b></a>
                 </div>
             
             </li>

             <li><a href="reports.php"><span class="fa fa-book fa-fw"></span> Reportes</a></li>
             <!--<li><a href="manage-quotes.php"> <span class="fa fa-tasks"></span> Manage Quotes</a></li>-->
             <li><a href="manage-warehouse.php"> <span class="fa fa-flag"></span> Locales</a></li>
             <li><a href="manage-status.php"> <span class="fa fa-check-circle"></span> Estados</a></li>
             <li><a href="manage-contacts.php"> <span class="fa fa-users"></span> Contactos</a></li>
             <li><a href="manage-campaing.php"> <span class="fa fa-tasks"></span> Campañas</a></li>
             <li><a href="user-access-log.php"><span class="fa fa-shield"></span>&nbsp;&nbsp;Log Acceso de Usuarios</a></li>
             <!--<li><a href="logout.php"> <span class="fa fa-power-off"></span> Cerrar Sesion</a></li>-->
             <!--<li><hr></li>
             <li><a href="manage-contacts.php"> <span class="fa fa-users"></span> Administradores</a></li>
             <li><a href="manage-contacts.php"> <span class="fa fa-users"></span> Supervisores</a></li>-->


         </ul>