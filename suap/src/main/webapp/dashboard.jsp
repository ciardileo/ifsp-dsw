<%@page import="com.bd.Usuario"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Área Logada</title>
</head>
<body>
	<%
        // 1. Pega o atributo como Object
        Object userObj = request.getAttribute("user");
    
        // 2. Faz o cast para o tipo correto
        Usuario usuarioLogado = (Usuario) userObj;
    %>
    
	<h1>Seja bem vindo(a) <%= usuarioLogado.getNome() %></h1>
</body>
</html>