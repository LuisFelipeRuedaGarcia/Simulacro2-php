CREATE DATABASE AlquilArtemis;
USE Alquilartemis;

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

CREATE TABLE Salida(
    IdClientes BIGINT PRIMARY KEY
    Idsalida BIGINT,
    FechaSalida VARCHAR (9),
    HoraSalida VARCHAR (5),
    SubtotalPeso BIGINT,
    IdEmpleado BIGINT,
    Placatransporte VARCHAR (7),
    Observacion BIGINT
),

CREATE TABLE Obra(
    IdObra BIGINT,
    IdCliente BIGINT PRIMARY KEY
    IdProducto VARCHAR (10),
    Dirreccion VARCHAR (69)
),


CREATE TABLE SalidaDetalle(
    IdSalida BIGINT,
    IdProducto VARCHAR (10),
    IdObra BIGINT,
    CantidadSalida (20),
    CantidadPropia (20),
    CantidadSubalquilada (10),
    ValorUnidad BIGINT,
    FechaStandBye VARCHAR (9),
    Estado VARCHAR (12), /* tiene esa cantidad pero debe ser cambiada */
    ValorTotal BIGINT,
    IdEmpleado BIGINT
),

CREATE TABLE Entrada(
    IdSalida BIGINT,
    IdEntrada BIGINT,
    IdEmpleado BIGINT,
    IdCliente BIGINT PRIMARY KEY,
    FechaEntrada VARCHAR (9),
    HoraEntrada VARCHAR (5),
    Observaciones BIGINT
),

CREATE TABLE EntradaDetalle(
    IdEntrada BIGINT,
    IdProducto VARCHAR (10),
    IdObra BIGINT,
    EntradaCantidad VARCHAR (20),
    EntradaCantidadPropia VARCHAR (10),
    EntradaCantidadSubalquilada VARCHAR (20),
    Estado VARCHAR (12)
),

CREATE TABLE Inventario(
    IdProducto VARCHAR (10),
    CantidadInicial  BIGINT,
    CantidadIngresos BIGINT,
    CantidadFinal BIGINT,
    FechaInventario VARCHAR (9),
    TipoOperacion VARCHAR (12) /* tiene esa cantidad pero debe ser cambiada igual que estado */
),

