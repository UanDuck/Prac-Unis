        window.onscroll = function () {
            const gotop = document.querySelector('.go-top-btn img');
            if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 800) {   //a apartir de cuantos pixeles se ve
                document.querySelector('.go-top-btn').style.display = 'block';
            } else {
                gotop.classList.remove('rotate-once');  //se elimina la clase al llegar arriba
                document.querySelector('.go-top-btn').style.display = 'none';
            }
        };

        document.addEventListener('DOMContentLoaded', (event) => {
            const gotop = document.querySelector('.go-top-btn img'); // Selecciona la imagen dentro del boton y se guarda en la variable gotop

            gotop.addEventListener('click', function () {
                this.classList.add('rotate-once'); // agrega la clase para iniciar la animacion
                // no se necesita eliminar la clase aquÃ­ pq se maneja en el evento del onscroll
            });
        });