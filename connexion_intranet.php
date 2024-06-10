<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
</head>
<body>
    <h2>Connexion</h2>
    <form id="loginForm">
        <label for="email">Adresse Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Mot de Passe:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Se Connecter</button>
    </form>

    <div id="message"></div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            fetch('utilisateurs.json')
                .then(response => response.json())
                .then(users => {
                    let loginSuccess = false;
                    let userRole = '';

                    users.forEach(user => {
                        if (user.email === email && user.password === password) {
                            loginSuccess = true;
                            userRole = user.role;
                        }
                    });

                    const messageDiv = document.getElementById('message');
                    if (loginSuccess) {
                        messageDiv.textContent = "Connexion réussie!";
                        messageDiv.style.color = "green";
                        // Redirection basée sur le rôle de l'utilisateur
                        if (userRole === 'admin') {
                            window.location.href = "intranet_admin.php";
                        } else if (userRole === 'modo') {
                            window.location.href = "intranet_modo.php";
                        } else {
                            window.location.href = "intranet_user.php";
                        }
                    } else {
                        messageDiv.textContent = "Adresse email ou mot de passe incorrect.";
                        messageDiv.style.color = "red";
                    }
                })
                .catch(error => {
                    console.error('Erreur lors du chargement des utilisateurs:', error);
                    document.getElementById('message').textContent = "Erreur de connexion.";
                    document.getElementById('message').style.color = "red";
                });
        });
    </script>
</body>
</html>
