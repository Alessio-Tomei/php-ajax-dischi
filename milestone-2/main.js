const app = new Vue({
    el: '#app',
    data: {
        query: '', 
        apiUrl: 'http://localhost/php-ajax-dischi/milestone-2/apiDisc.php',
        loading: true,
        filteredDiscArray: [],
        genreValue: '',
        authorValue: '',
        optionsGenre: [],
        optionsAuthor: [], 
    },
    methods: {
        getfilterArray: function() {
            console.log('valoripassati:', this.query, this.genreValue, this.authorValue);
            axios.get(this.apiUrl,
            {
                params: {
                    q: this.query,
                    g: this.genreValue,
                    a: this.authorValue,
                }
            })
            .then((apiResponse) => {
                console.log('valoriricevuti: ', apiResponse.data.debug);
                this.filteredDiscArray = apiResponse.data.discs;
                this.optionsGenre = apiResponse.data.genres;
                this.optionsAuthor = apiResponse.data.authors;
                this.loading = false;
            })
            .catch(() => {
                console.log('error');
            });
        },
    },
    created: function() {
        this.getfilterArray();
    },
});