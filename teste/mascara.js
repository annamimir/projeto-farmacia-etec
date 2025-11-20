// assets/js/mascaras.js

document.addEventListener('DOMContentLoaded', function () {
    const cpfInput = document.getElementById('cpf');
    const telInput = document.getElementById('telefone');

    if (cpfInput) {
        cpfInput.addEventListener('input', function (e) {
            let v = cpfInput.value.replace(/\D/g, '').slice(0,11);
            v = v.replace(/^(\d{3})(\d)/, '$1.$2');
            v = v.replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3');
            v = v.replace(/\.(\d{3})(\d)/, '.$1-$2');
            cpfInput.value = v;
        });
    }

    if (telInput) {
        telInput.addEventListener('input', function () {
            let v = telInput.value.replace(/\D/g, '').slice(0,11);
            if (v.length <= 10) {
                // (XX) XXXX-XXXX
                v = v.replace(/^(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{4})(\d)/, '$1-$2');
            } else {
                // (XX) XXXXX-XXXX
                v = v.replace(/^(\d{2})(\d)/, '($1) $2');
                v = v.replace(/(\d{5})(\d)/, '$1-$2');
            }
            telInput.value = v;
        });
    }

    // Para data, um input type=date já cuida do formato. Se quiser máscara visual, podemos adicionar.
});
