package com.bd;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

import com.suap.dao.DatabaseConnection;


public class UsuarioBanco {
	public static Usuario login(Usuario userLogin) {
		try {
			Connection conn = DatabaseConnection.getConnection();
			
			String sql = "select * from usuarios where usuario = ? and senha = ?;";
			PreparedStatement pstmt = conn.prepareStatement(sql);
			
			pstmt.setString(1, userLogin.getUsuario());
			pstmt.setString(2, userLogin.getSenha());
			
			ResultSet resultado = pstmt.executeQuery();
			
			if (resultado.next()) {
				System.out.println("Usuário " + userLogin.getUsuario() + " logado com sucesso!");
				Usuario user = new Usuario();
				user.setNome(resultado.getString("nome"));
				user.setEmail(resultado.getString("email"));
				user.setSenha(resultado.getString("senha"));
				user.setUsuario(resultado.getString("usuario"));
				user.setId(resultado.getInt("id"));
				DatabaseConnection.closeConnection(conn);
				return user;
			} else {
				System.out.println("Usuário inexistente!");
				DatabaseConnection.closeConnection(conn);
				return null;
			}
			
		} catch (Exception e) {
			System.out.println("Erro ao tentar fazer o login!");
			return null;
		}
	}
	
	public static void criarUsuario(Usuario user) {
		try {
			Connection conn = DatabaseConnection.getConnection();
			String sql = "insert into usuarios values (?, ?, ?, ?);";
			PreparedStatement pstmt = conn.prepareStatement(sql);
			
			pstmt.setString(1, user.getUsuario());
			pstmt.setString(2, user.getNome());
			pstmt.setString(3, user.getEmail());
			pstmt.setString(4, user.getSenha());
			
			pstmt.execute();
			System.out.println("Usuário " + user.getUsuario() + " cadastrado com sucesso!");
			
		} catch (Exception e) {
			System.out.println("Erro ao tentar adicionar usuário");
		}
	}
}
