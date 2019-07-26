<ul class="sidebar-menu" data-widget="tree">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->

    <li class="active">
        <router-link to="/"
            ><i class="fa fa-dashboard"></i> Dashboard</router-link
        >
        <!-- <a href="#/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a> -->
    </li>

    <li class="treeview">
        <a href="#"
            ><i class="fa fa-link"></i> <span>Envios</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <router-link to="/paquete-index"
                    ><i class="fa fa-eye"></i> Mis envios</router-link
                >
            </li>
            <li>
                <router-link to="/paquete-crear"
                    ><i class="fa fa-pencil"></i> Crear envio</router-link
                >
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"
            ><i class="fa fa-link"></i> <span>Producto</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <router-link to="/producto-lista"
                    ><i class="fa fa-eye"></i> Lista</router-link
                >
            </li>
            <li>
                <router-link to="/producto-crear"
                    ><i class="fa fa-pencil"></i> Crear producto</router-link
                >
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#"
            ><i class="fa fa-link"></i> <span>Configuracion</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <router-link to="/cliente-crear"
                    ><i class="fa fa-pencil"></i> Crear Cliente</router-link
                >
                <router-link to="/cliente-lista"
                    ><i class="fa fa-eye"></i> Lista Cliente</router-link
                >
            </li>
        </ul>
    </li>
</ul>
