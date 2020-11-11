<?php
/*
 * Template Name: Timetable
 * 
 * */
get_header();
in_work
?>
    <section class="container timetable-hero">
        <img src="https://pins.itdecision.com.ua/wp-content/uploads/2020/09/courses.jpg" alt="">
    </section>

    <section id="timetable" class="container timetable">

        <div class="timetable__steps">
            <span class="timetable__steps-title active">1 <small>Шаг</small></span>
            <div class="timetable__steps-line"></div>
            <span class="timetable__steps-title">2 <small>Шаг</small></span>
            <div class="timetable__steps-line"></div>
            <span class="timetable__steps-title">3 <small>Шаг</small></span>
            <div class="timetable__steps-line"></div>
            <span class="timetable__steps-title">4 <small>Шаг</small></span>
        </div>

        <div class="timetable__block timetable--justify-sb" v-if="step === 0">
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
                console.log(window._posts_by_cities)
            </script>
            <template>
                <div class="timetable__group">
                    <span class="timetable__title">Выберите город</span>
                </div>
                <label class="timetable__checked" v-for="city in cities">
                    <input class="timetable__checked-input" v-model="choosed.city" name="city"
                           type="radio"
                           :value="city.name"
                    >
                    <span class="timetable__checked-circle">
                        <svg class="timetable__checked-svg" viewBox="0 0 100 100"><path d="M6.987,4.774c15.308,2.213,30.731,1.398,46.101,1.398 c9.74,0,19.484,0.084,29.225,0.001c2.152-0.018,4.358-0.626,6.229,1.201c-5.443,1.284-10.857,2.58-16.398,2.524 c-9.586-0.096-18.983,2.331-28.597,2.326c-7.43-0.003-14.988-0.423-22.364,1.041c-4.099,0.811-7.216,3.958-10.759,6.81 c8.981-0.104,17.952,1.972,26.97,1.94c8.365-0.029,16.557-1.168,24.872-1.847c2.436-0.2,24.209-4.854,24.632,2.223 c-14.265,5.396-29.483,0.959-43.871,0.525c-12.163-0.368-24.866,2.739-36.677,6.863c14.93,4.236,30.265,2.061,45.365,2.425 c7.82,0.187,15.486,1.928,23.337,1.903c2.602-0.008,6.644-0.984,9,0.468c-2.584,1.794-8.164,0.984-10.809,1.165 c-13.329,0.899-26.632,2.315-39.939,3.953c-6.761,0.834-13.413,0.95-20.204,0.938c-1.429-0.001-2.938-0.155-4.142,0.436 c5.065,4.68,15.128,2.853,20.742,2.904c11.342,0.104,22.689-0.081,34.035-0.081c9.067,0,20.104-2.412,29.014,0.643 c-4.061,4.239-12.383,3.389-17.056,4.292c-11.054,2.132-21.575,5.041-32.725,5.289c-5.591,0.124-11.278,1.001-16.824,2.088 c-4.515,0.885-9.461,0.823-13.881,2.301c2.302,3.186,7.315,2.59,10.13,2.694c15.753,0.588,31.413-0.231,47.097-2.172 c7.904-0.979,15.06,1.748,22.549,4.877c-12.278,4.992-25.996,4.737-38.58,5.989c-8.467,0.839-16.773,1.041-25.267,0.984 c-4.727-0.031-10.214-0.851-14.782,1.551c12.157,4.923,26.295,2.283,38.739,2.182c7.176-0.06,14.323,1.151,21.326,3.07 c-2.391,2.98-7.512,3.388-10.368,4.143c-8.208,2.165-16.487,3.686-24.71,5.709c-6.854,1.685-13.604,3.616-20.507,4.714 c-1.707,0.273-3.337,0.483-4.923,1.366c2.023,0.749,3.73,0.558,5.95,0.597c9.749,0.165,19.555,0.31,29.304-0.027 c15.334-0.528,30.422-4.721,45.782-4.653"></path></svg>
                    </span>
                    <span class="timetable__checked-text">{{city.name}}</span>
                </label>
            </template>
        </div>

        <div class="timetable__block" v-if="step === 1">
            <div class="timetable__group">
                <span class="timetable__title">Выберите квалификацию</span>
                <select class="timetable__select" v-model="choosed.knowledge">
                    <!--<option selected disabled value="null">Выберите один из вариантов</option>-->
                    <option selected disabled value="null">Выберите курс</option>
                    <option v-for="knowledge in knowledges">{{knowledge.name}}</option>
                </select>
            </div>
            <div class="timetable__block timetable__tile">
                <div class="timetable__box"
                     v-for="post in posts"
                     @click="chooseCourse(post.ID)"
                     :class="{ 'active': choosed.post_id === post.ID }"
                >
                    <img :src="post.image ? post.image : 'https://loremflickr.com/cache/resized/65535_50193761782_9988071fa4_z_640_360_nofilter.jpg'"
                         :alt="post.post_title">
                    <h2>{{post.post_title}}</h2>
                </div>
            </div>
            <button :disabled="!choosed.post" style="width: 320px;margin: 0 auto;" @click="next()">Далее</button>
            <br>
            <button style="width: 320px;margin: 0 auto;" @click="back()">Назад</button>
        </div>

        <div class="timetable__block" v-if="step === 2">
            <div>Выберите время</div>
            <div style="display:grid; justify-content: center" v-for="post in choosed.post">
                <label v-for="acf in post.acf">
                    <input style="width: fit-content; height: fit-content" v-model="choosed.time" name="time"
                           type="radio" :value="acf.dates">
                    <span>{{acf.dates}}</span>
                    <p>
                        (
                        <template v-for="advanced in acf.timetable_by_day_of_week">
                            <span>{{advanced.day_of_week}}</span>,
                            <span>{{advanced.time}}; </span>
                        </template>
                        )
                    </p>

                </label>
            </div>
            <button :disabled="!choosed.time" style="width: 320px;margin: 0 auto;" @click="next()">Далее</button>
            <button style="width: 320px;margin: 0 auto;" @click="back()">Назад</button>
        </div>

        <div class="timetable__block" v-if="step === 3">
            <div style="margin-bottom: 1rem">Заполните форму</div>

            <form style="display: grid;
    text-align: center;
    justify-content: center;" @submit.prevent="sendForm()">
                <label for="fname">Введите ваше имя</label>
                <input required
                       style="margin: 1rem 0"
                       v-model="form.name.value"
                       @input="form.name.validation.callback"
                       type="text"
                       id="name"
                       name="name"
                       placeholder="имя*">

                <label style="margin: 1rem 0" for="lname">Введите номер телефона</label>
                <input required
                       type="tel"
                       v-model="form.phone.value"
                       @input="form.phone.validation.callback"
                       id="phone"
                       name="phone"
                       placeholder="телефон*">

                <label style="margin: 1rem 0" for="lname">Введите ваш e-mail</label>
                <input required
                       type="email"
                       v-model="form.email.value"
                       @input="form.email.validation.callback"
                       id="email"
                       name="email"
                       placeholder="e-mail*">

                <input
                        :disabled="!validationForms"
                        type="submit"
                        value="Submit">
            </form>
            <button style="width: 320px;margin: 1rem auto;" @click="back()">Назад</button>
        </div>

        <div class="timetable__btn-box">
            <button class="timetable__btn timetable__btn--border" :disabled="!choosed.city">Назад</button>
            <button class="timetable__btn timetable__btn--bg" :disabled="!choosed.city" @click="next()">Далее</button>
        </div>

    </section>
<?php
get_footer();
