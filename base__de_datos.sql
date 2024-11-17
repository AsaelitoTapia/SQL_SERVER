-- Crear la base de datos 'Biblioteca'
CREATE DATABASE Biblioteca;
GO

-- Usar la base de datos 'Biblioteca'
USE Biblioteca;
GO

-- Crear la tabla 'Libros y Mangas'
CREATE TABLE [Libros y Mangas] (
    ID INT PRIMARY KEY IDENTITY(1,1),
    Titulo NVARCHAR(255) NOT NULL,
    Autor NVARCHAR(255) NOT NULL,
    Genero NVARCHAR(100),
    FechaPublicacion DATE,
    Tipo NVARCHAR(50) NOT NULL
);
