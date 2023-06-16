CREATE DATABASE AlquilArtemis;
USE AlquilArtemis;

CREATE TABLE Empleados(
    IdEmpleado BIGINT PRIMARY KEY,
    Username VARCHAR(69) NOT NULL,
    Password VARCHAR(69) NOT NULL
);

CREATE TABLE Clientes(
    IdCliente BIGINT PRIMARY KEY,
    Nombre VARCHAR(69) NOT NULL,
    Correo VARCHAR(69),
    Telefono BIGINT 
);

CREATE TABLE Productos(
    IdProducto INT PRIMARY KEY AUTO_INCREMENT,
    Nombre VARCHAR(69),
    Precio BIGINT
);


CREATE TABLE Cotizaciones(
    IdCotizacion INT PRIMARY KEY AUTO_INCREMENT,
    IdEmpleado BIGINT,
    IdProducto INT,
    IdCliente BIGINT,
    Fecha DATE,
    Hora TIME,
    DuracionDias INT,
    PrecioPorDia BIGINT,
    TotalPesos BIGINT,
    FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado),
    FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente),
    FOREIGN KEY (IdProducto) REFERENCES Productos(IdProducto) 
);
