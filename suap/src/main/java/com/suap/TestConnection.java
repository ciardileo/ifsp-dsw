package com.suap;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import com.suap.dao.DatabaseConnection;

public class TestConnection {
    public static void main(String[] args) {
        try (Connection conn = DatabaseConnection.getConnection()) {
            System.out.println("Conexão bem-sucedida!");
            PreparedStatement pstmt = conn.prepareStatement("select * from cliente;");
            ResultSet query = pstmt.executeQuery();
            
            while (query.next()) {
            	System.out.println(query.getString("nome"));
            }
            
            conn.close();
            
        } catch (SQLException e) {
            System.err.println("Erro: " + e.getMessage());
        }
    }
}