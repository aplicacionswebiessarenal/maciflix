-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2025 a las 12:48:36
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maciflix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cinemas`
--

CREATE TABLE `cinemas` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `timetable` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cinemas`
--

INSERT INTO `cinemas` (`id`, `name`, `img`, `address`, `email`, `timetable`, `telephone`, `instagram`, `twitter`, `facebook`) VALUES
(1, 'Cine Tampa', NULL, 'Carrer de l\'Olivar, 07001, Palma. Mallorca', 'contacto@cinesmallorca.com', 'Lunes 8:00 22:00\r\nMartes 8:00 22:00\r\nMiércoles 8:00 22:00\r\nJueves 8:00 22:00\r\nViernes 8:00 22:00\r\nSábado 8:00 00:00\r\nDomingo 8:00 00:00', '971 12 34 56', 'instagram.com', 'twitter.com', NULL),
(2, 'Cine Cosmo', NULL, 'Carrer del Monestir, 5, 070234, Llucmajor. Mallorca', 'contacto@contactocosmo.com', 'Lunes 8:00 22:00\r\nMartes 8:00 22:00\r\nMiércoles 8:00 22:00\r\nJueves 8:00 22:00\r\nViernes 8:00 22:00\r\nSábado 8:00 00:00\r\nDomingo 8:00 00:00', '657 890 456', NULL, 'twitter.com/cosmos', 'facebook.com/cosmos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `season` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `episodes`
--

INSERT INTO `episodes` (`id`, `name`, `description`, `duration`, `img`, `season`, `id_serie`) VALUES
(1, 'Una sombra del pasado', 'Después de que el Señor Oscuro Morgoth es derrotado, el elfo Finrod muere buscando al sirviente de Morgoth, Sauron . La hermana de Finrod, Galadriel, jura continuar la búsqueda y encuentra una fortaleza abandonada en las tierras baldías del norte de Forodwaith que lleva la marca de Sauron. Sus compañeros insisten en regresar a la capital élfica, Lindon , donde el Gran Rey Gil-galad proclama que la guerra contra las fuerzas de Morgoth ha terminado. Le concede a Galadriel y su compañía el honor de navegar a Valinor , donde pueden vivir una vida eterna en paz. En las Tierras del Sur de la Tierra Media , los elfos vigilan a los hombres descendientes de aliados de Morgoth. Para la desaprobación de los demás elfos y hombres, el elfo Arondir se ha hecho amigo de la curandera humana Bronwyn. Juntos descubren que la aldea de Hordern ha sido destruida, mientras que el hijo de Bronwyn, Theo, encuentra una espada rota que lleva la marca de Sauron. Cerca de Valinor, Galadriel decide regresar y continuar la búsqueda de Sauron, saltando del barco a los Mares Divididos . Al mismo tiempo, dos Harfoots , Nori Brandyfoot y Poppy Proudfellow, descubren a un hombre extraño dentro de un cráter de meteorito.', 59, NULL, 1, 3),
(2, 'A la deriva', 'Mientras nada de regreso a la Tierra Media, Galadriel se encuentra con una balsa con sobrevivientes humanos de un naufragio. Son atacados por un monstruo marino y solo uno sobrevive: Halbrand de las Tierras del Sur, que huye de los orcos . Él y Galadriel trabajan juntos para sobrevivir a una tormenta. Nori y Poppy mantienen al Extraño oculto de los otros Harfoots y le dan comida y refugio. Él no habla su idioma, pero usa luciérnagas y magia aparente para indicar que está buscando una constelación de estrellas que Nori no reconoce. Arondir investiga túneles debajo de Hordern y es capturado. Bronwyn regresa a su propia aldea, Tirharad, donde un orco la ataca a ella y a Theo. Lo matan y convencen al resto de la ciudad, incluido Waldreg, el dueño de la taberna, de que se vayan. Gil-galad envía al semielfo Elrond a Eregion para ayudar al gran herrero elfo Celebrimbor , que planea construir una nueva y poderosa forja. Elrond sugiere que busquen ayuda de los Enanos y se dirige a su amigo el Príncipe Durin IV en Khazad-dûm . Durin IV está enojado porque Elrond no lo ha visitado en 20 años, pero su esposa Disa lo convence de escuchar la propuesta de Elrond.', 57, NULL, 1, 3),
(3, 'Los reyes elfos bajo el cielo', 'En los albores de la Segunda Edad, Sauron es traicionado y aparentemente asesinado por Adar y sus orcos. Sin embargo, sin que Adar lo sepa, el espíritu de Sauron persiste y recupera su forma física siglos después como Halbrand. Halbrand se une a un grupo de habitantes de las Tierras del Sur que huyen y luego naufraga en su viaje a través del mar, donde se encuentra por primera vez con Galadriel.', 57, NULL, 2, 3),
(4, 'Donde las estrellas son extrañas', 'La erupción del Monte del Destino provoca movimientos sísmicos en toda la Tierra Media, lo que provoca un terremoto en Khazad-Dum que destruye gran parte de la agricultura y la infraestructura de la ciudad. Esto amplía aún más la brecha entre Durin III y Durin IV, ya que ambos se muestran reacios a poner fin a su disputa. El Extraño, Nori y Poppy continúan su viaje hacia Rhun. La falta de comida y agua comienza a cansarlos, y el Extraño pronto colapsa por deshidratación. Poppy y Nori encuentran un pozo cerca, pero sin darse cuenta alertan a los jinetes enmascarados, a quienes habían evadido con éxito anteriormente. Al encontrar un bastón en el pozo, el Extraño revivido usa magia para ahuyentar a los jinetes. Celebrimbor, consciente de la falta de confianza en Halbrand, pero no de su verdadera naturaleza, rechaza sus solicitudes de reunirse, pero no obstante le permite quedarse en Eregion. Sin embargo, Halbrand finalmente consigue comunicarse con Celebrimbor, le cuenta sobre el éxito de los anillos élficos y \"revela\" que es Annatar, un enviado de los Valar y el Señor de los Dones. Como Annatar, Sauron le ordena a un Celebrimbor atónito que haga anillos para hombres. Al percibir el interés de Sauron en Celebrimbor, Gil-galad envía a Elrond y Galadriel a Eregion. Más tarde, Durin IV y Disa reciben una invitación de Celebrimbor para ir a Eregion.', 61, NULL, 2, 3),
(5, 'Winter Is Coming', '«Winter Is Coming» es el primer episodio de la serie de televisión de fantasía medieval Juego de tronos, de la cadena HBO. Tiene una duración de 62 minutos y se estrenó el 17 de abril de 2011 en Estados Unidos.1​ Escrito por los creadores del programa David Benioff y D. B. Weiss a manera de fiel adaptación de los primeros capítulos del libro del mismo nombre redactado por George R. R. Martin, «Se acerca el invierno» contó con la dirección de Tim Van Patten, quien partió del trabajo hecho por el director Thomas McCarthy en un piloto inédito.2​\r\n\r\nAl ser el primer episodio de Juego de tronos, introduce al escenario y a los protagonistas de la historia, centrándose en la familia Stark y la manera en que su señor, Eddard, se involucra en las políticas de la corte una vez que el rey, Robert Baratheon, lo nombra como su Mano, en sustitución de su fallecido predecesor, Jon Arryn.', 102, NULL, 1, 2),
(6, 'El Camino Real', '«El Camino Real» es el segundo episodio de la serie de televisión de fantasía medieval Juego de tronos, de la cadena HBO. Tiene una duración de 56 minutos y se transmitió por primera vez el 24 de abril de 2011. Fue escrito por David Benioff y D.B. Weiss, y dirigido por Tim Van Patten.2​\r\n\r\nLa mayor parte del episodio transcurre mientras los protagonistas se hallan viajando: Eddard Stark y sus hijas acompañan al séquito del rey rumbo a Desembarco del Rey para ocupar el puesto de Mano, Tyrion se une a Jon en su viaje hacia el Muro, y la recién casada Daenerys va con el khalasar de su esposo a la ciudad dothraki de Vaes Dothrak. Mientras tanto, en Invernalia, una dolida Catelyn Stark cuida de su inconsciente hijo Bran.', 100, NULL, 1, 2),
(7, 'The North Remembers', '«The North Remembers» es el primer episodio de la segunda temporada de la serie de fantasía medieval Game of Thrones de HBO. Tiene una duración de 53 minutos y se estrenó el 1 de abril de 2012 en Estados Unidos. Fue escrito por sus creadores David Benioff y D. B. Weiss y dirigido por Alan Taylor.\r\n\r\nEl episodio continúa con los personajes de la primera temporada y sus historias, con la mayoría de los protagonistas separados por todos los Siete Reinos después de los dramáticos eventos acaecidos al final de la primera temporada. El episodio incluye a nuevos personajes localizados en Rocadragón, donde el hermano del Rey Robert, Stannis Baratheon, emerge como un nuevo pretendiente al trono.', 102, NULL, 1, 2),
(8, 'The Night Lands', '«The Night Lands» es el segundo episodio de la segunda temporada de la serie de fantasía medieval Game of Thrones de HBO. Tiene una duración de 51 minutos y se estrenó en 2 de abril de 2012 vía Internet por el servicio en línea de HBO GO en algunos países de Europa. Por televisión por suscripción se estrenó en Estados Unidos el 8 de abril de 2012. Fue escrito por sus creadores David Benioff y D. B. Weiss y dirigido por Alan Taylor. El episodio sigue con algunas de las historias del capítulo anterior: la caravana que se dirigía al Muro es detenida por la Guardia de la Ciudad, el Consejo recibe la carta con los términos de la paz de parte de Robb Stark, Daenerys espera por el regreso de los jinetes que ha enviado a explorar y Theon Greyjoy regresa a su hogar, las Islas del Hierro. \"Las tierras de la noche\" es el término usado en el lenguaje dothraki para muerte.', 101, NULL, 1, 2),
(9, 'Episode 1', NULL, 56, NULL, 1, 1),
(10, 'Episode 2', NULL, 58, NULL, 1, 1),
(11, 'Episode 3', NULL, 54, NULL, 1, 1),
(12, 'Episode 4', NULL, 54, NULL, 2, 1),
(13, 'Episode 5', NULL, 56, NULL, 2, 1),
(14, 'Episode 7', NULL, 60, NULL, 2, 1),
(15, 'Episode 8', NULL, 61, NULL, 3, 1),
(16, 'Episode 9', NULL, 62, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `language` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `language`) VALUES
(1, '¿Qué es Maciflix?', 'Maciflix es una plataforma de video en streaming que te permite ver películas y series. Dispone de una tienda, online además de una opción de compra de entradas en cines.', 1),
(2, 'What\'s Maciflix?', 'Maciflix is ​​a video streaming platform that allows you to watch movies and series. It has an online store as well as an option to buy tickets in cinemas.', 2),
(3, 'Qu\'est-ce que Maciflix ?', 'Maciflix est une plateforme de streaming vidéo qui vous permet de regarder des films et des séries. Il dispose d\'une boutique en ligne ainsi que d\'une option d\'achat de billets dans les cinémas.', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `films`
--

CREATE TABLE `films` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 1,
  `onsite` tinyint(1) NOT NULL DEFAULT 0,
  `mylist` tinyint(1) NOT NULL DEFAULT 0,
  `id_cinema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `films`
--

INSERT INTO `films` (`id`, `name`, `description`, `img`, `home`, `onsite`, `mylist`, `id_cinema`) VALUES
(1, 'Terminator', 'Película futurista que hace las delicias de los amantes de la ciencia ficción.', NULL, 1, 0, 0, NULL),
(2, 'Terminator 2', 'La secuela de la película Terminator que hace las delicias de todos los amantes de la primera película.', NULL, 1, 0, 0, 2),
(3, 'Pearl Harbour', 'Vive la emocionante historia de amor entre una enfermera y un aviador enmarcada en el ataque de los japoneses a Pearl Harbour que desencadenó la entrada de EEUU a la Segunda Guerra Mundial. ', NULL, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Español'),
(2, 'English'),
(3, 'Français');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_payment_method` int(11) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`) VALUES
(1, 'Tarjeta de crédito'),
(2, 'Bizum');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `price`, `img`, `stock`) VALUES
(1, 'Camiseta Maciflix', 'Lleva a Maciflix más cerca de tu corazón y permite que los más allegados sepan tus prioridades.', 45.99, NULL, 20),
(2, 'Gorra Maciflix', 'No dejes que tu mente deje nunca de pensar en Maciflix. Pon tus neuronas a trabajar y no hagas spoiler!', 25.75, NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rows` int(11) NOT NULL,
  `columns` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `name`, `rows`, `columns`) VALUES
(1, 'Sala 1', 15, 20),
(2, 'Sala 2', 7, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `n_seasons` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `name`, `description`, `img`, `home`, `n_seasons`) VALUES
(1, 'Peaky Blinders', 'Peaky Blinders es una serie de televisión inglesa de drama histórico, emitida por el canal BBC Two. La serie está protagonizada por Cillian Murphy y se centra en una familia de gánsteres de Birmingham, durante los años veinte y del ascenso de su jefe, Thomas Shelby, un mafioso que dominará toda Inglaterra, después de afrontar una terrible guerra. Shelby, pese a ser un criminal y un mafioso, tiene rasgos antiheroicos, pues es un personaje ambivalente que, pese a su brutalidad, en muchas ocasiones es la única esperanza para terminar con otros villanos que pueden considerarse más viles y mezquinos que él', NULL, 1, 3),
(2, 'Juego de tronos', 'Juego de tronos (en inglés: A Game of Thrones) es una novela de fantasía escrita por el autor estadounidense George R. R. Martin en 1996 y ganadora del premio Locus a la mejor novela de fantasía en 1997.1​ Se trata de la primera entrega de la serie de gran popularidad «Canción de hielo y fuego». La novela se caracteriza por su estética medieval,2​ la descripción de numerosos personajes bien detallados, la contraposición de puntos de vista de los múltiples protagonistas, su trama con giros inesperados y un uso sutil y moderado de los aspectos mágicos tan comunes en otras obras de fantasía heroica.', NULL, 1, 1),
(3, 'El Señor de los Anillos: los Anillos de Poder', 'El Señor de los Anillos: los Anillos de Poder es una serie de televisión producida por Amazon Prime basada en las historias y el universo creado por J.R.R. Tolkien. La serie, creada por J.D. Payne y Patrick McKay, estará basada en acontecimientos anteriores a El Señor de los Anillos, concretamente durante la Segunda Edad del Sol.', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` text DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `surname1` varchar(100) NOT NULL,
  `surname2` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cinemas`
--
ALTER TABLE `cinemas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cinemas`
--
ALTER TABLE `cinemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `films`
--
ALTER TABLE `films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
