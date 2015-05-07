/*jslint bitwise: false, continue: false, debug: false, eqeq: true, es5: false, evil: false, forin: false, newcap: false, nomen: true, plusplus: true, regexp: true, undef: false, unparam: true, sloppy: true, stupid: false, sub: false, todo: true, vars: false, white: true, css: false, on: false, fragment: false, passfail: false, browser: true, devel: true, node: false, rhino: false, windows: false, indent: 4, maxerr: 100 */
/*global Agit, $, jQuery */

Agit.ContactForm = function($tpl)
{
    var
        $form = $tpl.find('form'),
        $thankyou = $tpl.find('div.thankyou'),

        xhrCallback = function(res)
        {
            if (res && res.success === true)
            {
                $form.hide();
                $thankyou.removeClass('hidden');
            }
        };

    new Agit.ApiForm(
        $form,
        new Agit.Endpoint('contactform.v1/ContactForm.sendEmail'),
        new Agit.Object('contactform.v1/Message'),
        xhrCallback);
}
