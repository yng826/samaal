export const FormField = {
    methods: {
        maxLength(el, n) {
            if ( !el ) {
                return '';
            } else if ( el.length > n ) {
                return 'danger';
            } else {
                return '';
            }
        }
    },
}
