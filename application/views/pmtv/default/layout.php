<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php $controller->view('page/head', $data); ?>
</head>

<body>
    <?php $controller->view('page/header', $data); ?>
    <?php $controller->view('page/navbar', $data); ?>

    <main>
        <div class="background-wrapper">
            <div class="container mt-4">
                <div class="row g-3">
                    <div class="col-12 col-md-9">
                        <?php $controller->view($view, $data);?>
                    </div>
                    <div class="col-12 col-md-3">
                        <?php $controller->view('page/sidebar', $data); ?>

                    </div>
                </div>
            </div>

        </div>
    </main>
    <?php $controller->view('page/footer', $data); ?>
</body>

</html>