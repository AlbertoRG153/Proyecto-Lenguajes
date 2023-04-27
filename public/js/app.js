
function confirmDelete() {
    var result = confirm("¿Estás seguro de eliminar el elemento?");
    if (result) {
        // Si se presiona Sí, continuar con la eliminación
        return true;
    } else {
        // Si se presiona No, cancelar la eliminación
        return false;
    }
}

function confirmEdit() {
    var result = confirm("¿Estás seguro de editar este elemento?");
    if (result) {
        // Si se presiona Sí, continuar con la eliminación
        return true;
    } else {
        // Si se presiona No, cancelar la eliminación
        return false;
    }
}