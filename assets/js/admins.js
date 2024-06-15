function gerer_admins(admins) {
    // Hide all sections with class 'service-content'
    var items = document.getElementsByClassName('service-content');
    for (var i = 0; i < items.length; i++) {
        items[i].classList.add('hidden');
    }
    var section = document.getElementById(admins);
    section.classList.remove('hidden');
    var form = document.getElementById('editForm');
    if (!form.classList.contains('hidden')) {
        form.classList.add('hidden');
    }
    var addform = document.getElementById('add_form');
    if (!addform.classList.contains('hidden')) {
        addform.classList.add('hidden');
    }

}

