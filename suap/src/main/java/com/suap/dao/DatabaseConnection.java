package com.suap.dao;

import java.sql.Connection;
import java.sql.DriverManager;

public class DatabaseConnection {
	private static String url = "jdbc:mysql://localhost:3306/loja";
	private static String usuario = "";
	private static String senha = "";
	
	public static Connection getConnection() {
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			Connection conn = DriverManager.getConnection(url, usuario, senha);
			return conn;
		} catch (Exception e) {
			System.out.println("Erro ao pegar conexão com o servidor");
			return null;
		}
	}
	
	public static void closeConnection(Connection conn) {
		if (conn != null) {
			try {
				conn.close();
			} catch (Exception e) {
				System.out.println("Erro ao tentar fechar conexão!");
			}
		}
	}
}
