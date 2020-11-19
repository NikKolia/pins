<?php
/*
 * Template Name: Курсы1
 * 
 * */
get_header();
?>
    <section class="container course-main">
        <img src="<?php the_field('course_hero'); ?>" alt="">
    </section>
    <section class="course-container course-container--desktop courseContainerBg1">
            <?php $args = array(
                'post_type' => 'course',
                /* 'posts_per_page' => 10, */

            );
            $course = new WP_Query($args); ?>

            <?php
            $i = 0;
            while ($course->have_posts()) :
                $course->the_post();

                if ($i == 0) {
                    echo '<div class="container courseWrapper">';
                } ?>

                <div class="course-block">
                    <div class="needle-2"></div>
                    <a class="course-content" href="<?php the_permalink(); ?>">

                        <div class="course-title">
                            <h4><?php the_title(); ?></h4>
                            <!-- <div class="course-arrow">
                                       <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/mini-arrow-right.png"
                                            alt="">
                                   </div> -->
                            <div class="course-tumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'course'); ?>
                            </div>
                        </div>

                        <div class="line-3"></div>
                        <div class="course-double">
                            <div class="course-price"><p><?php the_field('price'); ?></p></div>
                            <div class="course-time"><p><?php the_field('time'); ?></p></div>
                        </div>
                        <div class="course-text"><?php the_excerpt(); ?></div>
                    </a>
                </div>

                <?php
                $i++;
                if ($i == 2) {
                    $i = 0;
                    echo '</div>';
                }

            endwhile; // End of the loop.

            if ($i > 0) {
                echo '</div>';
            }
            ?>
    </section>
    <section class="course-container course-container--mobile courseContainerBg1">
        <div class="container">
            <?php $args = array(
                'post_type' => 'course',
                /* 'posts_per_page' => 10, */

            );
            $course = new WP_Query($args); ?>

            <?php
            while ($course->have_posts()) :
                $course->the_post();
                ?>

                <div class="course-block">
                    <div class="needle-2"></div>
                    <a class="course-content" href="<?php the_permalink(); ?>">

                        <div class="course-title">
                            <h4><?php the_title(); ?></h4>
                            <!-- <div class="course-arrow">
                                   <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/mini-arrow-right.png"
                                        alt="">
                               </div> -->
                            <div class="course-tumbnail">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'course'); ?>
                            </div>
                        </div>

                        <div class="line-3"></div>
                        <div class="course-double">
                            <div class="course-price"><p><?php the_field('price'); ?></p></div>
                            <div class="course-time"><p><?php the_field('time'); ?></p></div>
                        </div>
                        <div class="course-text"><?php the_excerpt(); ?></div>
                    </a>
                </div>

            <?php
            endwhile; // End of the loop.
            ?>

        </div>
    </section>
    <section class="container booking-container">
        <div class="booking-foure">
            <div class="booking-title dicor">

                <div class="needle"><h1>Расписание</h1>
                </div>
                <div class="line-1">
                </div>

            </div>
            <!--  <div class="booking-subtitle"><p>для обучения офлайн(в разработке)</p></div> -->
        </div>
    </section>
    <section id="timetable"
             :class="{
                'next': direction === 'next',
                'prev': direction === 'prev'
             }"
             class="container timetable"
    >
        <div class="timetable__container">
            <div class="timetable__content"
                :class="{'is-form': step === 3}"
            >
                <div class="timetable__steps">
                    <span class="timetable__steps-title"
                          :class="{active: step === 0}"
                    >1 <small>Шаг</small></span>
                    <div class="timetable__steps-line"></div>
                    <span class="timetable__steps-title"
                          :class="{active: step === 1}"
                    >2 <small>Шаг</small></span>
                    <div class="timetable__steps-line"></div>
                    <span class="timetable__steps-title"
                          :class="{active: step === 2}"
                    >3 <small>Шаг</small></span>
                    <div class="timetable__steps-line"></div>
                    <span class="timetable__steps-title"
                          :class="{active: step === 3}"
                    >4 <small>Шаг</small></span>
                </div>

                <transition name="timetable__15" mode="out-in">
                    <div class="timetable__block timetable--justify-sb" key="step_0" v-if="step === 0">
                        <?php
                        $cities = get_terms(['taxonomy' => 'city']);
                        $posts_by_cities = [];
                        $knowledges = get_terms(['taxonomy' => 'knowledge']);
                        $posts_by_knowledges = [];
                        foreach ($cities as $city) {
                            $args = [
                                'post_type' => 'course',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'city',
                                        'field' => 'name',
                                        'terms' => $city->name
                                    ]
                                ]];
                            $wp_cities = new WP_Query($args);

                            foreach ($wp_cities->posts as $wp) {
                                $wp->image = get_the_post_thumbnail_url($wp->ID);
                                $wp->acf = get_field('timetable', $wp->ID);
                            }
                            $posts_by_cities[] = $wp_cities;
                        }

                        foreach ($knowledges as $knowledge) {
                            $args = [
                                'post_type' => 'course',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'knowledge',
                                        'field' => 'name',
                                        'terms' => $knowledge->name
                                    ]
                                ]];
                            $wp_knowledges = new WP_Query($args);

                            foreach ($wp_knowledges->posts as $wp) {
                                $wp->image = get_the_post_thumbnail_url($wp->ID);
                                $wp->acf = get_field('timetable', $wp->ID);
                            }
                            $posts_by_knowledges[] = $wp_knowledges;
                        }
                        ?>
                        <script>
                            window._cities = <?php echo json_encode($cities); ?>;
                            window._posts_by_cities = <?php echo json_encode($posts_by_cities); ?>;
                            window._knowledges = <?php echo json_encode($knowledges); ?>;
                            window._posts_by_knowledges = <?php echo json_encode($posts_by_knowledges); ?>;
                        </script>
                        <template>
                            <div class="timetable__group">
                                <span class="timetable__title">Выберите город</span>
                            </div>
                            <label class="timetable__checked" v-for="city in cities">
                                <input class="timetable__checked-input"
                                       v-model="choosed.city"
                                       name="city"
                                       type="radio"
                                       :value="city.name"
                                >
                                <span class="timetable__checked-circle">
                                    <svg class="timetable__checked-svg" viewBox="0 0 100 100"><path d="M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653"></path></svg>
                                </span>
                                <span class="timetable__checked-text">{{city.name}}</span>
                            </label>

                            <div class="timetable__group" style="margin-top: 30px">
                                <span class="timetable__title">Выберите квалификацию</span>
                            </div>
                            <label class="timetable__checked" v-for="knowledge in knowledges">
                                <input class="timetable__checked-input"
                                       v-model="choosed.knowledge"
                                       name="knowledge"
                                       type="radio"
                                       :value="knowledge.name"
                                >
                                <span class="timetable__checked-circle">
                                    <svg class="timetable__checked-svg" viewBox="0 0 100 100"><path d="M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653"></path></svg>
                                </span>
                                <span class="timetable__checked-text">{{ knowledge.name }}</span>
                            </label>
                        </template>
                    </div>

                    <div class="timetable__block" key="step_1" v-if="step === 1">
                        <div class="timetable__block timetable__tile">
                            <label class="timetable__box"
                                   v-for="post in course"
                                   :class="{ 'active': choosed.post === post.post_title }"
                            >
                                <div class="timetable__wrap">
                                    <img :src="post.image ? post.image : 'https://loremflickr.com/cache/resized/65535_50193761782_9988071fa4_z_640_360_nofilter.jpg'"
                                         :alt="post.post_title">
                                    <div class="timetable__box-text">
                                        <span>{{post.post_title}}</span>
                                    </div>
                                    <div class="checked-circle">
                                        <input class="checked-circle__input"
                                               :value="post.post_title"
                                               v-model="choosed.post"
                                               name="course"
                                               type="radio">
                                        <svg class="checked-circle__svg" viewBox="0 0 100 100"><path d="M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653"></path></svg>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="timetable__block" key="step_2" v-if="step === 2">
                        <div class="timetable__group">
                            <span class="timetable__title">Выберите время</span>
                        </div>
                        <div class="timetable__block timetable--justify-sb">
                            <label class="timetable__checked timetable__ul-box" v-for="acf in acfDates">
                                <div class="timetable__checked-group">
                                    <input class="timetable__checked-input" v-model="choosed.time" name="time" type="radio" :value="acf.dates">
                                    <span class="timetable__checked-circle">
                                        <svg class="timetable__checked-svg" viewBox="0 0 100 100"><path d="M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653"></path></svg>
                                    </span>
                                    <span class="timetable__checked-text">{{acf.dates}}</span>
                                </div>

                                <ul class="timetable__ul">
                                    <li class="timetable__li"
                                        v-for="advanced in acf.timetable_by_day_of_week"
                                    >
                                        <span class="timetable__checked-text--14">{{advanced.day_of_week}}</span>
                                        <span class="timetable__checked-text--14">{{advanced.time}}</span>
                                    </li>
                                </ul>
                            </label>
                        </div>
                    </div>

                    <div class="timetable__block" key="step_3" v-if="step === 3">
                        <template v-if="!success_res && !loading && !send">
                            <div class="timetable__group" style="text-align: center;">
                                <span class="timetable__title">Заполните форму</span>
                            </div>

                            <form class="timetable-form" @submit.prevent="sendForm()">
                                <label class="timetable-form__label" for="fname">Введите ваше имя</label>
                                <input class="timetable-form__input"
                                       required
                                       v-model="form.name.value"
                                       @input="form.name.validation.callback"
                                       type="text"
                                       id="name"
                                       name="name"
                                       placeholder="Имя*">
                                <span  class="timetable-form__message">{{ form.name.validation.message }}</span>
                                <label class="timetable-form__label" for="lname">Введите номер телефона</label>
                                <input class="timetable-form__input"
                                       required
                                       type="tel"
                                       v-model="form.phone.value"
                                       @input="form.phone.validation.callback"
                                       id="phone"
                                       name="phone"
                                       placeholder="Телефон*">
                                <span  class="timetable-form__message">{{ form.phone.validation.message }}</span>
                                <label class="timetable-form__label" for="lname">Введите ваш e-mail</label>
                                <input class="timetable-form__input"
                                       required
                                       type="email"
                                       v-model="form.email.value"
                                       @input="form.email.validation.callback"
                                       id="email"
                                       name="email"
                                       placeholder="E-mail*">
                                <span  class="timetable-form__message">{{ form.email.validation.message }}</span>
                                <button type="submit" :disabled="!validationForms" class="timetable__btn timetable__btn--bg">Отправить</button>
                                <button class="timetable__btn-text" type="button" @click="back()">
                                    <svg height="401pt" viewBox="0 -1 401.52289 401" width="401pt" fill="currentColor"><path d="m370.589844 250.972656c-5.523438 0-10 4.476563-10 10v88.789063c-.019532 16.5625-13.4375 29.984375-30 30h-280.589844c-16.5625-.015625-29.980469-13.4375-30-30v-260.589844c.019531-16.558594 13.4375-29.980469 30-30h88.789062c5.523438 0 10-4.476563 10-10 0-5.519531-4.476562-10-10-10h-88.789062c-27.601562.03125-49.96875 22.398437-50 50v260.59375c.03125 27.601563 22.398438 49.96875 50 50h280.589844c27.601562-.03125 49.96875-22.398437 50-50v-88.792969c0-5.523437-4.476563-10-10-10zm0 0"/><path d="m376.628906 13.441406c-17.574218-17.574218-46.066406-17.574218-63.640625 0l-178.40625 178.40625c-1.222656 1.222656-2.105469 2.738282-2.566406 4.402344l-23.460937 84.699219c-.964844 3.472656.015624 7.191406 2.5625 9.742187 2.550781 2.546875 6.269531 3.527344 9.742187 2.566406l84.699219-23.464843c1.664062-.460938 3.179687-1.34375 4.402344-2.566407l178.402343-178.410156c17.546875-17.585937 17.546875-46.054687 0-63.640625zm-220.257812 184.90625 146.011718-146.015625 47.089844 47.089844-146.015625 146.015625zm-9.40625 18.875 37.621094 37.625-52.039063 14.417969zm227.257812-142.546875-10.605468 10.605469-47.09375-47.09375 10.609374-10.605469c9.761719-9.761719 25.589844-9.761719 35.351563 0l11.738281 11.734375c9.746094 9.773438 9.746094 25.589844 0 35.359375zm0 0"/></svg>
                                    Изменить выбранное
                                </button>
                            </form>
                        </template>
                        <div class="timetable__answer" v-if="loading && !send" key="preloader">
                            <div class="itd-preloader">
                                <svg class="itd-preloader__spinner" viewBox="0 0 66 66">
                                    <circle class="itd-preloader__circle" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                                </svg>
                                <svg class="itd-preloader__spinner-bg" viewBox="0 0 66 66">
                                    <circle class="itd-preloader__circle-bg" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                                </svg>
                            </div>
                        </div>
                        <div class="timetable__answer" v-if="success_res && send" key="success">
                            <svg width="512" height="512" viewBox="0 0 512 512" fill="none">
                                <path d="M497.36 69.995C489.828 62.45 477.607 62.437 470.075 69.963L238.582 300.845L155.06 210.132C147.843 202.298 135.641 201.79 127.794 209.006C119.953 216.223 119.451 228.431 126.668 236.272L223.794 341.753C227.351 345.619 232.329 347.864 237.578 347.973C237.719 347.979 237.855 347.979 237.99 347.979C243.091 347.979 247.998 345.953 251.613 342.351L497.322 97.286C504.873 89.761 504.886 77.54 497.36 69.995Z" fill="#179717"/>
                                <path d="M492.703 236.703C482.045 236.703 473.407 245.341 473.407 256C473.407 375.883 375.883 473.407 256 473.407C136.124 473.407 38.593 375.883 38.593 256C38.593 136.124 136.124 38.593 256 38.593C266.658 38.593 275.297 29.955 275.297 19.297C275.297 8.638 266.658 0 256 0C114.84 0 0 114.84 0 256C0 397.154 114.84 512 256 512C397.154 512 512 397.154 512 256C512 245.342 503.362 236.703 492.703 236.703Z" fill="#179717"/>
                            </svg>
                            <span class="timetable__answer-text"><b>Ваша звяка принята!</b> Наш менеджер в ближайшее время свяжется с вами.</span>
                        </div>

                        <div class="timetable__answer" v-if="!success_res && send" key="error">
                            <svg width="512" height="512" viewBox="0 0 512 512" fill="none">
                                <path d="M490.667 234.667C478.891 234.667 469.333 244.224 469.333 256C469.333 373.632 373.632 469.333 256 469.333C138.368 469.333 42.6667 373.632 42.6667 256C42.6667 138.368 138.368 42.6667 256 42.6667C313.269 42.6667 367.029 65.0453 407.381 105.685C415.68 114.037 429.195 114.091 437.547 105.792C445.909 97.4933 445.952 83.9787 437.653 75.616C389.237 26.8587 324.715 0 256 0C114.837 0 0 114.837 0 256C0 397.163 114.837 512 256 512C397.152 512 512 397.163 512 256C512 244.224 502.443 234.667 490.667 234.667Z" fill="#BA1B1B"/>
                                <path d="M286.165 256L335.083 207.083C343.413 198.752 343.413 185.248 335.083 176.917C326.752 168.587 313.248 168.587 304.917 176.917L256 225.835L207.083 176.917C198.763 168.587 185.237 168.587 176.917 176.917C168.587 185.248 168.587 198.752 176.917 207.083L225.835 256L176.917 304.917C168.587 313.248 168.587 326.752 176.917 335.083C181.077 339.253 186.539 341.333 192 341.333C197.461 341.333 202.923 339.253 207.083 335.083L256 286.165L304.917 335.083C309.088 339.253 314.539 341.333 320 341.333C325.461 341.333 330.912 339.253 335.083 335.083C343.413 326.752 343.413 313.248 335.083 304.917L286.165 256Z" fill="#BA1B1B"/>
                            </svg>
                            <span class="timetable__answer-text"><b>Произошла ошибка!</b> Попробуй ещё раз.</span>
                        </div>
                    </div>
                </transition>
            </div>
            
            <transition name="timetable__15">
                <div class="timetable__btn-box"
                     v-if="step != 3"
                >
                    <transition name="fade__15">
                        <button class="timetable__btn timetable__btn--border" type="button" @click="back()"
                                v-if="step >= 1"
                        >Назад</button>
                    </transition>
                  <button
                            :disabled="validationButtons"
                            class="timetable__btn timetable__btn--bg"
                            type="button"
                            @click="next()">Далее</button>
                </div>
            </transition>
        </div>
    </section>



    <!--  <section class="container">
        <?php if( function_exists("wd_form_maker") ) { wd_form_maker(6, "embedded"); } ?>
    </section>  -->
    <!--  <section class="container booking-slider-container">
    <div class="booking-slider-content">
        <div class="booking-double">
<div class="arrow-left">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/arrow-slider-left.png" alt="">
</div>
<div class="booking-change"><p>Выберите город</p></div>
<div class="arrow-right">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/course/arrow-slider-right.png" alt="">
</div>
</div>
    <div class=" booking-slider">
    <div class="booking-item">
        <div class="booking-three">
      <p class="booking-city">Запорожье</p>
    <div class="booking-box">
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
        <div class="booking-block">
            <div class="booking-block-title">
                <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
				<button class="trigger">Оставить заявку</button>
<div class="modal">
    <div class="modal-content">
        <span class="close-button">×</span>
        <h1>Hello, I am a modal!</h1>
    </div>
</div>
                <p class="booking-block-subtitle">группа набрана</p>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="booking-item">
    <div class="booking-three">
  <p class="booking-city">Днепр</p>
<div class="booking-box">
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
			
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
</div>
</div>
</div>
<div class="booking-item">
    <div class="booking-three">
  <p class="booking-city">Кривой Рог</p>
<div class="booking-box">
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
    <div class="booking-block">
        <div class="booking-block-title">
            <p><span class="booking-time">16 июня:</span> старт курса “Pins Lace”</p>
            <p class="booking-block-subtitle">группа набрана</p>
        </div>
    </div>
</div>
</div>
</div>    
  </div>
</div>
</section> -->

    <section class="service-form-container">
        <div class="service-form-2">
            <div class="form-titles"><h4>Есть вопрос?</h4></div>
            <div class="form-desc-2"><p>Вы можете отправить свой вопрос
                    об интересующем курсе, мы с радостью
                    ответим на него в удобной для вас форме</p></div>
            <?php echo do_shortcode('[contact-form-7 id="131" title="course" html_class="form-disp-2"] '); ?>

        </div>
    </section>

<!--
        <script>
            var modal = document.querySelector(".modal");
            var trigger = document.querySelector(".trigger");
            var closeButton = document.querySelector(".close-button");

            function toggleModal() {
                modal.classList.toggle("show-modal");
            }

            function windowOnClick(event) {
                if (event.target === modal) {
                    toggleModal();
                }
            }

            trigger.addEventListener("click", toggleModal);
            closeButton.addEventListener("click", toggleModal);
            window.addEventListener("click", windowOnClick);
        </script>

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
