new Vue({
    el: '#timetable',
    data() {
        return {
            choosed: {
                time: null,
                city: null,
                knowledge: null,
                post: null,
                post_id: null
            },
            form: {
                name: {
                    value: '',
                    validation: {
                        rules: {
                            min: 2,
                            max: 50,
                        },
                        validated: 0,
                        callback: (event) => {
                            clearTimeout(window._bounce);
                            window._bounce = setTimeout(() => {
                                if (this.form.name.validation.rules.min > this.form.name.value.length || this.form.name.validation.rules.max < this.form.name.value.length) {
                                    this.form.name.validation.validated = 2;
                                } else {
                                    this.form.name.validation.validated = 1;
                                }
                            }, 500)
                        }
                    },
                },
                email: {
                    value: '',
                    validation: {
                        validated: 0,
                        callback: (event) => {
                            clearTimeout(window._bounce);
                            window._bounce = setTimeout(() => {
                                let re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                let isValid = re.test(this.form.email.value);
                                if (isValid && this.form.email.value) {
                                    this.form.email.validation.validated = 1;
                                } else {
                                    this.form.email.validation.validated = 2;
                                }
                            }, 500)
                        }
                    },
                },
                phone: {
                    value: '',
                    validation: {
                        validated: 0,
                        callback: (event) => {
                            clearTimeout(window._bounce);
                            window._bounce = setTimeout(() => {
                                let re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
                                let isValid = re.test(this.form.phone.value);
                                if (isValid && this.form.phone.value) {
                                    this.form.phone.validation.validated = 1;
                                } else {
                                    this.form.phone.validation.validated = 2;
                                }
                            }, 500)
                        }
                    },
                },
            },
            posts: null,
            knowledges: null,
            cities: null,
            posts_by_cities: [],
            posts_by_knowledges: [],
            step: 0,
        }
    },
    mounted() {
        this.cities = window._cities;
        this.knowledges = window._knowledges;
        this.posts_by_cities = window._posts_by_cities;
        this.posts_by_knowledges = window._posts_by_knowledges;
    },
    watch: {
        step(val) {
            if (val === 0) {
                this.choosed.knowledge = null;
            }
        },
        'choosed.knowledge'(val, newVal) {
            console.log(val)
            console.log(newVal)
            if (this.choosed.knowledge !== null) {
                this.chooseByKnowledge();
            }
        }
    },
    methods: {
        validationButtons() {
            let temp = []
            Object.keys(this.form).forEach(item => {
                temp.push(this.form[item].validation.validated)
            });
            return temp.every(validated => validated === 1)
        },
        validationForms() {
            let temp = []
            Object.keys(this.form).forEach(item => {
                temp.push(this.form[item].validation.validated)
            });
            return temp.every(validated => validated === 1)
        },
        chooseCourse(id) {
            this.choosed.post_id = id;
            this.choosed.post = this.posts.filter(e => e.ID === id);
        },
        chooseByKnowledge() {
            this.posts = window._posts_by_knowledges.filter(e => e.query.tax_query[0].terms == this.choosed.knowledge);
            this.posts.forEach((item) => {
                return this.posts_by_knowledges = item.posts;
            })
            this.posts = this.posts_by_cities.filter(item => this.posts_by_knowledges.find(item2 => item.ID === item2.ID))
        },
        sendForm() {
            jQuery.ajax({
                type: "POST",
                url: my_ajax_object.ajax_url,
                data: {
                    'action': 'call_my_ajax_handler',
                    city: this.choosed.city,
                    knowledge: this.choosed.knowledge,
                    time: this.choosed.time,
                    course: this.choosed.post[0].post_title,
                    name: this.form.name.value,
                    phone: this.form.phone.value,
                    email: this.form.email.value,
                },
                success: function (response) {
                    console.log(response);
                }
            })
        },
        next() {
            this.step++;
            if (this.choosed.city !== null) {
                this.posts = window._posts_by_cities.filter(e => e.query.tax_query[0].terms == this.choosed.city);
                this.posts.forEach((item) => {
                    this.posts = item.posts;
                    this.posts_by_cities = item.posts;
                })
            }
        },
        back() {
            this.step--;
            if (this.choosed.knowledge !== null) {
                this.chooseByKnowledge();
            }
        },
    },
})