const submit = document.getElementById('soumettre');
submit.style.display = 'none';

const fields = [];

document.querySelectorAll('.champ-modifiable').forEach(div => {
    const input = div.querySelector('.int-modifiable input');  
    const modif = div.querySelector('.modif');
    const valider = div.querySelector('.valider');
    const annuler = div.querySelector('.annuler');

    const initial = input.value;
    fields.push({ input, initial });

    modif.addEventListener('click', () => {
        input.removeAttribute('readonly');
        input.focus();
        modif.style.display = 'none';
        valider.style.display = 'inline';
        annuler.style.display = 'inline';
    });

    annuler.addEventListener('click', () => {
        input.value = initial;
        input.setAttribute('readonly', true);
        modif.style.display = 'inline';
        valider.style.display = 'none';
        annuler.style.display = 'none';
        checkChanges(); 
    });

    valider.addEventListener('click', () => {
        input.setAttribute('readonly', true);
        modif.style.display = 'inline';
        valider.style.display = 'none';
        annuler.style.display = 'none';
        checkChanges();
    });
});

function checkChanges() {
    const modified = fields.some(field => field.input.value !== field.initial);
    submit.style.display = modified ? 'block' : 'none';
}

