package com.suap;

import java.io.IOException;

import com.bd.Usuario;
import com.bd.UsuarioBanco;

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;


@WebServlet(urlPatterns="/signup")
public class SignupServlet extends HttpServlet {
    
    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        resp.sendRedirect("signup.jsp");
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        String name = req.getParameter("name");
        String username = req.getParameter("username");
        String password = req.getParameter("password");

        Usuario newUser = new Usuario();
        newUser.setNome(name);
        newUser.setUsuario(username);
        newUser.setSenha(password);
        
        UsuarioBanco.criarUsuario(newUser);
        
        resp.sendRedirect("login.jsp");
    }
}