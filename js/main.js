(function () {
    new Vue({
        el: '#timetable',
        data() {
            return {
                choosed: {
                    time: null,
                    city: null,
                    knowledge: null,
                    post: null,
                },
                form: {
                    name: {
                        value: '',
                        validation: {
                            rules: {
                                min: 2,
                                max: 50,
                            },
                            message: null,
                            validated: 0,
                            callback: (event) => {
                                clearTimeout(window._bounce);
                                window._bounce = setTimeout(() => {

                                    if (this.form.name.validation.rules.min > this.form.name.value.length || this.form.name.validation.rules.max < this.form.name.value.length) {
                                        this.form.name.validation.validated = 2;
                                        this.form.name.validation.message = '*Мин. 2 -  Макс. 50'
                                    } else {
                                        this.form.name.validation.validated = 1;
                                        this.form.name.validation.message = null
                                    }
                                }, 500)
                            }
                        },
                    },
                    email: {
                        value: '',
                        validation: {
                            message: null,
                            validated: 0,
                            callback: (event) => {
                                clearTimeout(window._bounce1);
                                window._bounce1 = setTimeout(() => {
                                    let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                    let isValid = re.test(this.form.email.value);
                                    if (isValid && this.form.email.value) {
                                        this.form.email.validation.validated = 1;
                                        this.form.email.validation.message = null
                                    } else {
                                        this.form.email.validation.validated = 2;
                                        this.form.email.validation.message = '*неверный email'
                                    }
                                }, 500)
                            }
                        },
                    },
                    phone: {
                        value: '',
                        validation: {
                            validated: 0,
                            message: null,
                            callback: (event) => {
                                clearTimeout(window._bounce2);
                                window._bounce2 = setTimeout(() => {
                                    let re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
                                    let isValid = re.test(this.form.phone.value);
                                    if (isValid && this.form.phone.value) {
                                        this.form.phone.validation.validated = 1;
                                        this.form.phone.validation.message = null

                                    } else {
                                        this.form.phone.validation.validated = 2;
                                        this.form.phone.validation.message = '*неверный номер мобильного'
                                    }
                                }, 500)
                            }
                        },
                    },
                },
                posts: null,
                knowledges: null,
                cities: null,
                step: 0,
                direction: 'next',
                loading: false,
                success_res: false,
                send: false,
            }
        },
        mounted() {
            this.knowledges = window._knowledges;
            this.cities = window._cities;
        },
        computed: {
            choosedPost() {
                return this.course.filter(item => item.post_title == this.choosed.post);
            },
            validationForms() {
                let temp = []
                Object.keys(this.form).forEach(item => {
                    temp.push(this.form[item].validation.validated)
                });
                return temp.every(validated => validated === 1)
            },
            validationButtons() {
                if (this.step === 0 && (!this.choosed.city || !this.choosed.knowledge)) {
                    return true;
                }
                if (!this.choosed.post && this.step === 1) {
                    return true;
                }
                if (this.step === 2 && !this.choosed.time) {
                    return true;
                }
            },
            inCity() {
                return window._posts_by_cities.filter(item => {
                    return item.query.tax_query[0].terms == this.choosed.city;
                })[0].posts;
            },
            course() {
                if (this.choosed.knowledge !== 'all' && this.choosed.knowledge !== null) {
                    let temp_posts = window._posts_by_knowledges.filter(e => e.query.tax_query[0].terms == this.choosed.knowledge);
                    return this.inCity.filter(item => {
                        if(item.acf.length){
                            return temp_posts[0].posts.find(el => item.ID === el.ID);
                        }
                    });
                }
                return this.inCity;
            },
            acfDates(){
                let temp_arr = [];
                this.choosedPost.forEach((i)=> {
                    i.acf.forEach((u)=> {
                        if(u.city === this.choosed.city){
                            temp_arr.push(u);
                        }
                    })
                })
                return temp_arr;
            }
        },
        methods: {
            clearForm() {
                Object.keys(this.form).forEach(f => {
                    this.form[f].value = ''
                    this.form[f].validation.validated = 0;
                });
            },
            sendForm() {
                this.loading = true;
                let vm = this;
                jQuery.ajax({
                    type: "POST",
                    url: my_ajax_object.ajax_url,
                    data: {
                        'action': 'call_my_ajax_handler',
                        city: this.choosed.city,
                        knowledge: this.choosed.knowledge,
                        time: this.choosed.time,
                        course: this.choosed.post,
                        name: this.form.name.value,
                        phone: this.form.phone.value,
                        email: this.form.email.value,
                    },
                    success: function (response) {
                        vm.success_res = true;
                        vm.clearForm();
                        setTimeout(() => {
                            vm.success_res = false;
                            vm.send = false;
                        }, 4000)
                    },
                    error: function (err) {
                        vm.success_res = false;
                        vm.send = true;
                        setTimeout(() => {
                            vm.success_res = false;
                            vm.send = false;
                        }, 4000)
                    },
                    complete: function (compl) {
                        vm.loading = false;
                        vm.send = true;
                    }
                })
            },
            next() {
                this.direction = 'next';
                this.step++;
            },
            back() {
                this.direction = 'prev';
                this.step--;
            },
        },
    })
})();