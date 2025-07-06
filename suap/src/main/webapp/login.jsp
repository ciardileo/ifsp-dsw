<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SUAP: Sistema Unificado de Administração Pública</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="anonima login">
    <main id="content">
    
      <% if (request.getAttribute("error") != null) { %>
            <div class="popup-error">
                <i class="fas fa-exclamation-triangle"></i>
                <%= request.getAttribute("error") %>
            </div>
        <% } %>
    
        <div id="login">
            <h2>SUAP: Sistema Unificado de Administração Pública</h2>
            <h3><span class="fas fa-lock" aria-hidden="true"></span> Login</h3>
            
            <form action="login" method="post">
                <div class="form-row">
                    <label for="id_username" class="required" title="Preenchimento obrigatório">Usuário:</label>
                    <input required type="text" name="username" autofocus="" autocapitalize="none" autocomplete="username" maxlength="150" id="id_username">
                </div>
                
                <div class="form-row">
                    <label for="id_password" class="required" title="Preenchimento obrigatório">Senha:</label>
                    <input required type="password" name="password" autocomplete="current-password" id="id_password">
                </div>
                
                <div class="form-row">
                    <label for="id_usuario_externo">
                        Usuário Externo? &nbsp;
                        <input type="checkbox" name="usuario_externo" id="id_usuario_externo">
                    </label>
                </div>
                
                <div class="submit-row">
                    <input type="submit" value="Acessar">
                </div>
                
                <div class="form-row">
                    <a href="#">Esqueceu ou deseja alterar sua senha?</a>
                    <a href="/suap/signup.jsp">Primeiro acesso</a>
                </div>
            </form>
        </div>
        
        <div class="login-footer">
            <p>© 2025 SUAP | Desenvolvimento: <a target="_blank" href="https://github.com/ciardileo">ciardileo</a></p>
        </div>
    </main>
</body>
</html>