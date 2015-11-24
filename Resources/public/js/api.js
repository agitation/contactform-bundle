/*jslint white: true */
/*global Agit */

Agit.Endpoint.registerList({
    "contactform.v1/ContactForm.sendEmail": "contactform.v1/Message"
});
Agit.Object.registerList({
    "contactform.v1/Message": {
        "name": {
            "name": "name",
            "default": null
        },
        "email": {
            "name": "email",
            "default": null
        },
        "subject": {
            "name": "subject",
            "default": null
        },
        "message": {
            "name": "message",
            "default": null
        }
    }
});