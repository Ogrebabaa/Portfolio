<?php

?>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#">Revenir au portfolio</a>
        </li>
    </ul>
</header>
<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            Veille technologique
                        </a>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-secondary">Messages</h1>
            </div>

            <div class="accordion" id="acc_container">

                <?php
                    $index = 0;
                    foreach($arr_messages as $message) {
                        $sender = $message["email_contact"];
                        $date = $message["date"];
                        $obj = $message["objet"];
                        $contenu = $message["contenu"];
                        $msg_acc_content = '
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="acc_item'.$index.'">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse'.$index.'" aria-expanded="true" aria-controls="collapse'.$index.'">
                                <p>
                                    <strong>De : </strong> '.$sender.'
                                    <br>
                                    <strong>Le : </strong> '.$date.'
                                    <br>
                                    <strong>Objet : </strong> '.$obj.'
                                </p>
                            </button>
                        </h2>
                        <div id="collapse'.$index.'" class="accordion-collapse collapse show" aria-labelledby="acc_item'.$index.'"
                            data-bs-parent="#acc_container">
                            <div class="accordion-body">
                                '.$contenu.'
                                
                            </div>
                        </div>
                    </div>';
                        echo $msg_acc_content;
                        $index++;
                    }
                ?>
                

            </div>
        </main>
    </div>
</div>