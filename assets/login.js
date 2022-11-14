$(function() {
    var usernameEl = $('#email');
    var passwordEl = $('#password');

    // in a real application, the user/password should never be hardcoded
    // but for the demo application it's very convenient to do so
    if (!usernameEl.val() || 'john@gmail.fr' === usernameEl.val()) {
        usernameEl.val('john@gmail.fr');
        passwordEl.val('kitten');
    }
});
