function show_message(selectedmessage) {
    var messages = document.querySelectorAll('.message');
    messages.forEach(function(message) {
        message.classList.add('hidden');
    });

    var message = document.getElementById(selectedmessage);
    if (message) {
        message.classList.remove('hidden');
    }
}
function cancel(selectedmessage){
    var messages = document.querySelectorAll('.message');
    messages.forEach(function(message) {
        message.classList.remove('hidden');
    });
    var message = document.getElementById(selectedmessage);
    if (message) {
        message.classList.add('hidden');
    }
}