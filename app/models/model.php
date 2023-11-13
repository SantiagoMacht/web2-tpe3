<?php
require_once "database\config.php";
 
class Model{
	protected $db;

	function __construct(){
		$this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER , MYSQL_PASS);
		$this->deploy();
	}

	function deploy(){
		$query =$this->db->query('SHOW TABLES');
		$tables = $query->fetchAll();

		if(count($tables) == 0){
			$sql = <<<END
			CREATE TABLE `category`(
				`CategoryId` int(11) NOT NULL,
				`type` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
				`team` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

				--
				-- Volcado de datos para la tabla `category`
				--

				INSERT INTO `category` (`CategoryId`, `type`, `team`) VALUES
				(1, 'Gorras', ''),
				(2, 'Remeras', ''),
				(3, 'Buzos', ''),
				(4, 'Camperas', ''),
				(5, 'Chombas', '');

				-- --------------------------------------------------------

				--
				-- Estructura de tabla para la tabla `products`
				--

				CREATE TABLE `products` (
				  `product_id` int(11) NOT NULL,
				  `image` varchar(300) NOT NULL,
				  `name` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
				  `price` double NOT NULL,
				  `stock` int(11) NOT NULL,
				  `CategoryId` int(11) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

				--
				-- Volcado de datos para la tabla `products`
				--

				INSERT INTO `products` (`product_id`, `image`, `name`, `price`, `stock`, `CategoryId`) VALUES
				(100, '', 'Gorra Mercedes ', 100, 10, 1),
				(101, '', 'Gorra Red Bull', 100, 10, 1),
				(102, '', 'Gorra Aston Martin', 100, 10, 1),
				(103, '', 'Gorra Ferrari', 100, 10, 1),
				(104, '', 'Gorra Alpha Tauri', 100, 10, 1),
				(105, '', 'Gorra Mclaren', 100, 10, 1),
				(200, '', 'Remera Mercedes', 100, 10, 2),
				(300, '', 'Buzo Mercedes', 100, 10, 3),
				(400, '', 'Campera Mercedes', 100, 10, 4),
				(500, '', 'Chomba Mercedes', 100, 10, 5),
				(201, '', 'Remera Redbull', 100, 10, 2),
				(301, '', 'Buzo Redbull', 100, 10, 3),
				(401, '', 'Campera Redbull', 100, 10, 4),
				(501, '', 'Chomba Redbull', 100, 10, 5),
				(202, '', 'Remera Aston martin', 100, 10, 2),
				(302, '', 'Buzo Aston martin', 100, 10, 3),
				(402, '', 'Campera Aston martin', 100, 10, 4),
				(502, '', 'Chomba Aston martin', 100, 10, 5),
				(203, '', 'Remera Ferrari', 100, 10, 2),
				(303, '', 'Buzo Ferrari', 100, 10, 3),
				(403, '', 'Campera Ferrari', 100, 10, 4),
				(503, '', 'Chomba Ferrari', 100, 10, 5),
				(204, '', 'Remera Alpha tauri', 100, 10, 2),
				(304, '', 'Buzo Alpha tauri', 100, 10, 3),
				(404, '', 'Campera Alpha tauri', 100, 10, 4),
				(504, '', 'Chomba Alpha tauri', 100, 10, 5),
				(205, '', 'Remera Mclaren', 100, 10, 2),
				(305, '', 'Buzo Mclaren', 100, 10, 3),
				(405, '', 'Campera Mclaren', 100, 10, 4),
				(505, '', 'Chomba Mclaren', 100, 10, 5);

				-- --------------------------------------------------------

				--
				-- Estructura de tabla para la tabla `users`
				--

				CREATE TABLE `users` (
				  `id_user` int(11) NOT NULL,
				  `email_user` varchar(50) NOT NULL,
				  `password` varchar(255) NOT NULL
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
				--
				-- Volcado de datos para la tabla `users`
				--

				INSERT INTO `users` (`id_user`, `email_user`, `password`) VALUES
				(1, 'webadmin', '$2a$12$KmzV0U0aCwQD9oyOLXCAo.mNCUOQCJQGPzyJGADWNdCnaW8DdP8O.');



				--
				-- Índices para tablas volcadas
				--

				--
				-- Indices de la tabla `category`
				--
				ALTER TABLE `category`
				  ADD PRIMARY KEY (`CategoryId`);

				--
				-- Indices de la tabla `products`
				--
				ALTER TABLE `products`
				  ADD KEY `CategoryId` (`CategoryId`);

				--
				-- Indices de la tabla `users`
				--
				ALTER TABLE `users`
				  ADD PRIMARY KEY (`id_user`);

				--
				-- AUTO_INCREMENT de las tablas volcadas
				--

				--
				-- AUTO_INCREMENT de la tabla `users`
				--
				ALTER TABLE `users`
				  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

				--
				-- AUTO_INCREMENT de la tabla `category`
				--
				ALTER TABLE `category`
				  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT;

				--
				-- AUTO_INCREMENT de la tabla `products`
				--
				ALTER TABLE `products`
				  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

				--
				-- Restricciones para tablas volcadas
				--

				--
				-- Filtros para la tabla `products`
				--
				ALTER TABLE `products`
				  ADD CONSTRAINT `CategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`CategoryId`);
				COMMIT;
			END;
			$this->db->query($sql);
		}
	}
}