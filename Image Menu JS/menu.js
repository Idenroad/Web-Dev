<script>
var estAffiche = {
    'idenroad': false,
    'idenroad2': false,
    'idenroad3': false
};

addEventListener('click', function(event) {
    var classMap = {
        'last-image-idenroad': { sections: '.hidden-section-idenroad', key: 'idenroad' },
        'last-image2-idenroad': { sections: '.hidden-section2-idenroad', key: 'idenroad2' },
        'last-image3-idenroad': { sections: '.hidden-section3-idenroad', key: 'idenroad3' }
    };

    for (var className in classMap) {
        if (event.target.closest('.' + className)) {
            // Masquer toutes les sections avant d'afficher la nouvelle
            for (var key in classMap) {
                var allSections = document.querySelectorAll(classMap[key].sections);
                if (key !== className) {
                    allSections.forEach(function(section) {
                        section.classList.remove('visible');
                    });
                    estAffiche[classMap[key].key] = false; // Réinitialiser l'état
                }
            }

            var sections = document.querySelectorAll(classMap[className].sections);
            if (!estAffiche[classMap[className].key]) {
                sections.forEach(function(section) {
                    section.classList.add('visible');
                });
                estAffiche[classMap[className].key] = true;
            } else {
                sections.forEach(function(section) {
                    section.classList.remove('visible');
                });
                estAffiche[classMap[className].key] = false;
            }
            break;
        }
    }
});
</script>
