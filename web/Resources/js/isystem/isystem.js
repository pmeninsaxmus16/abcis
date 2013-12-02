function addForm(collectionHolder, $newLinkLi) {
    // Obtiene los datos del prototipo explicado anteriormente
    var prototype = collectionHolder.data('prototype');

    // Consigue el nuevo índice
    var index = collectionHolder.data('index');

    // Sustituye el '__name__' en el prototipo HTML para que
    // en su lugar sea un número basado en cuántos elementos hay
    var newForm = prototype.replace(/__name__/g, index);

    // Incrementa en uno el índice para el siguiente elemento
    collectionHolder.data('index', index + 1);

    // Muestra el formulario en la página en un elemento li,
    // antes del enlace 'Agregar una etiqueta'
    var $newFormLi = $('<div class="groups hero-unit"></div>').append(newForm);
    $newLinkLi.append($newFormLi);
    // Añade un enlace eliminar el nuevo formulario
    addFormDeleteLink($newFormLi);
}


function addFormDeleteLink($tagFormLi) {
    var $removeFormA = $('<a href="#" class="btn"><i class=""></i> delete</a>');
    $tagFormLi.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // evita crear el enlace con una "#" en la URL
        e.preventDefault();

        // quita el li de la etiqueta del formulario
        $tagFormLi.remove();
    });
}