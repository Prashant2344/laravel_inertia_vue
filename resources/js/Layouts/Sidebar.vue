<script setup>
import './style.scss';
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"> <a class="waves-effect waves-dark" href="javascript:void(0)"
                            aria-expanded="false"><img src="../../../public/assets/images/users/1.jpg" alt="user-img"
                                class="img-circle"><span class="hide-menu">Mark Jeckson</span></a>
                        <!-- <ul aria-expanded="false" class="collapse">
                            <li><a href="javascript:void(0)"><i class="ti-user"></i> My Profile</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-wallet"></i> My Balance</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-email"></i> Inbox</a></li>
                            <li><a href="javascript:void(0)"><i class="ti-settings"></i> Account Setting</a></li>
                            <li><a href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul> -->
                    </li>

                    <li> <Link class="waves-effect waves-dark" href="/" aria-expanded="false"><i
                                class="icon-speedometer"></i><span class="hide-menu">Dashboard </span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/services/categories" aria-expanded="false"><i
                                class="ti-id-badge"></i><span class="hide-menu">Service Category</span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/services/types" aria-expanded="false"><i
                                class="ti-id-badge"></i><span class="hide-menu">Service Type</span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/workers" aria-expanded="false"><i
                                class="ti-id-badge"></i><span class="hide-menu">Workers</span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/customers" aria-expanded="false"><i
                                class="ti-user"></i><span class="hide-menu">Customers</span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/selectdropdown" aria-expanded="false"><i
                                class="ti-email"></i><span class="hide-menu">Appointment</span></Link>
                    </li>
                    <li> <Link class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
                                class="ti-palette"></i><span class="hide-menu">Profile </span></Link>
                    </li>
                    <li> <Link class="waves-effect waves-dark" href="/logout" aria-expanded="false"><i class="fa fa-power-off"></i>
                        <span class="hide-menu">Logout</span></Link>
                    </li>
                    
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
</template>