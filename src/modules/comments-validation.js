import validate from 'validate.js';
import _ from 'underscore';

function commentsValidation() {
    var constraints = {
        name: {
            presence: true
        },
        email: {
            presence: true,
            email: true
        }
    };

    var form = document.querySelector("form#commentform");
    form.addEventListener("submit", (ev) => {
        ev.preventDefault();
        handleFormSubmit(form);
    });

    var inputs = document.querySelectorAll("input, textarea, select")
    for(let i = 0; i < inputs.length; ++i) {
        inputs.item(i).addEventListener("change", (ev) => {
            var errors = validate(form, constraints) || {};
            showErrorsForInput(this, errors[this.name])
        });
    };

    function handleFormSubmit(form, input) {
        var errors = validate(form, constraints);
        showErrors(form, errors || {});
        if(!errors) {
            showSuccess();
        }
    };

    function showErrors(form, errors) {
        _.each(form.querySelectorAll("input[name], select[name]"), (input) => {
            showErrorsForInput(input, errors && errors[input.name]);
        });
    };

    function showErrorsForInput(input, errors) {
        var control = closestParent(input.parentNode, "control"), messages = control.querySelector(".messages");
        resetControl(control);
        if(errors) {
            control.classList.add("has-error");
            _.each(errors, (error) => {
                addError(messages, error);
            });
        } else {
            control.classList.add("has-success");
        }
    };

    function closestParent(child, className) {
        if(!child || child == document) {
            return null;
        }
        if(child.classList.contains(className)) {
            return child;
        } else {
            return closestParent(child.parentNode, className);
        }
    }

    function resetControl(control) {
        control.classList.remove("has-error");
        control.classList.remove("has-success");

        _.each(control.querySelectorAll(".help-block.error"), (el) => {
            el.parentNode.removeChild(el);
        });
    }

    function addError(messages, error) {
        var block = document.createElement("p");
        block.classList.add("help-block");
        block.classList.add("error");
        block.innerText = error;
        messages.appendChild(block);
    }

    function showSuccess() {
        alert("Success!");
    }
}

export { commentsValidation };