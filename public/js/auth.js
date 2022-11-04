var application = new Vue({
    el: '#app',
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    },
    data: {
        username: null,
        password: null
    },
    watch: {
    },
    mounted() {
    },
    methods: {
        auth: function() {
            axios.post('../api/user-auth', JSON.stringify({
                ref: 'auth',
                username: this.username,
                password: this.password
            })).then(res => {
                if (res.data) {
                    if (res.data == 'Berhasil') {
                        window.location.href = "/";
                    }
                }
            }).catch(err => {
                console.log(err);
            });
        },
    }
});