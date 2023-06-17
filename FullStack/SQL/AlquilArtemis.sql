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

CREATE TABLE Salidas(
    IdSalida BIGINT PRIMARY KEY,
    IdCliente BIGINT NOT NULL,
    IdEmpleado BIGINT NOT NULL,
    FechaSalida DATE,
    HoraSalida TIME,
    SubTotalPesos BIGINT,
    PlacaTransPorte VARCHAR(7),
    Observaciones VARCHAR(100),
    FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente),
    FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado)
);

CREATE TABLE Obras(
    IdObra BIGINT PRIMARY KEY,
    IdCliente BIGINT,
    Direccion VARCHAR(69),
    FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente)
);

CREATE TABLE DetalleSalidas(
    IdDetalle BIGINT PRIMARY KEY,
    IdSalida BIGINT NOT NULL,
    IdProducto INT NOT NULL,
    IdObra BIGINT NOT NULL,
    IdEmpleado BIGINT NOT NUll,
    CantidadSalida BIGINT,
    CantidadPropia BIGINT,
    CantidadSubAlquilada BIGINT,
    ValorUnidad BIGINT,
    FechaStandBye DATE,
    Estado VARCHAR(50),
    ValorTotal BIGINT,
    FOREIGN KEY (IdSalida) REFERENCES Salidas(IdSalida),
    FOREIGN KEY (IdProducto) REFERENCES Productos(IdProducto),
    FOREIGN KEY (IdObra) REFERENCES Obras(IdObra),
    FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado)
);


CREATE TABLE Entradas(
    IdEntrada BIGINT PRIMARY KEY,
    IdSalida BIGINT NOT NULL,
    IdEmpleado BIGINT NOT NULL,
    IdCliente BIGINT NOT NULL,
    FechaEntrada DATE,
    HoraEntrada TIME,
    Observaciones VARCHAR(100),
    FOREIGN KEY (IdSalida) REFERENCES Salidas(IdSalida),
    FOREIGN KEY (IdEmpleado) REFERENCES Empleados(IdEmpleado),
    FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente)
);

CREATE TABLE Inventario(
    IdInventario BIGINT PRIMARY KEY,
    IdProducto INT NOT NULL,
    CantidadInicial BIGINT,
    CantidadIngresos BIGINT,
    CantidadSalidas BIGINT,
    CantidadFinal BIGINT,
    FechaInventario BIGINT,
    TipoOperacion VARCHAR(40),
    FOREIGN KEY (IdProducto) REFERENCES Productos(IdProducto)
);

CREATE TABLE Liquidaciones(
    IdLiquidacion BIGINT PRIMARY KEY,
    IdCliente BIGINT,
    PeriodoFaturado VARCHAR(20),
    ValorTotal BIGINT,
    FOREIGN KEY (IdCliente) REFERENCES Clientes(IdCliente)
);

