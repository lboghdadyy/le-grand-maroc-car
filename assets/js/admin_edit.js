function gerer_admins(id) {
    document.getElementById(id).classList.toggle('hidden');
}

function modifier_admin_detail(id) {
    document.getElementById('admins').classList.add('hidden');
    document.getElementById('editForm').classList.remove('hidden');
    document.getElementById('adminId').value = id;
}
function add_admin(){
    document.getElementById('admins').classList.add('hidden');
    document.getElementById('add_form').classList.remove('hidden');
}