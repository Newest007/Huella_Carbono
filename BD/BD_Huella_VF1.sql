CREATE DATABASE IF NOT EXISTS `huellacarbono` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `huellacarbono`;



CREATE TABLE `colegio` (
  `id_colegio` char(36) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `colegio` (`id_colegio`, `Nombre`, `Ubicacion`) VALUES
('CDB002', 'Colegio Don Bosco', 'Soyapango, San Salvador'),
('CSC004', 'Colegio Santa Cecilia', 'Santa Tecla, La Libertad'),
('CSJ003', 'Colegio San Jose', 'Santa Ana'),
('MAX001', 'Casa Maria Auxiliadora', 'Chalchuapa, Santa Ana');



CREATE TABLE `consumo_agua` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_agua` (`id_colegio`, `id_Anio`, `Mes`, `Consumo_m3`, `Ton_CO2_m3`) VALUES
('CSJ003', 2022, 'Enero', 500, 0.39),
('CSJ003', 2022, 'Febrero', 500, 0.39),
('CSJ003', 2022, 'Marzo', 500, 0.39),
('CSJ003', 2022, 'Abril', 500, 0.39),
('CSJ003', 2022, 'Mayo', 500, 0.39),
('CSJ003', 2022, 'Junio', 500, 0.39),
('CSJ003', 2022, 'Julio', 500, 0.39),
('CSJ003', 2022, 'Agosto', 500, 0.39),
('CSJ003', 2022, 'Septiembre', 500, 0.39),
('CSJ003', 2022, 'Octubre', 500, 0.39),
('CSJ003', 2022, 'Noviembre', 1121, 0.88),
('CSJ003', 2022, 'Diciembre', 1269, 1),

('MAX001', 2022, 'Enero', 87.00, 0.07),
('MAX001', 2022, 'Febrero',57.00, 0.04),
('MAX001', 2022, 'Marzo', 117.00, 0.09),
('MAX001', 2022, 'Abril', 81.00, 0.06),
('MAX001', 2022, 'Mayo', 143.00, 0.11),
('MAX001', 2022, 'Junio', 83.00, 0.07),
('MAX001', 2022, 'Julio', 95.00, 0.07),
('MAX001', 2022, 'Agosto', 108.00, 0.09),
('MAX001', 2022, 'Septiembre', 112.00, 0.09),
('MAX001', 2022, 'Octubre', 98.00, 0.08),
('MAX001', 2022, 'Noviembre', 84.00, 0.07),
('MAX001', 2022, 'Diciembre', 77.00, 0.06),

('CSC004', 2022, 'Enero',826.00, 0.65),
('CSC004', 2022, 'Febrero',1798.00, 1.42),
('CSC004', 2022, 'Marzo', 1641.00, 1.29),
('CSC004', 2022, 'Abril', 1475.00, 1.16),
('CSC004', 2022, 'Mayo', 730.00, 0.58),
('CSC004', 2022, 'Junio', 874.00, 0.69),
('CSC004', 2022, 'Julio', 1287.00, 1.01),
('CSC004', 2022, 'Agosto', 852.00, 0.67),
('CSC004', 2022, 'Septiembre', 1180.00, 0.93),
('CSC004', 2022, 'Octubre', 1245.00, 0.98),
('CSC004', 2022, 'Noviembre', 757.00, 0.60),
('CSC004', 2022, 'Diciembre', 0, 0);





CREATE TABLE `consumo_agua_anual` (
  `id_colegio` char(36) NOT NULL DEFAULT '',
  `id_Anio` int NOT NULL,
  `Consumo_Agua_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `consumo_agua_anual` (`id_colegio`, `id_Anio`, `Consumo_Agua_Anual`, `Ton_CO2_Anual`) VALUES
('CSJ003', 2022, 7390, 5.82),
('MAX001', 2022, 1142.00, 0.90),
('CSC004', 2022, 12665.00, 9.98);



CREATE TABLE  `consumo_diesel` (
  `id_colegio` char(36) NOT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `Combustible_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  `kGr_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_diesel` (`id_colegio`, `id_Anio`, `Mes`, `Cantidad`, `Combustible_m3`, `Ton_CO2_m3`, `kGr_CO2_m3`) VALUES

('CSJ003', 2022, 'Enero', 46, 0.17, 0.46, 464.93),
('CSJ003', 2022, 'Febrero',37, 0.14, 0.37, 373.96),
('CSJ003', 2022, 'Marzo', 38, 0.14, 0.38, 384.07),
('CSJ003', 2022, 'Abril', 24, 0.09, 0.24, 242.57),
('CSJ003', 2022, 'Mayo', 42, 0.16, 0.42, 424.50),
('CSJ003', 2022, 'Junio', 52, 0.20, 0.53, 525.57),
('CSJ003', 2022, 'Julio', 35, 0.13, 0.35, 353.75),
('CSJ003', 2022, 'Agosto', 35, 0.13, 0.35, 353.75),
('CSJ003', 2022, 'Septiembre', 34, 0.13, 0.34, 343.64),
('CSJ003', 2022, 'Octubre', 13, 0.05, 0.13, 131.39),
('CSJ003', 2022, 'Noviembre', 32, 0.12, 0.32, 323.43),
('CSJ003', 2022, 'Diciembre', 32, 0.12, 0.32, 323.43),

('MAX001', 2022, 'Enero', 460.355, 0, 0, 0),
('MAX001', 2022, 'Febrero',51.096, 0, 0, 0),
('MAX001', 2022, 'Marzo', 46.935, 0, 0, 0),
('MAX001', 2022, 'Abril', 363.183, 0, 0, 0),
('MAX001', 2022, 'Mayo', 496.449, 0, 0, 0),
('MAX001', 2022, 'Junio', 394.487, 0, 0, 0),
('MAX001', 2022, 'Julio', 535.968, 0, 0, 0),
('MAX001', 2022, 'Agosto', 6.284, 0, 0, 0),
('MAX001', 2022, 'Septiembre', 406.328, 0, 0, 0),
('MAX001', 2022, 'Octubre', 438.562 , 0, 0, 0),
('MAX001', 2022, 'Noviembre', 364.206 , 0, 0, 0),
('MAX001', 2022, 'Diciembre', 711.785, 0, 0, 0),

('CSC004', 2022, 'Enero',0, 0, 0, 0),
('CSC004', 2022, 'Febrero',6.73, 0.0254758093,0.06850954637, 68.50954637),
('CSC004', 2022, 'Marzo', 21.02, 0.0795693182, 0.2139778105, 213.9778105),
('CSC004', 2022, 'Abril', 30.87, 0.1168556067, 0.3142480975, 314.2480975),
('CSC004', 2022, 'Mayo', 31.18, 0.1180290838, 0.3174038122, 317.4038122),
('CSC004', 2022, 'Junio', 30.03, 0.1136758623, 0.3056971289, 305.6971289),
('CSC004', 2022, 'Julio', 15.02, 0.0568568582, 0.1528994631, 152.8994631),
('CSC004', 2022, 'Agosto', 44.2, 0.167315122, 0.4499438261, 449.9438261),
('CSC004', 2022, 'Septiembre', 21.36, 0.0808563576, 0.2174389169, 217.4389169),
('CSC004', 2022, 'Octubre',27.06, 0.1024331946,0.2754633469, 275.4633469),
('CSC004', 2022, 'Noviembre', 22.55, 0.0853609955, 0.2295527891, 229.5527891),
('CSC004', 2022, 'Diciembre', 37.12, 0.1405144192, 0.3778713761, 377.8713761);



CREATE TABLE `consumo_diesel_anual` (
  `id_colegio` char(36) NOT NULL,
  `id_Anio` int NOT NULL,
  `Cantidad_Anual` double DEFAULT NULL,
  `Combustible_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_m3_Anual` double DEFAULT NULL,
  `kGr_CO2_m3_Anual` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `consumo_diesel_anual` (`id_colegio`, `id_Anio`, `Cantidad_Anual`, `Combustible_m3_Anual`, `Ton_CO2_m3_Anual`, `kGr_CO2_m3_Anual`) VALUES
('CSJ003', 2022, 420, 1.58, 4.24, 4244.99),
('MAX001', 2022, 10.553, 0, 0, 0),
('CSC004', 2022, 287.14, 1.079189847, 2.902157338, 2902.157338);



CREATE TABLE `consumo_energetico` (
  `id_colegio` char(36) NOT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_kWts` double DEFAULT NULL,
  `Ton_CO2` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_energetico` (`id_colegio`, `id_Anio`, `Mes`, `Consumo_kWts`, `Ton_CO2`) VALUES
('CSJ003', 2022, 'Enero', 3071.25, 2.09),
('CSJ003', 2022, 'Febrero', 8520.25, 5.79),
('CSJ003', 2022, 'Marzo', 10421.75, 7.08),
('CSJ003', 2022, 'Abril', 10809, 7.35),
('CSJ003', 2022, 'Mayo', 10862.5, 7.38),
('CSJ003', 2022, 'Junio', 10472.5, 7.12),
('CSJ003', 2022, 'Julio', 8332, 5.66),
('CSJ003', 2022, 'Agosto', 7438.45, 5.06),
('CSJ003', 2022, 'Septiembre', 8609.55, 5.85),
('CSJ003', 2022, 'Octubre', 12557, 8.54),
('CSJ003', 2022, 'Noviembre', 10396.74, 7.07),
('CSJ003', 2022, 'Diciembre', 14981.24, 10.18),

('MAX001', 2022, 'Enero', 1180.00, 0.80),
('MAX001', 2022, 'Febrero', 1163.00,0.79),
('MAX001', 2022, 'Marzo', 1206.00, 0.82),
('MAX001', 2022, 'Abril', 1228.11, 0.83),
('MAX001', 2022, 'Mayo', 1357.89, 0.92),
('MAX001', 2022, 'Junio', 1343.00, 0.91),
('MAX001', 2022, 'Julio', 1122.00, 0.76),
('MAX001', 2022, 'Agosto', 1330.00, 0.90),
('MAX001', 2022, 'Septiembre', 1321.00, 0.90),
('MAX001', 2022, 'Octubre', 1352.00, 0.92),
('MAX001', 2022, 'Noviembre', 1392.00, 0.95),
('MAX001', 2022, 'Diciembre', 1395.00, 0.95),

('CSC004', 2022, 'Enero', 5584.00, 3.80),
('CSC004', 2022, 'Febrero', 368.00,0.25),
('CSC004', 2022, 'Marzo', 370.00, 0.25),
('CSC004', 2022, 'Abril', 362.00, 0.25),
('CSC004', 2022, 'Mayo', 13372.00, 9.09),
('CSC004', 2022, 'Junio', 19752.00, 13.43),
('CSC004', 2022, 'Julio', 17473.00, 11.88),
('CSC004', 2022, 'Agosto', 17186.00, 11.68),
('CSC004', 2022, 'Septiembre', 20620.00, 14.02),
('CSC004', 2022, 'Octubre', 16137.00, 10.97),
('CSC004', 2022, 'Noviembre', 16944.00, 11.52),
('CSC004', 2022, 'Diciembre', 15365.00, 10.45);



CREATE TABLE `consumo_energetico_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Consumo_kWts_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_energetico_anual` (`id_colegio`, `id_Anio`, `Consumo_kWts_Anual`, `Ton_CO2_Anual`) VALUES
('CSJ003', 2022, 116472.23, 79.18),
('MAX001', 2022, 15390.00, 10.46),
('CSC004', 2022, 143533.00, 97.57);


CREATE TABLE `consumo_gasolina` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `Combustible_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  `Km_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_gasolina` (`id_colegio`, `id_Anio`, `Mes`, `Cantidad`, `Combustible_m3`, `Ton_CO2_m3`, `Km_CO2_m3`) VALUES
('CSJ003', 2022, 'Enero', 85, 0.30, 175247.35, 175247348.19),
('CSJ003', 2022, 'Febrero', 65, 0.24, 140630.59, 140630588.06),
('CSJ003', 2022, 'Marzo', 68, 0.26, 147121.23, 147121230.58),
('CSJ003', 2022, 'Abril', 43, 0.16, 93032.54, 93032542.87),
('CSJ003', 2022, 'Mayo', 74, 0.28, 160102.52, 160102515.63),
('CSJ003', 2022, 'Junio', 93, 0.35, 201209.92, 	201209918.30),
('CSJ003', 2022, 'Julio', 61, 0.23, 131976.40, 	131976398.02),
('CSJ003', 2022, 'Agosto', 62, 0.23, 134139.95, 134139945.53),
('CSJ003', 2022, 'Septiembre', 61, 0.23, 131976.40, 131976398.02),
('CSJ003', 2022, 'Octubre', 22, 0.08, 47598.05, 47598045.19),
('CSJ003', 2022, 'Noviembre',57, 0.21, 123322.21, 123322207.99),
('CSJ003', 2022, 'Diciembre',57, 0.21, 123322.21, 123322207.99),

('CSC004', 2022, 'Enero', 72.79, 0.2735746639, 0.002426880843, 2.426880843),
('CSC004', 2022, 'Febrero', 30.94, 0.1162852054, 0.001031566057, 1.031566057),
('CSC004', 2022, 'Marzo', 47.43, 0.1782613863, 0.001581356758, 1.581356758),
('CSC004', 2022, 'Abril',58.03, 0.2181005323, 0.001934769822, 1.934769822),
('CSC004', 2022, 'Mayo', 67.23, 0.2526779043, 0.002241505689, 2.241505689),
('CSC004', 2022, 'Junio',40.43, 0.1519525163, 0.001347970772, 1.347970772),
('CSC004', 2022, 'Julio', 52.97, 0.1990829777, 0.001766065095, 1.766065095),
('CSC004', 2022, 'Agosto', 50.51, 0.1898372891, 0.001684046592, 1.684046592),
('CSC004', 2022, 'Septiembre', 51.17, 0.1923178397,0.001706051556, 1.706051556),
('CSC004', 2022, 'Octubre', 29.81, 0.1120382021, 0.0009938908908, 0.9938908908),
('CSC004', 2022, 'Noviembre',48.16,0.1810050256, 0.001605695582, 1.605695582),
('CSC004', 2022, 'Diciembre',30.14, 0.1132784774, 0.001004893373, 1.004893373);



CREATE TABLE `consumo_gasolina_anual` (
  `id_colegio` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Cantidad_Anual` double DEFAULT NULL,
  `Combustible_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_m3_Anual` double DEFAULT NULL,
  `Km_CO2_m3_Anual` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `consumo_gasolina_anual` (`id_colegio`, `id_Anio`, `Cantidad_Anual`, `Combustible_m3_Anual`, `Ton_CO2_m3_Anual`, `Km_CO2_m3_Anual`) VALUES
('CSJ003', 2022, 744, 2.80, 1609679.35, 1609679346.36),
('CSC004', 2022, 579.61, 2.17841202, 0.01932469303, 19.32469303);



CREATE TABLE `consumo_papel` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_m3` double DEFAULT NULL,
  `Ton_CO2` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE `consumo_papel_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Consumo_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




CREATE TABLE `inventario` (
  `id_colegio` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Cantidad` int NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Extras` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Consumo_Kw` double NOT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `inventario` (`id_colegio`, `Cantidad`, `Tipo`, `Marca`, `Descripcion`, `Extras`, `Ubicacion`, `Consumo_Kw`) VALUES
('CSJ003', 27, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC1', 0),
('CSJ003', 6, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC1', 0),
('CSJ003', 40, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 7a Gen.3.0 GHz, RAM 8GB, HDD - 1TB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 35, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, HDD - 320GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC3', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC3', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.2 GHz, RAM 8GB, HDD - 320GB ', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Contabilidad', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Librería', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Coordinación de Secundaria', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Parvularia, Oficina de Coordinación de Parvularia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Psicología Secundaria', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Enfermería', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i7 - 6a Gen.3.4 GHz,RAM 24GB, SSD - 250GB, HDD - 500 GB ', 'Windows 10 Enterprise', ' Edif. Cómputo, Oficina IT - Manager', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina IT - Aux. de Soporte', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB ', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Trabajo Social', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Registro Académico', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 6GB, HDD - 320GB', 'Windows 8.1 Enterprise', 'Edif. Administrativo, Recepción', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Recursos Humanos', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 7a Gen.3.0 GHz, RAM 8GB, HDD - 1TB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Comunicaciones', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 500GB ', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Psicología Parvularia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 8GB, HDD - 320GB', 'Windows 7 Profesional', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 8GB, HDD - 500GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Audiovisuales Biblioteca', 0),
('CSJ003', 10, 'Desktop', 'Equipo Generico', 'Intel Pentium IV - 3.4 GHz, RAM 2GB, HDD - 80GB', 'Windows XP Profesional', 'Edif. Biblioteca, CC Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 2GB, HDD - 320GB', 'Windows 10 Enterprise', 'Biblioteca, Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Administrativo, Asistente de Contabilidad', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 10GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 2.7 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Primaria,Coordinación de Matenimiento ', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Cosmetología, 1º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Cosmetología, 1º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato D', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 7ª B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 7ª A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 3º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 3º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 4º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 4º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K5-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K5-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K4-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K4-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K6-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K6-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, Ludoteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP,  Gestor OIL', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP,  Gestor OIL', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 500 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Maestros', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 260 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Maestros', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Dibujo Técnico', 0),
('CSJ003', 2, 'Desktop', 'DELL', 'Xeon E-2126G, RAM 16 GB, HDD - 1TB', 'Windows Server 2016 R2 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core 2 Quad 2.66 GHz, RAM 4GB, HDD - 320 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Deportes', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480 GB', 'Windows 10 Enterprise', 'Templo, Oficina Parroquial Templo Sagrada Familia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 2GB, HDD - 320 GB', 'Windows 7 Profesional', 'Templo, Librería Templo Sagrada Familia', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Pastoralista', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Dirección', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128 GB', 'Windows 11 Enterprise', 'Edif. CFP, Oficina de Coordinación Administrativa CFP', 0),
('CSJ003', 13, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS High Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 6, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS X 10.9.5', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 8GB, HDD - 1TB', 'macOS High Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'Laptop', 'Asus', 'Intel Core i3 - 3a Gen.1.8 GHz, RAM 6GB, HDD - 500 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Acer', 'Intel Core i5 - 6a Gen.2.3 GHz, RAM 8GB, SSD - 256 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'AMD Ryzen 3 - 3a Gen.2.6 GHz, RAM 4GB, SSD - 128 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'Intel Core i3 - 10a Gen.1.2 GHz, RAM 4GB, HDD - 1TB', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Coordinación General Académica', 0),
('CSJ003', 1, 'Laptop', 'Asus', 'AMD Ryzen 7 - 3a Gen.2.3 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. CFP, Oficina de Coordinación del CFP', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP, Oficina de Bakery School', 0),
('CSJ003', 1, 'Laptop', 'Toshiba', 'Intel Pentium 4 - 2.8 GHz, RAM 500 MB, HDD - 60GB', 'Windows XP Profesional', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'MacBookPro', 'Apple', 'Intel Core i5, cuatro núcleos - 1.4 GHz, RAM 8GB, SSD - 251GB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Administración', 0),
('CSJ003', 1, 'Terminal', 'Gigabyte', 'Intel Core i3 - 4a Gen.1.7 GHz, RAM 4GB, HDD - 500GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Capilla San José', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 11 Enterprise', 'Edif. De Labotarios, Laboratorio de Inglés', 0),
('CSJ003', 1, 'Mini Split', 'General Electric', 'Aire Acondicionado', 'CS- PS24PKV', 'Edif. Administrativo, Administracion', 5.27),
('CSJ003', 1, 'Split', 'Panasonic', 'Aire Acondicionado', '', 'Edif. Administrativo, Recepcion', 7.03),
('CSJ003', 1, 'MiniSplit', 'Daikin', 'Aire Acondicionado', '', 'Edif. Administrativo, Registro Academico', 3.52),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Administrativo, Direccion General', 7.03),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Administrativo, Coornacion Academica ', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Administrativo,Contabilidad ', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Administrativo, Fotocopiadora', 3.52),
('CSJ003', 2, 'Split', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Biblioteca Sala Audiovisual', 25),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Biblioteca Sala Reuniones', 7.03),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Enfermeria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Sala De Reuniones', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Secundaria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Aula De Apoyo', 3.52),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Pastoral ', 7.03),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Primaria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Cómputo, Soporte Tecnico', 3.52),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 1', 5),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 2', 5),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 3', 5),
('CSJ003', 5, 'Cassett', 'Innovair', 'Aire Acondicionado', '', 'Edif. Cómputo, Capilla San Jose', 5),
('CSJ003', 1, 'MiniSplit', 'Samsung', 'Aire Acondicionado', '', 'Edif. Parvularia, Ludoteca', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Coordinacion General', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Sala De Reuniones', 3.52),
('CSJ003', 1, 'MiniSplit', 'General Electric', 'Aire Acondicionado', '', 'Edif. CFP, Coord. Oil - Asist. Administrativo', 3.52),
('CSJ003', 2, 'Split', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Centro Mac', 7.03),
('CSJ003', 1, 'Split', 'Comfortstart', 'Aire Acondicionado', 'NEO60SC-T', 'Edif. Cosmetología, Segundo Grado A', 17.5),
('CSJ003', 1, 'Split', 'Comfortstart', 'Aire Acondicionado', 'NEO60SC-T', 'Edif. Cosmetología, Segundo Grado B', 17.5),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Oficina Pastoral', 7.03),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Santisimo', 7.03),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Librería Catolica', 7.03),
('CSJ003', 2, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Sala De Niños, Confesionarios', 7.03),
('CSJ003', 2, 'Planta', 'Daikin', 'Aire Acondicionado', 'DCC300XXX3BXXX', 'Templo, Planta General', 17.5),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Primaria, Salones Planta Baja', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Primaria, Salones Segunda Planta', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Planta Baja', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 6, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Cosmetología, Salones Primera Baja', 0),
('CSJ003', 4, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 6, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Cómputo, Salones Primera Planta', 0),
('CSJ003', 2, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Edif. Taller, Taller', 0),
('CSJ003', 1, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Edif. Taller, Comedor', 0),
('CSJ003', 1, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Caseta', 0),
('CSJ003', 16, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Primaria, Primaria', 0),
('CSJ003', 14, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Secundaria, Secundaria', 0),
('CSJ003', 5, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. CFP, CDP', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Parvularia, Parvularia', 0),
('CSJ003', 4, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 9, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Templo', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Piscina', 0),
('CSJ003', 4, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Taller', 0),
('CSJ003', 1, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Caseta', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Cancha de Futbol', 0),
('CSJ003', 18, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Primaria, Primaria', 0),
('CSJ003', 19, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Secundaria, Secundaria', 0),
('CSJ003', 4, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. CFP, CDP', 0),
('CSJ003', 14, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Parvularia, Parvularia', 0),
('CSJ003', 4, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 5, 'Chorros', 'Marca Generica', 'Chorros', '', 'Templo', 0),
('CSJ003', 11, 'Chorros', 'Marca Generica', 'Chorros', '', 'Piscina', 0),
('CSJ003', 17, 'Chorros', 'Marca Generica', 'Chorros', '', 'Areas Verdes', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Administracion', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Administrativo, Recepcion', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Registro Academico', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Recursos Humanos', 0),
('CSJ003', 14, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Direccion General', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Coordinacion Academica', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Contabilidad', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Asistente Contabilidad', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Cocina', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Fotocopiadora', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Pasillo Frente A Parqueo', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Baños', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Administrativo, Pasillo Frente A Canchas', 0),
('CSJ003', 56, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Principal', 0),
('CSJ003', 36, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Audiovisual', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Reuniones', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Librería', 0),
('CSJ003', 11, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Pasillo Central', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Enfermeria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Sala De Reuniones', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Coordinacion Primaria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Coordinacion Secundaria', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Baños Damas', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Aula De Apoyo', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Psicologia Parvularia', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Psicologia Primaria', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Psicologia Secundaria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Equipo Pastoral ', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Sala De Maestros', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Comunicaciones', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Pasillo De Psicologia', 0),
('CSJ003', 10, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Baños Hombres', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Soporte Tecnico', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 1', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 2', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 3', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Gradas', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Pasillo Segunda Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Pasillo Primera Planta', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Aulas Bachillerato', 0),
('CSJ003', 20, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Salon De Usos Multiples', 0),
('CSJ003', 20, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Cómputo, Capilla San Jose Santisimo', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria,Salones Planta Baja ', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Pasillo Primera Planta', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Gradas', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Salones Segunda Planta', 0),
('CSJ003', 26, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Pasillo Segunda Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Reflectores Para Cancha', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Salones Planta Baja', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Pasillo Primera Planta', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Gradas', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 26, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Pasillo Segunda Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Reflectores Para Cancha', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Salones Primera Planta', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Baños Y Desvestideros', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Pasillo Primera Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Gradas', 0),
('CSJ003', 33, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Pasillo Segunda Planta', 0),
('CSJ003', 30, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Ludoteca', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Coordinacion Parvularia', 0),
('CSJ003', 48, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Salones Primera Planta', 0),
('CSJ003', 7, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Pasillo Primera Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Gradas', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Pasillo Segunda Planta', 0),
('CSJ003', 48, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Salones Segunda Planta', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Coordinacion General', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Coordinacion Oil', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Gestor Oil - Asist. Administrativo', 0),
('CSJ003', 1, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Baño Oficinas', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. CFP, Pasillo Oficinas', 0),
('CSJ003', 16, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Centro Mac', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Gradas', 0),
('CSJ003', 54, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Salones De Electricidad', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Lobby CFP', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Baños Primera Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Pasillo De Baños', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Salones Primera Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Pasillo Primera Planta', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Gradas', 0),
('CSJ003', 10, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Pasillo Segunda Planta', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Salones Cosmetologia', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Bodega Cosmetologia', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Oficina Pastoral', 0),
('CSJ003', 9, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Santisimo', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Librería Catolica', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Reflectores Led', '', 'Templo, Lobby', 0),
('CSJ003', 22, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Baños', 0),
('CSJ003', 125, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Altar Y Área De Bancas', 0),
('CSJ003', 9, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon De Confesionarios', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon Para Niños', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon Multiusos', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Focos Led', '', 'Parqueo, Zona De Espera', 0),
('CSJ003', 21, 'Luminaria', 'Marca Generica', 'Lamparas Led', '', 'Parqueo, Luces De Parqueo', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Lamparas Led', '', 'Parqueo, Arriate Imagen De San José', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubos Led', '', 'Parqueo, Caseta', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Piscina, Postes', 0),
('CSJ003', 7, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Piscina, Gradas', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubos Led ', '', 'Piscina, Baños Y Devestideros', 0),
('CSJ003', 14, 'Luminaria', 'Marca Generica', 'Tubos Led ', '', 'Taller, Taller', 0),
('CSJ003', 1, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Taller, Baño', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Taller, Comedor', 0);



CREATE TABLE `roles` (
  `id_rol` char(36) NOT NULL,
  `nombre_rol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
('ADM001', 'Admin General'),
('CLG001', 'Admin Colegio');



CREATE TABLE `user` (
  `id_usuario` char(36) NOT NULL,
  `id_colegio` char(36) NOT NULL,
  `id_rol` char(36) DEFAULT NULL,
  `nombre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `user` (`id_usuario`, `id_colegio`, `id_rol`, `nombre`, `email`, `password`, `remember_token`) VALUES
('AN5667', 'CDB002', 'CLG001', 'Antonio Martinez', 'andersonmelendez73@gmail.com', '$2y$10$jn/sUY7BYf0fAm3ElUofaO0PfvceSJ6nYtMpu9t4YKiabtpQAxJ.i', NULL),
('AR2790', 'CSJ003', 'ADM001', 'Arian Montes', 'adilsonarian@outlook.com', '$2y$10$QehfYrhiaB.niGXemwkYpOOdRQcq7LQpUP..Ho6sJBaygDc3uh/ay', NULL),
('MR1543', 'CDB002', 'ADM001', 'Monica Rivera', 'rivera6577@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2xWBr2cuE9Mz0dl6Mk6mmCRx7TJ1hlEVUEtV7l055NUrOVPabMRX5UvnWl8i');



ALTER TABLE `consumo_agua`
  ADD CONSTRAINT `consumo_agua_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_agua_anual`
  ADD CONSTRAINT `consumo_agua_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_diesel`
  ADD CONSTRAINT `consumo_diesel_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_diesel_anual`
  ADD CONSTRAINT `consumo_diesel_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_energetico`
  ADD CONSTRAINT `consumo_energetico_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_energetico_anual`
  ADD CONSTRAINT `consumo_energetico_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_gasolina`
  ADD CONSTRAINT `consumo_gasolina_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_gasolina_anual`
  ADD CONSTRAINT `consumo_gasolina_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_papel`
  ADD CONSTRAINT `consumo_papel_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `consumo_papel_anual`
  ADD CONSTRAINT `consumo_papel_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

