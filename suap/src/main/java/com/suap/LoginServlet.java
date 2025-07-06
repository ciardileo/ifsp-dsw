package com.suap;

import java.io.IOException;

import com.bd.Usuario;
import com.bd.UsuarioBanco;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet(urlPatterns="/login")
public class LoginServlet extends HttpServlet{
	@Override
	protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
		System.out.println("Tentaram acessar a servlet de login pela url");
		resp.sendRedirect("login.jsp");
	}
	
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
		String username = req.getParameter("username");
		String password = req.getParameter("password");
		
		Usuario userLogin = new Usuario();
		userLogin.setUsuario(username);
		userLogin.setSenha(password);
		
		userLogin = UsuarioBanco.login(userLogin);
		
		if (userLogin != null) {
			System.out.println("Você está logado! Bem vindo(a) " + userLogin.getNome());
			req.setAttribute("user", userLogin);
			req.getRequestDispatcher("dashboard.jsp").forward(req, resp);
		} else {
			System.out.println("Usuário inexistente");
			req.setAttribute("error", "ERRO! USUÁRIO INEXISTENTE");
			req.getRequestDispatcher("login.jsp").forward(req, resp);
		}
	}
}
