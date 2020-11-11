<?php
/*
 * Template Name: Online
 * 
 * */
get_header();
?>

    <section id="in_work" class="container online-container">
        <div class="booking-foure">
            <div class="booking-title dicor">
                <div class="needle"><h1>В разработке</h1>
                </div>
                <div class="line-1">
                </div>

            </div>
        </div>
    </section>


    <script>
        $(document).ready(function () {
            $('.booking-slider').slick({
                infinite: true,
                prevArrow: $('.arrow-right'),
                nextArrow: $('.arrow-left')
            });
        });
    </script>
<?php
get_footer();
