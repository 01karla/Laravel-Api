document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma tradicional

    // Obtener los valores de los campos de entrada
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Realizar una solicitud POST a la ruta de inicio de sesión de Laravel
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            email: email,
            password: password
        })
    })
    .then(response => {
        if (response.ok) {
            // Si la respuesta es exitosa, redirigir a la página de inicio
            window.location.href = '/AdminRegistros';
        } else {
            // Si la respuesta es un error, mostrar un mensaje de error al usuario
            response.json().then(data => {
                document.getElementById('error').innerText = data.errors.email[0]; // Mostrar el mensaje de error en el elemento HTML con id 'error'
            });
        }
    })
    .catch(error => console.error('Error:', error));
});
