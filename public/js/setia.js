var application = new Vue({
    el: '#app',
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    },
    data: {
        id: null,
        next_text: null,
        polarity: null
    },
    watch: {
    },
    computed: {
    },
    mounted() {
        this.nextText();
    },
    methods: {
        nextText: function() {
            axios.post('../api/next-text', JSON.stringify({
                ref: 'next'
            })).then(res => {
                console.log(res.data);
                this.id = res.data[0].dataset_id;
                this.next_text = res.data[0].text;
            }).catch(err => {
                console.log(err);
            });
        },
    }
});