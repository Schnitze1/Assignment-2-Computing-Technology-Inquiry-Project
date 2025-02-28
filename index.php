<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Home | Auris AI</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>

<body>
<!-- Header section -->
<?php include_once("header.inc"); ?>

<!-- Introduction section -->
<section class="intro-content">
    <div class="intro-content-wrapper">
        <!-- Main heading and background video -->
        <h1 class="intro-content-heading">Use Auris for <br> AI-Assisted <br> Enterprise <br> Architecture</h1>
        <video autoplay muted loop class="intro-content-video">
            <source src="./images/b2b-animation.mp4" type="video/mp4">
            <track kind="captions">
        </video>
        <!-- Subheading description -->
        <h2 class="content-subheading">Auris's Generative Augmented Retrieval (GAR) <br> toolkit allows LLMs to generate queries through text generation to <br> accurately generate responses and solve tasks using enterprise data <br> without external resources as supervision. </h2>
    </div>
</section>

<!-- Navigation section -->
<?php include_once("menu.inc"); ?>

<!-- Features section -->
<section class="features-container">
    <div class="gallery-wrapper">
        <!-- Company information and image gallery slider -->
        <h1>Our Company</h1>
        <!-- Image gallery slider -->
        <div class="feature-image-gallery">
            <div class="feature-gallery-assset">
                <!-- Images in the gallery -->
                <img id="slide-1" src="./images/gallery_image1.png" alt="Office Space Photo">
                <img id="slide-2" src="./images/gallery_image2.png" alt="Research">
                <img id="slide-3" src="./images/gallery_image3.png" alt="Company Policy">
            </div>
            <!-- Navigation for gallery -->
            <div class="feature-gallery-nav">
                <a href="#slide-1" class="slide1" aria-label="Slide 1"></a>
                <a href="#slide-2" class="slide2" aria-label="Slide 2"></a>
                <a href="#slide-3" class="slide3" aria-label="Slide 3"></a>
            </div>
        </div>
    </div>
    <!-- Company details and application section -->
    <div class="feature-apply-container">
        <h1>Apply Today</h1>
        <p>Auris is a research company based in Melbourne. <br> Together, we generate research and create reliable, <br> AI systems.</p>
        <a href="https://youtu.be/J5Ew3ihGjlk">Website Tour Video (YouTube)</a>
        <br><br>
        <!-- Button to apply -->
        <a href="apply.php" class="button-black">Join Us</a>
    </div>
</section>

<!-- Footer section -->
<?php include_once("footer.inc"); ?>
</body>
</html>