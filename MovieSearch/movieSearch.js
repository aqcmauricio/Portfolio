'use strict'

$(document).ready(() => {
    swal({
        text: 'Busca un Película, por ejemplo "Los Muertos Vivientes".',
        content: "input",
        button: {
            text: "¡Encontrar!",
            closeModal: false,
        },
    })
    .then(name => {
        if (!name) throw null;

        return fetch(`https://itunes.apple.com/search?term=${name}&entity=movie`);
    })
    .then(results => {
        return results.json();
    })
    .then(json => {
        const movie = json.results[0];

        if (!movie) {
            return swal("¡No se encontró esa película!");
        }

        const name = movie.trackName;
        const imageURL = movie.artworkUrl100;

        swal({
            title: "Top result:",
            text: name,
            icon: imageURL,
        });
        $("#container").css("background-image", `url(${imageURL})`)
            .css("width", "100em")
            .css("height", "100em");
    })
    .catch(err => {
        if (err) {
            swal("¡Oh no!", "¡Falló la petición AJAX!", "error");
        } else {
            swal.stopLoading();
            swal.close();
        }
    });
});