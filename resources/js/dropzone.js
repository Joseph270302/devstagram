import Dropzone from "dropzone";

// PARA QUE NO BUSQUE AUTOMATICAMENTE DONDE TIENE LA CLASE DROPZONE
Dropzone.autoDiscover = false;

const dropzone = new Dropzone("#dropzone", {
    dictDefaultMessage: "Sube aqui tu imagen",
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar archivo",
    maxFiles: 1,
    uploadMultiple: false,
    init: function () {
        if (document.querySelector("#imagen").value.trim()) {
            const imagenPublicada = {};

            // SI O SI SE REQUIERE REQUIEREN ESTOS CAMPOS
            imagenPublicada.size = 1234;
            imagenPublicada.name = document
                .querySelector("#imagen")
                .value;

            this.options.addedfile.call(this, imagenPublicada);
            this.options.thumbnail.call(
                this,
                imagenPublicada,
                `/uploads/${imagenPublicada.name}`
            );
            imagenPublicada.previewElement.classList.add(
                "dz-success",
                "dz-complete"
            );
        }
    },
});

dropzone.on("success", function (file, response) {
    // console.log(response);
    document.querySelector("#imagen").value = response.imagen;
    console.log(response);
});

dropzone.on("error", function (file, message) {
    console.log(message);
});

dropzone.on("removedfile", function () {
    document.querySelector("#imagen").value = "";
});
