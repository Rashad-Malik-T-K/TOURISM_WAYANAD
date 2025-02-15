<div class="container-fluid px-5 d-none d-lg-block" style="background-color: #137b18;">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <!-- <a href="{{ route('register') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="{{ route('login') }}"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a> -->
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="/login" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="/login" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="/login" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <!-- <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a> -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-power-off me-2"></i> Log Out
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
