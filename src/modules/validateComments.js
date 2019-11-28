function validateComments() {
    return document.addEventListener( 'DOMContentLoaded', () => {
        jQuery(($) => {
            $("#commentform").validate({
                rules: {
                    author: {
                        required: true,
                        minlength: 2
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    comment: {
                        required: true,
                        minlength: 20
                    },
                    url: {
                        required: false,
                        url: true
                    }
                },
                messages: {
                    author: "Var vänlig och fyll i fältet.",
                    email: "Vargod och fyll i en giltig email adress",
                    comment: "Skriv en kommenmtar innan du skickar.",
                    url: "Var vänlig skriv en giltig url/länk"
                },
                errorElement: "div",
                errorPlacement: (error, element) => {
                    element.after(error);
                }
            });
        } );
    } );
}

export { validateComments };