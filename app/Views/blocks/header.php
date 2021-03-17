<!DOCTYPE html>
<html lang="en" >
<head>

<!-- META ============================================================= -->

<meta charset="UTF-8">
<meta name="description"
    content="Je suis développeur WEB Freelance et étudiant en Informatique, venez découvrir mes réalisations !">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="google-site-verification" content="Io9EeR_IDcDV5tFeCb6uDY0nz36NvvOR39R484rs52M" />

<!-- META ============================================================= -->

<!-- LINK ============================================================= -->
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/CSS/style.css">
<script src="https://kit.fontawesome.com/f922a2e803.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/CSS/responsive.css">

<!-- LINK ============================================================= -->
<!-- FONTS ============================================================= -->

<link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

<!-- FONTS ============================================================= -->

<title>
    <?php echo lang($pageTitle."_lang.pageTitle") ;  ?>
</title>

</head>

<body>
    <div id="particles-js"></div>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <script>
        particlesJS.load("particles-js", "http://localhost:8888/portfolio/Portfolio/public/particles.json", function () {
            console.log("callback - particles.js config loaded");
        });
        var base_url = "<?php echo base_url(); ?>";
    </script>
    <div class="loading_screen">
        <span class="loading_screen--dot is-animate-growing"></span>
        <span class="loading_screen--dot is-animate-growing"></span>
        <span class="loading_screen--dot is-animate-growing"></span>
    </div>
