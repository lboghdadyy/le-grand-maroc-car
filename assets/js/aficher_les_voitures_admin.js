function showSection(sectionId) {
    // Hide all sections
    var sections = document.querySelectorAll('.tab-content');
    sections.forEach(function(section) {
        section.classList.add('hidden');
        section.classList.remove('visible');
    });

    // Show the selected section
    var selectedSection = document.getElementById(sectionId);
    selectedSection.classList.remove('hidden');
    selectedSection.classList.add('visible');
}
