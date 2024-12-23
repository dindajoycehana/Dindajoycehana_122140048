document
    .getElementById('loginForm')
    .addEventListener('submit', function (event) {
        const password = document.getElementById('password').value;
        const passwordPattern = /^(?=.[a-z])(?=.[A-Z]).{8,}$/;
        if (!passwordPattern.test(password)) {
            alert(
                'Password harus memiliki minimal 8 karakter, termasuk satu huruf besar dan satu huruf kecil.'
            );
            event.preventDefault();
        }
    });
