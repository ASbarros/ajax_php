(function readyJS() {

    'use strict';

    const form1 = document.querySelector('#form1');

    //Submit form
    function sendForm(event) {
        event.preventDefault();
        const ajax = new XMLHttpRequest(),
            formData = new FormData(form1),
            btn = document.querySelector('#btn'),
            result = document.querySelector('#result'),
            progress = document.querySelector('.progress');
        ajax.open('POST', 'controller.php');
        ajax.onloadstart = function () {
            progress.style.display = 'block';
            progress.style.width ='0%';
            btn.value = 'Carregando...';
        };
        ajax.upload.onprogress = function (event) {
            if (event.lengthComputable) {
                progress.style.width = ((event.loaded * 100) / event.total) + '%';
            }
        };
        ajax.onloadend = function () {
            btn.value = 'Salvar';
            progress.style.display = 'none';
            result.innerHTML = 'Foto carregada com sucesso!';
        };
        ajax.send(formData);
    }
    form1.addEventListener('submit', sendForm, false);

})();
