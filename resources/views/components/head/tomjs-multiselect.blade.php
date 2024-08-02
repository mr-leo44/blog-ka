<script type="module">
    new TomSelect('#tags', {
        plugins: ['remove_button'],
        create: true,
        load: function(query, callback){
            if(!query.length) {
                return callback();
                fetch(`tags/search?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(tag => callback(tags))
                    .catch(() => {
                        callback();
                    })
            }
        }
    })
</script>
