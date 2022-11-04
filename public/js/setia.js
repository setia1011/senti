var application = new Vue({
    el: '#app',
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    },
    data: {
        text_status: false,
        next_text: null,
        id: null,
        polarity: null,
        polarity_text: null,
        total: null,
        done: null
    },
    watch: {
        polarity_text: _.debounce(
            function() {
               this.polarity2Id();
            }, 5
        ),
    },
    mounted() {
        this.nextText();
    },
    methods: {
        reset: function() {
            this.id = null;
            this.polarity = null;
            this.polarity_text = null;
            this.text_status = false;
            this.next_text = null;
            this.total = null;
            this.done = null;
        },
        polarity2Id: function() {
            if (this.polarity_text == null) {this.polarity = null;}
            if (this.polarity_text == 'neutral') {this.polarity = 1;}
            if (this.polarity_text == 'positive') {this.polarity = 2;}
            if (this.polarity_text == 'negative') {this.polarity = 3;}
            if (this.polarity_text == 'irrelevant') {this.polarity = 4;}
        },
        polarity2Text: function() {
            if (this.polarity == null) {this.polarity_text = null;}
            if (this.polarity == "1") {this.polarity_text = 'neutral';}
            if (this.polarity == "2") {this.polarity_text = 'positive';}
            if (this.polarity == "3") {this.polarity_text = 'negative';}
            if (this.polarity == "4") {this.polarity_text = 'irrelevant';}
        },
        nextText: function() {
            axios.post('../api/next-text', JSON.stringify({
                ref: 'next'
            })).then(res => {
                this.reset();
                this.id = res.data[0].dataset_id;
                this.next_text = res.data[0].text;
                this.total = res.data[0].total;
                this.done = res.data[0].done;
                this.textStatus();
                this.text_status = false;
            }).catch(err => {
                console.log(err);
            });
        },
        textStatus: function() {
            axios.post('../api/text-status', JSON.stringify({
                ref: 'status',
                id: this.id
            })).then(res => {
                // console.log(res.data);
                if (res.data) {
                    if (res.data[0].polarity) {
                        this.text_status = true;
                    } else {
                        this.text_status = false;
                    }
                }
            }).catch(err => {
                console.log(err);
            });
        },
        saveStatus: function() {
            axios.post('../api/save-status', JSON.stringify({
                ref: 'save',
                pid: this.polarity,
                did: this.id
            })).then(res => {
                console.log(res.data);
                this.nextText();
                this.polarity = null;
                this.polarity_text = null;
            }).catch(err => {
                console.log(err);
            });
        },
        findText: function(ref) {
            var idx = this.id;
            if (ref == 'prev') {idx = parseInt(this.id) - 1}
            if (ref == 'next') {idx = parseInt(this.id) + 1}
            axios.post('../api/find-text', JSON.stringify({
                ref: 'find',
                id: idx
            })).then(res => {
                this.id = res.data[0].dataset_id;
                this.next_text = res.data[0].text;
                this.polarity = res.data[0].polarity;
                // console.log(this.polarity);
                this.textStatus();
                this.polarity2Text();
            }).catch(err => {
                console.log(err);
            });
        }
    }
});