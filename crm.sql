-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 04:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `user`, `password`) VALUES
(11, 'Administrador', 'administrador@gmail.com', '1234'),
(3, 'Ing. Adrian Morales', 'admin@gmail.com', 'admin'),
(10, 'admin super', 'superadmin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `campaing`
--

CREATE TABLE `campaing` (
  `campaing_id_gen` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `campaing`
--

INSERT INTO `campaing` (`campaing_id_gen`, `name`, `description`) VALUES
(1, '293355725792533', 'Glamour y Belleza 2021'),
(5, '2888817838015592', 'NavidadSalas-Dic.2020');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id_gen` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `name_warehouse` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id_gen`, `name`, `email`, `mobile`, `name_warehouse`) VALUES
(18, 'lead 4', '', '+593995731577', 'Ambato'),
(19, 'Xavi Rengifo', 'xavi.24061972@hotmail.com', '+593995731577', 'Ambato'),
(20, 'Alexandra Rivadeneira', 'alexa48_94@hotmail.com', '+593990835047', 'Ambato'),
(21, 'lead 5', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(22, 'lead 3333', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(23, 'lead 14', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(24, 'lead 14', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(25, 'lead 140', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(26, 'lead 180', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(28, 'Geidycita Tenorio', 'vivimejiateno@hotmail.com', '+593969998009', 'Guayaquil - Juan Tanca Marengo'),
(29, 'lead 4', '', '+593995731577', 'Ambato'),
(30, 'Xavi Rengifo', 'xavi.24061972@hotmail.com', '+593995731577', 'Ambato'),
(31, 'Alexandra Rivadeneira', 'alexa48_94@hotmail.com', '+593990835047', 'Ambato'),
(32, 'lead 5', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(33, 'lead 3333', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(34, 'lead 14', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(35, 'lead 14', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(36, 'lead 140', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(37, 'lead 180', '', '+593995731577', 'Guayaquil - Juan Tanca Marengo'),
(40, 'lead 1', '', '+593995731577', 'Cuenca - Ordoñez Lasso'),
(41, 'lead 2', '', '+593995731577', 'Cuenca - Ordoñez Lasso'),
(42, 'lead 3', '', '+593995731577', 'Cuenca - Ordoñez Lasso'),
(43, 'lead 7', '', '+593995731577', 'Cuenca - Ordoñez Lasso'),
(44, 'lead 12', '', '+593995731577', 'Cuenca - Ordoñez Lasso'),
(46, 'lead 9', '', '+593995731577', 'Cuenca - Parque Industrial'),
(47, 'lead 4', '', '+593995731577', 'Ambato'),
(48, 'Xavi Rengifo', 'xavi.24061972@hotmail.com', '+593995731577', 'Ambato'),
(49, 'Xavi Rengifo', 'xavi.24061972@hotmail.com', '+593995731577', 'Ambato'),
(50, 'lead 6', '', '+593995731577', 'Quito - Sangolquí');

-- --------------------------------------------------------

--
-- Table structure for table `history_lead_factura`
--

CREATE TABLE `history_lead_factura` (
  `history_lead_factura_id` int(11) NOT NULL,
  `tracking_lead_id` int(10) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(200) NOT NULL,
  `number_factura` int(50) NOT NULL,
  `value_factura` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lead_factura`
--

INSERT INTO `history_lead_factura` (`history_lead_factura_id`, `tracking_lead_id`, `date_create`, `user_name`, `number_factura`, `value_factura`) VALUES
(1, 64, '2021-05-21 14:50:12', 'Adrian Morales', 1253, 263.36),
(2, 64, '2021-05-21 14:50:29', 'Adrian Morales', 45, 15.29),
(3, 64, '2021-05-10 14:53:51', 'Adrian Morales', 265, 1.05),
(4, 63, '2021-05-21 15:02:47', 'Adrian Morales', 26, 23.36),
(5, 63, '2021-05-11 15:02:56', 'Adrian Morales', 156, 15.36),
(6, 68, '2021-05-21 15:04:11', 'Adrian Morales', 154, 78.34),
(7, 68, '2021-05-21 15:04:17', 'Adrian Morales', 7895, 1879.36),
(8, 19, '2021-05-12 15:13:28', 'Ing Carlos Vacanngj', 15, 15.36),
(9, 19, '2021-05-21 15:13:34', 'Ing Carlos Vacanngj', 20, 12.35),
(10, 20, '2021-05-21 15:55:20', 'Adrian Morales', 1, 255.36),
(11, 20, '2021-05-21 15:55:25', 'Adrian Morales', 2, 35.36),
(12, 66, '2021-05-21 16:12:24', 'Adrian Morales', 16, 16.00),
(13, 66, '2021-05-21 16:12:30', 'Adrian Morales', 16, 16.50),
(14, 29, '2021-05-21 22:57:49', 'Adrian Morales', 25, 333333.33),
(15, 29, '2021-05-21 22:57:55', 'Adrian Morales', 58, 7899.36),
(16, 29, '2021-05-21 23:21:05', 'Adrian Morales', 6543, 15.35),
(17, 29, '2021-05-21 23:22:22', 'Adrian Morales', 265, 188888854154.36),
(18, 29, '2021-05-22 03:54:30', 'Adrian Morales', 284, 152.36),
(19, 43, '2021-05-22 03:56:27', 'Ing Carlos Vacanngj', 36, 185.36),
(20, 43, '2021-05-22 03:56:33', 'Ing Carlos Vacanngj', 2, 24.36),
(21, 39, '2021-05-22 03:59:45', 'Adrian Morales', 2, 26.36),
(22, 39, '2021-05-22 04:00:01', 'Adrian Morales', 25, 3584.36),
(23, 77, '2021-05-27 15:28:53', 'Ing. Adrian Morales', 2, 15.60),
(24, 77, '2021-05-27 15:35:36', 'admin super', 265, 565.36),
(25, 77, '2021-05-27 15:43:30', 'Adrian Morales', 65, 65.36),
(26, 77, '2021-05-27 15:45:09', 'admin super', 87, 565.00),
(27, 22, '2021-05-27 15:52:23', 'Ing Carlos Vacanngj', 1, 200.36),
(28, 41, '2021-05-27 16:11:35', 'admin super', 1, 89.36),
(29, 41, '2021-05-27 16:11:43', 'admin super', 2, 2.50),
(30, 38, '2021-05-28 22:52:53', 'Adrian Morales', 3265, 255.36),
(31, 38, '2021-05-28 22:53:06', 'Ing Supervisor', 26, 8879.36);

-- --------------------------------------------------------

--
-- Table structure for table `history_lead_notes`
--

CREATE TABLE `history_lead_notes` (
  `history_lead_notes_id` int(11) NOT NULL,
  `tracking_lead_id` int(10) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(200) NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lead_notes`
--

INSERT INTO `history_lead_notes` (`history_lead_notes_id`, `tracking_lead_id`, `date_create`, `user_name`, `note`) VALUES
(646, 21, '2021-05-18 23:21:41', 'Adrian Morales', 'nueva mnota'),
(647, 21, '2021-05-18 23:21:54', 'Adrian Morales', 'por la razon de la cual se ingresan datos '),
(648, 21, '2021-05-19 13:44:24', 'Adrian Morales', 'xzcxcx'),
(649, 21, '2021-05-19 13:51:46', 'Adrian Morales', 'cxvxcv'),
(650, 21, '2021-05-19 13:51:48', 'Adrian Morales', 'cxvxcv'),
(651, 21, '2021-05-19 13:51:48', 'Adrian Morales', 'cxvxcv'),
(652, 21, '2021-05-19 13:51:49', 'Adrian Morales', 'cxvxcv'),
(653, 21, '2021-05-19 13:57:50', 'Adrian Morales', 'xzczxc'),
(654, 21, '2021-05-19 13:57:52', 'Adrian Morales', 'xzczxc'),
(655, 21, '2021-05-19 13:57:53', 'Adrian Morales', 'xzczxc'),
(656, 21, '2021-05-19 13:57:53', 'Adrian Morales', 'xzczxc'),
(657, 21, '2021-05-19 13:57:54', 'Adrian Morales', 'xzczxc'),
(658, 68, '2021-05-19 14:00:44', 'Adrian Morales', 'hola\n'),
(659, 68, '2021-05-19 14:00:48', 'Adrian Morales', 'cfvdfvdfv'),
(660, 68, '2021-05-19 14:00:53', 'Adrian Morales', 'dfbfdgbtgfbtbtrhb'),
(661, 65, '2021-05-19 14:04:27', 'Adrian Morales', 'nueva nota para Xavier'),
(662, 65, '2021-05-19 14:04:38', 'Adrian Morales', 'prueba'),
(663, 21, '2021-05-19 14:06:14', 'Adrian Morales', 'dsfdf'),
(664, 66, '2021-05-19 14:13:09', 'Adrian Morales', 'ccc'),
(665, 66, '2021-05-19 14:13:13', 'Adrian Morales', ' vcvcv'),
(666, 25, '2021-05-19 14:31:14', 'Adrian Morales', 'nueva nota para lead 7'),
(667, 25, '2021-05-19 14:31:18', 'Adrian Morales', 'otra mas'),
(668, 21, '2021-05-19 14:40:05', 'Adrian Morales', 'dscsdcfd'),
(669, 21, '2021-05-19 14:40:16', 'Adrian Morales', 'sdd'),
(670, 21, '2021-05-19 15:19:46', 'Adrian Morales', 'cvholaaaaaa'),
(671, 21, '2021-05-19 15:24:26', 'Adrian Morales', 'prueba'),
(672, 19, '2021-05-19 15:33:26', 'Ing Carlos Vaca', 'ostuaaaa'),
(673, 21, '2021-05-19 15:56:57', 'Adrian Morales', 'nueva nota'),
(674, 21, '2021-05-19 15:59:24', 'Adrian Morales', 'kkkkkkk'),
(675, 21, '2021-05-19 15:59:29', 'Adrian Morales', 'gbfgb'),
(676, 21, '2021-05-19 15:59:32', 'Adrian Morales', 'gfhfgh'),
(677, 21, '2021-05-19 16:01:48', 'Adrian Morales', 'dscsd'),
(678, 21, '2021-05-19 16:13:24', 'Adrian Morales', 'nuwwww'),
(679, 21, '2021-05-19 16:46:08', 'Adrian Morales', 'fvbdcvdf'),
(680, 0, '2021-05-19 17:16:55', 'Adrian Morales', 'xcvxvds'),
(681, 29, '2021-05-19 17:28:58', 'Adrian Morales', 'vcb cv'),
(682, 29, '2021-05-19 17:29:00', 'Adrian Morales', 'cvb cv'),
(683, 21, '2021-05-19 17:59:25', 'Adrian Morales', 'fvbfvbf'),
(684, 34, '2021-05-19 19:52:35', 'Adrian Morales', 'hola es un prueba'),
(685, 34, '2021-05-19 19:53:15', 'Adrian Morales', 'prueba de que vas a cambiar'),
(686, 21, '2021-05-19 20:16:40', 'Adrian Morales', 'sdsdf'),
(687, 21, '2021-05-19 20:18:33', 'Adrian Morales', 'vbnfvb'),
(688, 21, '2021-05-19 20:18:48', 'Adrian Morales', 'fdfv'),
(689, 29, '2021-05-19 20:19:57', 'Adrian Morales', 'nueva nota para solicitud'),
(690, 21, '2021-05-19 20:21:48', 'Adrian Morales', 'se aplico descuento'),
(691, 29, '2021-05-19 20:25:45', 'Adrian Morales', 'nueva nota para seguimiento lead 10'),
(692, 29, '2021-05-19 20:26:41', 'Adrian Morales', 'otro cambio para seguimiento lead 10 de fecha 2 de mayo '),
(693, 29, '2021-05-19 20:38:53', 'Adrian Morales', 'cvbfxfgfgf'),
(695, 29, '2021-05-19 20:55:40', 'Adrian Morales', 'sadasd'),
(696, 21, '2021-05-19 21:22:15', 'Adrian Morales', 'nueva'),
(697, 21, '2021-05-19 21:25:05', 'Adrian Morales', 'otra nota'),
(698, 29, '2021-05-19 21:51:57', 'Adrian Morales', 'nota para cambio a seguimiento'),
(699, 67, '2021-05-20 14:01:47', 'Adrian Morales', 'primera nota'),
(700, 21, '2021-05-20 16:40:57', 'Adrian Morales', 'xfdgvdfg'),
(701, 38, '2021-05-20 22:07:16', 'Adrian Morales', 'nueva nota para solicitud en lead 16'),
(702, 34, '2021-05-21 13:50:36', 'Adrian Morales', 'listo para las pruebas'),
(703, 34, '2021-05-21 13:54:19', 'Adrian Morales', 'nueva nota para el nuevo nombre'),
(704, 54, '2021-05-22 04:30:22', 'Ing Carlos Vacanngj', 'se paso el estado a cancelado por motivo de desinteres de compra'),
(705, 51, '2021-05-25 19:44:38', 'desarrollo Adrian', 'se comcreto la venta'),
(706, 29, '2021-05-26 18:05:49', 'Adrian Morales', 'bhjhjhgj'),
(707, 29, '2021-05-26 18:05:53', 'Adrian Morales', 'bhjhjhgj'),
(708, 29, '2021-05-26 18:05:55', 'Adrian Morales', 'bhjhjhgj'),
(709, 29, '2021-05-26 18:05:57', 'Adrian Morales', 'bhjhjhgj'),
(710, 29, '2021-05-26 18:05:59', 'Adrian Morales', 'bhjhjhgj'),
(711, 29, '2021-05-26 18:06:17', 'Adrian Morales', 'dvv'),
(712, 29, '2021-05-26 18:06:20', 'Adrian Morales', 'sdasdfsdfsdfsdf'),
(713, 29, '2021-05-26 18:06:26', 'Adrian Morales', 'dascfsdfcsdfsdfvafv'),
(714, 77, '2021-05-27 15:28:13', 'Ing. Adrian Morales', 'adminitrador envia nota'),
(715, 77, '2021-05-27 15:31:26', 'Adrian Morales', 'le paso nuevamente a solictud !!!!!!!!'),
(716, 77, '2021-05-27 15:34:47', 'admin super', 'soy super admion'),
(717, 77, '2021-05-27 15:45:41', 'admin super', 'enviar a cliente a Solicitud'),
(718, 77, '2021-05-27 15:45:47', 'admin super', 'gracias'),
(719, 77, '2021-05-27 15:47:23', 'Adrian Morales', 'se pasa cliente a Solicitud'),
(720, 22, '2021-05-27 15:51:05', 'admin super', 'concretar venta con este cliente autorizado 15848543'),
(721, 22, '2021-05-27 15:52:11', 'Ing Carlos Vacanngj', 'Se concreta venta con el cliente '),
(722, 25, '2021-05-27 15:54:52', 'admin super', 'pasar a cancelado'),
(723, 25, '2021-05-27 15:55:52', 'Adrian Morales', 'se pasa a cancelado'),
(724, 41, '2021-05-27 16:12:36', 'admin super', 'se asigno este cliente a Juan perez\n'),
(725, 41, '2021-05-27 16:17:59', 'Juan Perez', 'se pasa a seguimiento'),
(726, 41, '2021-05-27 16:20:10', 'admin super', 'revisar '),
(727, 41, '2021-05-27 16:25:49', 'Ing. Adrian Morales', 'sdsds'),
(728, 77, '2021-05-28 21:32:25', 'Supervisor', 'hola este es el supervisor'),
(729, 38, '2021-05-28 22:22:18', 'Supervisor', 'Se cambio a solicitud para neuvo seguimiento'),
(730, 38, '2021-05-28 22:49:36', 'Ing Supervisor', '\neste es un nuevo supervisor'),
(731, 38, '2021-05-28 22:50:19', 'Ing Supervisor', 'mover a seguimiento'),
(732, 38, '2021-05-28 22:50:35', 'Adrian Morales', 'Se mueve a seguimiento'),
(733, 66, '2021-05-29 04:24:58', 'Supervisor Adrian', 'nueva nota de supervisor Adrian');

-- --------------------------------------------------------

--
-- Table structure for table `history_lead_proforma`
--

CREATE TABLE `history_lead_proforma` (
  `history_lead_proforma_id` int(11) NOT NULL,
  `tracking_lead_id` int(10) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(200) NOT NULL,
  `number_proforma` int(50) NOT NULL,
  `value_proforma` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lead_proforma`
--

INSERT INTO `history_lead_proforma` (`history_lead_proforma_id`, `tracking_lead_id`, `date_create`, `user_name`, `number_proforma`, `value_proforma`) VALUES
(1, 29, '2021-05-20 17:34:07', 'Adrian Morales', 2184, 2536.36),
(2, 29, '2021-05-20 17:34:54', 'Adrian Morales', 36557, 54.36),
(3, 29, '2021-05-20 17:35:11', 'Adrian Morales', 36557, 54.36),
(4, 29, '2021-05-20 17:35:12', 'Adrian Morales', 36557, 54.36),
(5, 29, '2021-05-20 17:35:13', 'Adrian Morales', 36557, 54.36),
(6, 29, '2021-05-20 17:35:55', 'Adrian Morales', 152, 7852.36),
(7, 29, '2021-05-20 17:36:29', 'Adrian Morales', 0, 4887.60),
(8, 34, '2021-05-20 17:37:12', 'Adrian Morales', 785, 25.37),
(9, 29, '2021-05-20 17:38:11', 'Adrian Morales', 7899, 263.36),
(10, 34, '2021-05-20 17:39:31', 'Adrian Morales', 8962, 15.39),
(11, 34, '2021-05-20 17:39:50', 'Adrian Morales', 15484, 789565448.36),
(12, 34, '2021-05-20 18:06:53', 'Adrian Morales', 25, 1585.36),
(13, 21, '2021-05-20 18:42:29', 'Adrian Morales', 89666, 1587.36),
(14, 21, '2021-05-20 21:57:49', 'Adrian Morales', 58368, 10.00),
(15, 21, '2021-05-20 21:58:25', 'Adrian Morales', 2625, 10.25),
(16, 29, '2021-05-20 21:58:50', 'Adrian Morales', 125874, 1.36),
(17, 34, '2021-05-20 22:04:30', 'Adrian Morales', 15, 25.68),
(18, 38, '2021-05-20 22:09:02', 'Adrian Morales', 1, 15.36),
(19, 38, '2021-05-20 22:09:43', 'Adrian Morales', 2, 1.36),
(20, 38, '2021-05-20 22:10:01', 'Adrian Morales', 3, 2.00),
(21, 38, '2021-05-20 22:10:55', 'Adrian Morales', 4, 1.00),
(22, 38, '2021-05-20 22:11:08', 'Adrian Morales', 5, 2.50),
(23, 38, '2021-05-20 22:11:20', 'Adrian Morales', 4, 4.00),
(24, 38, '2021-05-20 22:11:42', 'Adrian Morales', 62353, 36.00),
(25, 38, '2021-05-20 22:11:52', 'Adrian Morales', 425, 15.00),
(26, 38, '2021-05-20 22:13:08', 'Adrian Morales', 36, 1.50),
(27, 38, '2021-05-20 22:13:21', 'Adrian Morales', 36, 1.59),
(28, 38, '2021-05-20 22:13:39', 'Adrian Morales', 2655, 1.60),
(29, 19, '2021-05-20 22:16:47', 'Ing Carlos Vacanngj', 1, 256.36),
(30, 19, '2021-05-20 22:16:55', 'Ing Carlos Vacanngj', 2365, 25.36),
(31, 19, '2021-05-20 22:17:02', 'Ing Carlos Vacanngj', 3695, 26.36),
(32, 19, '2021-05-20 22:17:29', 'Ing Carlos Vacanngj', 587, 15.36),
(33, 19, '2021-05-20 22:17:40', 'Ing Carlos Vacanngj', 2, 26.00),
(34, 19, '2021-05-20 22:17:49', 'Ing Carlos Vacanngj', 2654, 15.36),
(35, 19, '2021-05-20 22:17:58', 'Ing Carlos Vacanngj', 211, 21515.36),
(36, 19, '2021-05-20 22:24:10', 'Ing Carlos Vacanngj', 778, 0.00),
(37, 34, '2021-05-20 22:50:14', 'Adrian Morales', 36, 15645845.36),
(38, 21, '2021-05-20 23:00:20', 'Adrian Morales', 213154, 25.36),
(39, 21, '2021-05-20 23:00:40', 'Adrian Morales', 656, 2.03),
(40, 48, '2021-05-21 13:42:16', 'Adrian Morales', 265, 15.24),
(41, 48, '2021-05-21 13:42:42', 'Adrian Morales', 65, 265.76),
(42, 34, '2021-05-21 13:50:49', 'Adrian Morales', 12, 253.36),
(43, 39, '2021-05-21 13:54:57', 'Adrian Morales', 151, 15.36),
(44, 64, '2021-05-21 14:57:07', 'Adrian Morales', 2, 783.36),
(45, 64, '2021-05-21 14:57:54', 'Adrian Morales', 265, 296.36),
(46, 63, '2021-05-21 15:02:41', 'Adrian Morales', 1523, 12.36),
(47, 68, '2021-05-21 15:03:44', 'Adrian Morales', 15, 152.36),
(48, 68, '2021-05-21 15:03:54', 'Adrian Morales', 15, 489.36),
(49, 68, '2021-05-21 15:04:00', 'Adrian Morales', 36, 789.36),
(50, 20, '2021-05-21 15:53:58', 'Adrian Morales', 152, 158.36),
(51, 20, '2021-05-21 15:54:05', 'Adrian Morales', 36, 69.34),
(52, 66, '2021-05-21 16:12:12', 'Adrian Morales', 15, 15.00),
(53, 66, '2021-05-21 16:12:18', 'Adrian Morales', 15, 15.50),
(54, 43, '2021-05-22 03:55:51', 'Ing Carlos Vacanngj', 1, 25.36),
(55, 43, '2021-05-22 03:56:16', 'Ing Carlos Vacanngj', 2, 587.69),
(56, 54, '2021-05-22 04:30:50', 'Ing Carlos Vacanngj', 72, 25.36),
(57, 54, '2021-05-22 04:30:57', 'Ing Carlos Vacanngj', 8945874, 1748.36),
(58, 54, '2021-05-22 04:31:41', 'Ing Carlos Vacanngj', 34, 2.00),
(59, 77, '2021-05-26 22:12:29', 'Adrian Morales', 1, 255.36),
(60, 77, '2021-05-26 22:12:36', 'Adrian Morales', 51541, 25211.36),
(61, 77, '2021-05-26 22:50:51', 'Adrian Morales', 65, 2632.00),
(62, 77, '2021-05-27 15:28:44', 'Ing. Adrian Morales', 154, 2563.60),
(63, 77, '2021-05-27 15:35:25', 'admin super', 37, 68963.00),
(64, 41, '2021-05-27 16:11:16', 'admin super', 1, 15.36),
(65, 41, '2021-05-28 21:45:11', 'Supervisor', 254, 2365.36),
(66, 41, '2021-05-28 21:47:05', 'Supervisor', 5, 256484.60),
(67, 40, '2021-05-28 22:26:35', 'Supervisor', 1, 1100.00),
(68, 38, '2021-05-28 22:52:33', 'Ing Supervisor', 25, 66.40);

-- --------------------------------------------------------

--
-- Table structure for table `history_lead_status`
--

CREATE TABLE `history_lead_status` (
  `history_lead_status_id` int(11) NOT NULL,
  `tracking_lead_id` int(10) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history_lead_status`
--

INSERT INTO `history_lead_status` (`history_lead_status_id`, `tracking_lead_id`, `date_create`, `user_name`, `status`) VALUES
(1, 21, '2021-05-19 16:13:50', 'Adrian Morales', 'Solicitud'),
(2, 21, '2021-05-19 16:16:37', 'Adrian Morales', 'Seguimiento'),
(3, 21, '2021-05-19 16:17:31', 'Adrian Morales', 'Solicitud'),
(4, 21, '2021-05-19 16:18:05', 'Adrian Morales', 'Cancelado'),
(5, 21, '2021-05-19 16:20:55', 'Adrian Morales', 'Seguimiento'),
(6, 21, '2021-05-19 16:21:28', 'Adrian Morales', 'Solicitud'),
(7, 21, '2021-05-19 16:43:06', 'Adrian Morales', 'Solicitud'),
(8, 21, '2021-05-19 16:43:33', 'Adrian Morales', 'Seguimiento'),
(9, 21, '2021-05-19 16:44:04', 'Adrian Morales', 'Solicitud'),
(10, 21, '2021-05-19 16:46:26', 'Adrian Morales', 'Seguimiento'),
(11, 21, '2021-05-19 16:47:44', 'Adrian Morales', 'Solicitud'),
(12, 21, '2021-05-19 16:58:42', 'Adrian Morales', 'Seguimiento'),
(13, 21, '2021-05-19 17:02:09', 'Adrian Morales', 'Solicitud'),
(14, 21, '2021-05-19 17:06:29', 'Adrian Morales', 'Seguimiento'),
(15, 21, '2021-05-19 17:08:34', 'Adrian Morales', 'Solicitud'),
(16, 21, '2021-05-19 17:15:53', 'Adrian Morales', 'Seguimiento'),
(17, 29, '2021-05-19 17:20:17', 'Adrian Morales', 'Seguimiento'),
(18, 21, '2021-05-19 17:27:06', 'Adrian Morales', 'Solicitud'),
(19, 29, '2021-05-19 17:29:06', 'Adrian Morales', 'Solicitud'),
(20, 21, '2021-05-19 17:29:58', 'Adrian Morales', 'Seguimiento'),
(21, 29, '2021-05-19 17:30:39', 'Adrian Morales', 'Seguimiento'),
(22, 21, '2021-05-19 17:31:46', 'Adrian Morales', 'Solicitud'),
(23, 21, '2021-05-19 17:35:22', 'Adrian Morales', 'Seguimiento'),
(24, 21, '2021-05-19 17:36:21', 'Adrian Morales', 'Solicitud'),
(25, 21, '2021-05-19 17:39:23', 'Adrian Morales', 'Seguimiento'),
(26, 34, '2021-05-19 17:41:16', 'Adrian Morales', 'Seguimiento'),
(27, 21, '2021-05-19 17:48:24', 'Adrian Morales', 'Solicitud'),
(28, 29, '2021-05-19 17:54:54', 'Adrian Morales', 'Solicitud'),
(29, 34, '2021-05-19 17:57:42', 'Adrian Morales', 'Seguimiento'),
(30, 34, '2021-05-19 17:57:47', 'Adrian Morales', 'Solicitud'),
(31, 21, '2021-05-19 17:59:43', 'Adrian Morales', 'Seguimiento'),
(32, 21, '2021-05-19 18:07:24', 'Adrian Morales', 'Seguimiento'),
(33, 21, '2021-05-19 18:07:28', 'Adrian Morales', 'Solicitud'),
(34, 21, '2021-05-19 18:08:10', 'Adrian Morales', 'Seguimiento'),
(35, 21, '2021-05-19 18:09:15', 'Adrian Morales', 'Solicitud'),
(36, 21, '2021-05-19 18:11:14', 'Adrian Morales', 'Seguimiento'),
(37, 21, '2021-05-19 18:12:23', 'Adrian Morales', 'Seguimiento'),
(38, 21, '2021-05-19 18:12:59', 'Adrian Morales', 'Solicitud'),
(39, 21, '2021-05-19 18:36:13', 'Adrian Morales', 'Seguimiento'),
(40, 21, '2021-05-19 18:39:15', 'Adrian Morales', 'Solicitud'),
(41, 21, '2021-05-19 18:40:54', 'Adrian Morales', 'Seguimiento'),
(42, 21, '2021-05-19 18:55:39', 'Adrian Morales', 'Solicitud'),
(43, 21, '2021-05-19 19:04:37', 'Adrian Morales', 'Seguimiento'),
(44, 21, '2021-05-19 19:11:22', 'Adrian Morales', 'Solicitud'),
(45, 21, '2021-05-19 19:15:25', 'Adrian Morales', 'Seguimiento'),
(46, 21, '2021-05-19 19:34:13', 'Adrian Morales', 'Solicitud'),
(47, 21, '2021-05-19 19:37:22', 'Adrian Morales', 'Seguimiento'),
(48, 21, '2021-05-19 19:40:22', 'Adrian Morales', 'Solicitud'),
(49, 21, '2021-05-19 19:41:33', 'Adrian Morales', 'Seguimiento'),
(50, 29, '2021-05-19 19:41:51', 'Adrian Morales', 'Seguimiento'),
(51, 21, '2021-05-19 19:42:09', 'Adrian Morales', 'Concretado'),
(52, 29, '2021-05-19 19:48:06', 'Adrian Morales', 'Solicitud'),
(53, 53, '2021-05-19 19:50:53', 'Adrian Morales', 'Seguimiento'),
(54, 48, '2021-05-19 19:51:10', 'Adrian Morales', 'Seguimiento'),
(55, 29, '2021-05-19 19:51:20', 'Adrian Morales', 'Seguimiento'),
(56, 34, '2021-05-19 19:53:34', 'Adrian Morales', 'Seguimiento'),
(57, 34, '2021-05-19 19:55:01', 'Adrian Morales', 'Solicitud'),
(58, 63, '2021-05-19 20:01:31', 'Adrian Morales', 'Seguimiento'),
(59, 64, '2021-05-19 20:01:45', 'Adrian Morales', 'Seguimiento'),
(60, 53, '2021-05-19 20:02:05', 'Adrian Morales', 'Solicitud'),
(61, 34, '2021-05-19 20:11:48', 'Adrian Morales', 'Seguimiento'),
(62, 21, '2021-05-19 20:12:44', 'Adrian Morales', 'Seguimiento'),
(63, 21, '2021-05-19 20:13:07', 'Adrian Morales', 'Solicitud'),
(64, 29, '2021-05-19 20:20:07', 'Adrian Morales', 'Solicitud'),
(65, 21, '2021-05-19 20:22:29', 'Adrian Morales', 'Solicitud'),
(66, 21, '2021-05-19 20:22:47', 'Adrian Morales', 'Solicitud'),
(67, 21, '2021-05-19 20:23:16', 'Adrian Morales', 'Seguimiento'),
(68, 21, '2021-05-19 20:23:34', 'Adrian Morales', 'Solicitud'),
(69, 29, '2021-05-19 20:25:56', 'Adrian Morales', 'Seguimiento'),
(70, 29, '2021-05-19 20:26:47', 'Adrian Morales', 'Solicitud'),
(71, 29, '2021-05-19 20:39:03', 'Adrian Morales', 'Solicitud'),
(72, 34, '2021-05-19 20:50:04', 'Adrian Morales', 'Solicitud'),
(73, 21, '2021-05-19 20:54:37', 'Adrian Morales', 'Seguimiento'),
(74, 21, '2021-05-19 20:55:04', 'Adrian Morales', 'Solicitud'),
(75, 29, '2021-05-19 20:55:54', 'Adrian Morales', 'Solicitud'),
(76, 25, '2021-05-19 20:56:30', 'Adrian Morales', 'Seguimiento'),
(77, 20, '2021-05-19 20:58:13', 'Adrian Morales', 'Seguimiento'),
(78, 20, '2021-05-19 20:58:50', 'Adrian Morales', 'Solicitud'),
(79, 21, '2021-05-19 21:22:29', 'Adrian Morales', 'Seguimiento'),
(80, 21, '2021-05-19 21:22:53', 'Adrian Morales', 'Solicitud'),
(81, 21, '2021-05-19 21:44:21', 'Adrian Morales', 'Seguimiento'),
(82, 29, '2021-05-19 21:52:04', 'Adrian Morales', 'Seguimiento'),
(83, 21, '2021-05-19 22:56:05', 'Adrian Morales', 'Solicitud'),
(84, 29, '2021-05-19 22:56:26', 'Adrian Morales', 'Solicitud'),
(85, 21, '2021-05-20 16:41:03', 'Adrian Morales', 'Seguimiento'),
(86, 29, '2021-05-20 16:56:37', 'Adrian Morales', 'Seguimiento'),
(87, 29, '2021-05-20 16:56:50', 'Adrian Morales', 'Solicitud'),
(88, 29, '2021-05-20 16:57:03', 'Adrian Morales', 'Seguimiento'),
(89, 29, '2021-05-20 16:57:17', 'Adrian Morales', 'Solicitud'),
(90, 29, '2021-05-20 17:37:57', 'Adrian Morales', 'Seguimiento'),
(91, 38, '2021-05-20 22:08:14', 'Adrian Morales', 'Seguimiento'),
(92, 34, '2021-05-21 13:50:42', 'Adrian Morales', 'Seguimiento'),
(93, 39, '2021-05-21 13:51:46', 'Adrian Morales', 'Seguimiento'),
(94, 19, '2021-05-21 15:37:04', 'Ing Carlos Vacanngj', 'Seguimiento'),
(95, 21, '2021-05-21 16:10:14', 'Adrian Morales', 'Concretado'),
(96, 63, '2021-05-21 16:10:29', 'Adrian Morales', 'Cancelado'),
(97, 66, '2021-05-21 16:12:07', 'Adrian Morales', 'Cancelado'),
(98, 42, '2021-05-21 19:55:17', 'Adrian Morales', 'Cancelado'),
(99, 53, '2021-05-21 19:55:33', 'Adrian Morales', 'Cancelado'),
(100, 59, '2021-05-21 19:55:40', 'Adrian Morales', 'Concretado'),
(101, 19, '2021-05-21 21:48:36', 'Ing Carlos Vacanngj', 'Concretado'),
(102, 65, '2021-05-21 21:53:47', 'Adrian Morales', 'Seguimiento'),
(103, 67, '2021-05-21 21:53:55', 'Adrian Morales', 'Seguimiento'),
(104, 22, '2021-05-21 21:57:51', 'Ing Carlos Vacanngj', 'Seguimiento'),
(105, 43, '2021-05-21 21:57:58', 'Ing Carlos Vacanngj', 'Seguimiento'),
(106, 54, '2021-05-21 21:58:02', 'Ing Carlos Vacanngj', 'Seguimiento'),
(107, 69, '2021-05-21 21:58:08', 'Ing Carlos Vacanngj', 'Seguimiento'),
(108, 74, '2021-05-21 21:58:14', 'Ing Carlos Vacanngj', 'Seguimiento'),
(109, 37, '2021-05-21 22:03:35', 'desarrollo Adrian', 'Seguimiento'),
(110, 51, '2021-05-21 22:03:39', 'desarrollo Adrian', 'Seguimiento'),
(111, 62, '2021-05-21 22:03:44', 'desarrollo Adrian', 'Seguimiento'),
(112, 54, '2021-05-22 04:29:59', 'Ing Carlos Vacanngj', 'Cancelado'),
(113, 78, '2021-05-25 19:40:46', 'Ing Carlos Vacanngj', 'Cancelado'),
(114, 19, '2021-05-25 19:42:26', 'Ing Carlos Vacanngj', 'Cancelado'),
(115, 37, '2021-05-25 19:44:15', 'desarrollo Adrian', 'Solicitud'),
(116, 51, '2021-05-25 19:44:28', 'desarrollo Adrian', 'Concretado'),
(117, 62, '2021-05-25 19:46:05', 'desarrollo Adrian', 'Concretado'),
(118, 77, '2021-05-27 15:28:28', 'Ing. Adrian Morales', 'Seguimiento'),
(119, 77, '2021-05-27 15:31:33', 'Adrian Morales', 'Solicitud'),
(120, 77, '2021-05-27 15:35:46', 'admin super', 'Cancelado'),
(121, 77, '2021-05-27 15:47:18', 'Adrian Morales', 'Solicitud'),
(122, 22, '2021-05-27 15:52:35', 'Ing Carlos Vacanngj', 'Concretado'),
(123, 25, '2021-05-27 15:55:57', 'Adrian Morales', 'Cancelado'),
(124, 25, '2021-05-27 15:56:47', 'Adrian Morales', 'Seguimiento'),
(125, 25, '2021-05-27 15:57:18', 'Adrian Morales', 'Cancelado'),
(126, 41, '2021-05-27 16:18:03', 'Juan Perez', 'Seguimiento'),
(127, 41, '2021-05-27 16:20:36', 'admin super', 'Solicitud'),
(128, 77, '2021-05-28 21:34:43', 'Supervisor', 'Cancelado'),
(129, 77, '2021-05-28 21:35:21', 'Adrian Morales', 'Solicitud'),
(130, 41, '2021-05-28 21:44:32', 'Supervisor', 'Cancelado'),
(131, 41, '2021-05-28 22:15:53', 'Supervisor', 'Solicitud'),
(132, 38, '2021-05-28 22:22:05', 'Supervisor', 'Solicitud'),
(133, 38, '2021-05-28 22:50:42', 'Adrian Morales', 'Seguimiento'),
(134, 38, '2021-05-28 22:51:26', 'Ing Supervisor', 'Concretado');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id_lead_gen` int(11) NOT NULL,
  `name_lead` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'P',
  `city_warehouse` varchar(100) NOT NULL,
  `date_create` date DEFAULT NULL,
  `form_id` varchar(600) NOT NULL,
  `platform` varchar(15) NOT NULL,
  `campaing_id` varchar(300) NOT NULL,
  `campaing_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='lead';

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id_lead_gen`, `name_lead`, `mobile_number`, `email`, `status`, `city_warehouse`, `date_create`, `form_id`, `platform`, `campaing_id`, `campaing_name`) VALUES
(1, 'lead 1', '+593995731577', '', 'A', 'Cuenca - Ordoñez Lasso', NULL, '', '', '', ''),
(2, 'lead 2', '+593995731577', '', 'A', 'Cuenca - Ordoñez Lasso', NULL, '', '', '', ''),
(3, 'lead 3', '+593995731577', '', 'A', 'Cuenca - Ordoñez Lasso', NULL, '', '', '', ''),
(4, 'lead 4', '+593995731577', '', 'A', 'Ambato', NULL, '', '', '', ''),
(5, 'lead 5', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(6, 'lead 6', '+593995731577', '', 'A', 'Quito - Sangolquí', NULL, '', '', '', ''),
(7, 'lead 7', '+593995731577', '', 'A', 'Cuenca - Ordoñez Lasso', NULL, '', '', '', ''),
(8, 'lead 8', '+593995731577', '', 'P', 'Cuenca - Remigio Crespo', NULL, '', '', '', ''),
(9, 'lead 9', '+593995731577', '', 'A', 'Cuenca - Parque Industrial', NULL, '', '', '', ''),
(10, 'lead 10', '+593995731577', '', 'P', 'Guayaquil - Dicentro', NULL, '', '', '', ''),
(11, 'lead 11', '+593995731577', '', 'P', 'Quito - Cumbayá', NULL, '', '', '', ''),
(12, 'lead 12', '+593995731577', '', 'A', 'Cuenca - Ordoñez Lasso', NULL, '', '', '', ''),
(16, 'lead 16', '+593995731577', '', 'A', 'Quito - 6 de diciembre', NULL, '', '', '', ''),
(44, 'lead 3333', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(45, 'lead 14', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(46, 'lead 14', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(50, 'lead 140', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(52, 'lead 180', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(53, 'lead 180', '+593995731577', '', 'A', 'Guayaquil - Juan Tanca Marengo', NULL, '', '', '', ''),
(62, 'Xavi Rengifo', '+593995731577', 'xavi.24061972@hotmail.com', 'A', 'Ambato', '2021-05-07', '293355725792533', 'fb', '23847790199880399', 'MAYO 2021 - Glamour y Belleza'),
(63, 'Geidycita Tenorio', '+593969998009', 'vivimejiateno@hotmail.com', 'A', 'Guayaquil - Juan Tanca Marengo', '2021-05-07', '293355725792533', 'fb', '23847790199880399', 'MAYO 2021 - Glamour y Belleza'),
(64, 'Alexandra Rivadeneira', '+593990835047', 'alexa48_94@hotmail.com', 'A', 'Ambato', '2021-05-07', '293355725792533', 'fb', '23847790199880399', 'MAYO 2021 - Glamour y Belleza');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id_gen` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id_gen`, `order_status`, `name`, `status`) VALUES
(1, 1, 'Solicitud', 1),
(2, 2, 'Seguimiento', 1),
(3, 3, 'Concretado', 1),
(4, 4, 'Cancelado', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id_gen` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `city_warehouse` varchar(250) NOT NULL,
  `rol` varchar(100) NOT NULL DEFAULT 'supervisor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id_gen`, `name`, `email`, `password`, `city_warehouse`, `rol`) VALUES
(5, 'Ing Supervisor', 'supervisor@gmail.com', 'supervisor', 'Quito - 6 de diciembre, Quito - Cumbayá, Quito - Sangolquí', 'supervisor'),
(6, 'Supervisor Adrian', 'sadrian@gmail.com', '123', 'Ambato, Guayaquil - Juan Tanca Marengo, Quito - Sangolquí', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `tracking_lead`
--

CREATE TABLE `tracking_lead` (
  `tracking_lead_id_gen` int(11) NOT NULL,
  `name_lead` varchar(100) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `city_warehouse` varchar(100) NOT NULL,
  `email_lead` varchar(100) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `email_user_name` varchar(150) NOT NULL,
  `date_create` date NOT NULL,
  `platform` varchar(9) NOT NULL,
  `form_id` varchar(200) NOT NULL,
  `status_name` varchar(100) NOT NULL,
  `proforma` int(11) DEFAULT NULL,
  `proforma_total` double(18,2) DEFAULT NULL,
  `factura` int(11) DEFAULT NULL,
  `factura_total` double(18,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tracking_lead`
--

INSERT INTO `tracking_lead` (`tracking_lead_id_gen`, `name_lead`, `mobile_number`, `city_warehouse`, `email_lead`, `user_name`, `email_user_name`, `date_create`, `platform`, `form_id`, `status_name`, `proforma`, `proforma_total`, `factura`, `factura_total`) VALUES
(19, 'lead 4', '+593995731577', 'Ambato', '', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-01', 'fb', '293355725792533', 'Cancelado', 8, 21880.16, 2, 27.71),
(20, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-04-07', 'fb', '293355725792533', 'Solicitud', 2, 227.70, 2, 290.72),
(21, 'Alexandra Rivadeneira', '+593990835047', 'Ambato', 'alexa48_94@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-09', 'fb', '293355725792533', 'Concretado', 5, 1635.00, NULL, NULL),
(22, 'lead 1', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-03', 'fb', '293355725792533', 'Concretado', NULL, NULL, 1, 200.36),
(23, 'lead 2', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Consultas Duramas', 'consultas@duramas.com.ec', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(24, 'lead 3', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(25, 'lead 7', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-04-07', 'ig', '293355725792533', 'Cancelado', NULL, NULL, NULL, NULL),
(26, 'lead 12', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(27, 'lead 9', '+593995731577', 'Cuenca - Parque Industrial', '', 'Ing. Luisa Tapia', 'ltapia@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(28, 'lead 8', '+593995731577', 'Cuenca - Remigio Crespo', '', 'Ing. Adrian Rios', 'arios@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(29, 'lead 10', '+593995731577', 'Guayaquil - Dicentro', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-04', 'fb', '293355725792533', 'Seguimiento', 9, 15758.48, 5, 188889195554.76),
(30, 'lead 5', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(31, 'lead 3333', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(32, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Juan Perez', 'jperez@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(33, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing. Luis Tamay', 'ltamay@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(34, 'lead 1405656565', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-06', 'fb', '293355725792533', 'Seguimiento', 7, 805213198.88, NULL, NULL),
(35, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(36, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(37, 'Geidycita Tenorio', '+593969998009', 'Guayaquil - Juan Tanca Marengo', 'vivimejiateno@hotmail.com', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '2021-05-07', 'fb', '293355725792533', 'Solicitud', NULL, NULL, NULL, NULL),
(38, 'lead 16', '+593995731577', 'Quito - 6 de diciembre', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-09', 'fb', '293355725792533', 'Concretado', 12, 148.31, 2, 9134.72),
(39, 'lead 11', '+593995731577', 'Quito - Cumbayá', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-07', 'ig', '293355725792533', 'Seguimiento', 1, 15.36, 2, 3610.72),
(40, 'lead 6', '+593995731577', 'Quito - Sangolquí', '', 'Ing. Luisa Tapia', 'ltapia@gmail.com', '2021-05-09', 'fb', '293355725792533', 'Solicitud', 1, 1100.00, NULL, NULL),
(41, 'lead 4', '+593995731577', 'Ambato', '', 'Juan Perez', 'jperez@gmail.com', '2021-05-07', 'fb', '2888817838015592', 'Solicitud', 3, 258865.32, 2, 91.86),
(42, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-07', 'ig', '293355725792533', 'Cancelado', NULL, NULL, NULL, NULL),
(43, 'Alexandra Rivadeneira', '+593990835047', 'Ambato', 'alexa48_94@hotmail.com', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-10', 'fb', '293355725792533', 'Seguimiento', 2, 613.05, 2, 209.72),
(44, 'lead 5', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(45, 'lead 3333', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(46, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Juan Perez', 'jperez@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(47, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing. Luis Tamay', 'ltamay@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(48, 'lead 140', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-12', 'fb', '293355725792533', 'Seguimiento', 2, 281.00, NULL, NULL),
(49, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(50, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(51, 'Geidycita Tenorio', '+593969998009', 'Guayaquil - Juan Tanca Marengo', 'vivimejiateno@hotmail.com', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '2021-05-15', 'fb', '293355725792533', 'Concretado', NULL, NULL, NULL, NULL),
(52, 'lead 4', '+593995731577', 'Ambato', '', 'Juan Perez', 'jperez@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(53, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-20', 'ig', '293355725792533', 'Cancelado', NULL, NULL, NULL, NULL),
(54, 'Alexandra Rivadeneira', '+593990835047', 'Ambato', 'alexa48_94@hotmail.com', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-28', 'fb', '293355725792533', 'Cancelado', 3, 1775.72, NULL, NULL),
(55, 'lead 5', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(56, 'lead 3333', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(57, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Juan Perez', 'jperez@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(58, 'lead 14', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing. Luis Tamay', 'ltamay@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(59, 'lead 140', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-25', 'ig', '293355725792533', 'Concretado', NULL, NULL, NULL, NULL),
(60, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(61, 'lead 180', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Arianna Quimi', 'aquimi@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(62, 'Geidycita Tenorio', '+593969998009', 'Guayaquil - Juan Tanca Marengo', 'vivimejiateno@hotmail.com', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '2021-05-07', 'fb', '293355725792533', 'Concretado', NULL, NULL, NULL, NULL),
(63, 'lead 16', '+593995731577', 'Quito - 6 de diciembre', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-30', 'fb', '293355725792533', 'Cancelado', 1, 12.36, 2, 38.72),
(64, 'lead 11', '+593995731577', 'Quito - Cumbayá', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-07', 'ig', '293355725792533', 'Seguimiento', 2, 1079.72, 3, 279.70),
(65, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-27', 'fb', '293355725792533', 'Seguimiento', NULL, NULL, NULL, NULL),
(66, 'lead 140', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-27', 'ig', '293355725792533', 'Cancelado', 2, 30.50, 2, 32.50),
(67, 'Xavi Rengifo lll', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-14', 'fb', '293355725792533', 'Seguimiento', NULL, NULL, NULL, NULL),
(68, 'lead 140', '+593995731577', 'Guayaquil - Juan Tanca Marengo', '', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-15', 'fb', '293355725792533', 'Seguimiento', 3, 1431.08, 2, 1957.70),
(69, 'lead 1', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-16', 'fb', '293355725792533', 'Seguimiento', NULL, NULL, NULL, NULL),
(70, 'lead 2', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Consultas Duramas', 'consultas@duramas.com.ec', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(71, 'lead 3', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(72, 'lead 7', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Adrian Morales', 'armj1zxcsd923@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(73, 'lead 12', '+593995731577', 'Cuenca - Ordoñez Lasso', '', 'Ing.Dalila Lema', 'dlema@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(74, 'lead 16', '+593995731577', 'Quito - 6 de diciembre', '', 'Ing Carlos Vaca', 'cvaca@gmail.com', '2021-05-17', 'fb', '293355725792533', 'Seguimiento', NULL, NULL, NULL, NULL),
(75, 'lead 9', '+593995731577', 'Cuenca - Parque Industrial', '', 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '0000-00-00', 'ig', '', 'Solicitud', NULL, NULL, NULL, NULL),
(76, 'lead 4', '+593995731577', 'Ambato', '', 'Juan Perez', 'jperez@gmail.com', '0000-00-00', 'fb', '', 'Solicitud', NULL, NULL, NULL, NULL),
(77, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Adrian Morales', 'armj1923@gmail.com', '2021-05-07', 'fb', '2888817838015592', 'Solicitud', 5, 99625.32, 4, 1211.32),
(78, 'Xavi Rengifo', '+593995731577', 'Ambato', 'xavi.24061972@hotmail.com', 'Ing Carlos Vacanngj', 'cvaca@gmail.com', '2021-05-07', 'fb', '293355725792533', 'Cancelado', NULL, NULL, NULL, NULL),
(79, 'lead 6', '+593995731577', 'Quito - Sangolquí', '', 'Ing. Luis Tamay', 'ltamay@gmail.com', '2021-05-09', 'ig', '293355725792533', 'Solicitud', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alt_email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `posting_date` timestamp NULL DEFAULT current_timestamp(),
  `city_warehouse` varchar(100) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `alt_email`, `password`, `mobile`, `gender`, `user_image`, `address`, `status`, `posting_date`, `city_warehouse`, `rol`) VALUES
(33, 'Ing. Luis Tamay', 'ltamay@gmail.com', 'tamay@gmail.com', 'amorales', '0983657491', 'm', NULL, 'prueba de dirección dos', 1, '2021-05-05 22:35:35', 'Guayaquil - Juan Tanca Marengo, Quito - Sangolquí', 'user'),
(32, 'Juan Perez', 'jperez@gmail.com', '', '1234', '0983657491', 'm', NULL, '', 1, '2021-05-05 22:30:58', 'Quito - 6 de diciembre, Ambato, Guayaquil - Juan Tanca Marengo', 'user'),
(28, 'Adrian Morales', 'armj1923@gmail.com', '', 'amorales', '0983657491', 'm', NULL, 'Los Alamos 2-62\r\ny Arrayan Atras de la bomba eloy alfaro', 1, '2021-05-05 21:34:24', 'Ambato, Guayaquil - Juan Tanca Marengo', 'user'),
(29, 'Ing Carlos Vaca', 'cvaca@gmail.com', '', '1234', '0983657491', 'm', NULL, '', 1, '2021-05-05 21:40:46', 'Quito - 6 de diciembre, Ambato, Cuenca - Ordoñez Lasso', 'user'),
(30, 'Ing.Dalila Lema', 'dlema@gmail.com', '', '1234', '0983657491', 'f', NULL, '', 1, '2021-05-05 21:44:48', 'Cuenca - Ordoñez Lasso, Guayaquil - Juan Tanca Marengo', 'user'),
(31, 'Ing. Adrian Rios', 'arios@gmail.com', '', '1234', '0983657491', 'm', NULL, '', 1, '2021-05-05 22:11:29', 'Cuenca - Parque Industrial, Cuenca - Remigio Crespo', 'user'),
(34, 'Ing. Luisa Tapia', 'ltapia@gmail.com', '', '1234', '0983657491', 'f', NULL, '', 1, '2021-05-05 22:37:01', 'Quito - Sangolquí, Cuenca - Parque Industrial', 'user'),
(36, 'Arianna Quimi', 'aquimi@gmail.com', '', '1234', '0986254741', 'f', NULL, '', 1, '2021-05-11 14:15:15', 'Guayaquil - Juan Tanca Marengo, Guayaquil - Dicentro', 'user'),
(68, 'desarrollo Adrian', 'desarrollador@duramas.com.ec', '', '1234', '0983657491', 'm', NULL, '', 1, '2021-05-15 19:38:49', 'Cuenca - Parque Industrial', 'user'),
(69, 'Consultas Duramas', 'consultas@duramas.com.ec', '', '1234', '0983657491', 'm', NULL, '', 1, '2021-05-15 19:39:21', 'Cuenca - Ordoñez Lasso', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `usercheck`
--

CREATE TABLE `usercheck` (
  `id` int(11) NOT NULL,
  `logindate` date DEFAULT NULL,
  `logintime` varchar(255) DEFAULT '',
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT '',
  `ip` varbinary(16) DEFAULT NULL,
  `mac` varbinary(16) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usercheck`
--

INSERT INTO `usercheck` (`id`, `logindate`, `logintime`, `user_id`, `username`, `email`, `ip`, `mac`, `city`, `country`) VALUES
(91, '2015-04-28', '04:37:40pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x31452d38352d35362d43352d39312d45, '', ''),
(92, '2015-04-29', '02:57:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e302e323431, '', 'Delhi', 'India'),
(93, '2015-04-30', '04:27:02pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(94, '2015-04-30', '05:23:55pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e3134322e3138, '', 'Delhi', 'India'),
(95, '2015-05-18', '01:18:51pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3132322e3136322e382e313830, '', 'Delhi', 'India'),
(96, '2015-11-05', '09:30:36pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x33342d34422d35302d42372d45462d33, '', ''),
(97, '2015-11-13', '12:05:39am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(98, '2015-12-14', '09:36:01pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(99, '2021-04-05', '09:47:08pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(100, '2016-04-07', '12:17:50am', 7, 'Rahul', 'rahul@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(101, '2021-04-05', '09:37:54am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(102, '2021-04-05', '09:55:45pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(103, '2016-04-26', '08:19:12pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(104, '2016-04-26', '08:26:18pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(105, '2016-04-30', '11:59:25pm', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(106, '2016-04-30', '12:30:10am', 3, 'Anuj kumar', 'anuj.lpu1@gmail.com', 0x3a3a31, 0x42432d38352d35362d43352d39312d45, '', ''),
(107, '2019-07-11', '12:27:21pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(108, '2019-07-15', '12:12:00pm', 9, 'Anuj', 'anuj@gmail.com', 0x3a3a31, 0x33432d35322d38322d35312d41352d42, '', ''),
(109, '2019-08-06', '11:39:30pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(110, '2019-08-10', '04:51:41pm', 11, 'Test user', 'testuser@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(111, '2021-04-19', '04:54:44pm', 12, 'ABc', 'abc@gmail.com', 0x3a3a31, 0x31322d46342d38442d31322d39392d39, '', ''),
(899, '2021-05-11', '02:24:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(898, '2021-05-01', '02:24:44pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(900, '2021-05-31', '08:47:27am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(901, '2021-05-12', '09:14:53am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(902, '2021-05-29', '10:21:12am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(903, '2021-05-01', '10:48:38am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(904, '2021-05-12', '10:49:16am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(905, '2021-05-12', '11:31:58am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(906, '2021-05-12', '12:11:24pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(907, '2021-05-12', '12:14:40pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(908, '2021-05-12', '12:19:36pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(909, '2021-05-12', '12:20:07pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(910, '2021-05-12', '12:20:51pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(911, '2021-05-12', '12:23:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(912, '2021-05-12', '12:23:23pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(913, '2021-05-12', '12:25:36pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(914, '2021-05-12', '12:27:19pm', 33, 'Ing. Luis Tamay', 'ltamay@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(915, '2021-05-12', '02:55:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(916, '2021-05-12', '02:55:49pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(917, '2021-05-12', '02:56:12pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(918, '2021-05-12', '03:43:31pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(919, '2021-05-12', '03:44:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(920, '2021-05-13', '05:32:15pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(921, '2021-05-13', '05:45:24pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(922, '2021-05-13', '05:45:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(923, '2021-05-13', '05:45:43pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(924, '2021-05-13', '09:58:00am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(925, '2021-05-13', '09:58:18am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(926, '2021-05-13', '09:58:27am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(927, '2021-05-13', '09:58:57am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(928, '2021-05-14', '05:53:02pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(929, '2021-05-14', '06:17:05pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(930, '2021-05-14', '06:17:53pm', 52, 'Carolina Lino', 'clino@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(931, '2021-05-14', '06:23:50pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(932, '2021-05-14', '11:47:50am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(933, '2021-05-14', '11:48:05am', 52, 'Carolina Lino', 'clino@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(934, '2021-05-14', '11:52:59am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(935, '2021-05-14', '12:17:55pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(936, '2021-05-14', '12:25:52pm', 55, 'Adrian Morales', 'admin@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(937, '2021-05-14', '12:36:49pm', 55, 'Asesor Nacional', 'admin@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(938, '2021-05-14', '12:37:45pm', 55, 'Asesor Nacional', 'admin@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(939, '2021-05-15', '10:39:16am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(940, '2021-05-15', '10:39:24am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(941, '2021-05-15', '10:40:36am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(942, '2021-05-15', '03:41:30pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(943, '2021-05-15', '03:42:19pm', 32, 'Juan Perez', 'jperez@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(944, '2021-05-15', '03:58:48pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(945, '2021-05-16', '05:15:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(946, '2021-05-16', '07:18:18pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(947, '2021-05-16', '07:19:24pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(948, '2021-05-16', '07:20:16pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(949, '2021-05-16', '07:20:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(950, '2021-05-16', '07:24:44pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(951, '2021-05-16', '07:24:57pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(952, '2021-05-16', '07:49:39pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(953, '2021-05-16', '07:49:49pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(954, '2021-05-16', '07:50:29pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(955, '2021-05-16', '07:52:43pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(956, '2021-05-16', '07:53:05pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(957, '2021-05-16', '08:41:16pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(958, '2021-05-16', '08:57:14pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(959, '2021-05-16', '10:52:07pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(960, '2021-05-16', '03:44:40pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(961, '2021-05-16', '03:50:30pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(962, '2021-05-16', '03:53:23pm', 32, 'Juan Perez', 'jperez@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(963, '2021-05-16', '03:53:47pm', 36, 'Arianna Quimi', 'aquimi@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(964, '2021-05-16', '03:55:18pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(965, '2021-05-17', '10:53:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(966, '2021-05-17', '08:37:42am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(967, '2021-05-17', '08:51:58am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(968, '2021-05-17', '10:20:35am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(969, '2021-05-17', '10:26:32am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(970, '2021-05-17', '10:29:55am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(971, '2021-05-17', '10:38:20am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(972, '2021-05-17', '10:38:38am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(973, '2021-05-17', '10:58:33am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(974, '2021-05-17', '11:22:06am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(975, '2021-05-17', '11:22:52am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(976, '2021-05-17', '11:23:14am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(977, '2021-05-17', '11:23:36am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(978, '2021-05-17', '11:25:09am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(979, '2021-05-17', '12:15:23pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(980, '2021-05-17', '12:23:17pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(981, '2021-05-17', '12:58:56pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(982, '2021-05-17', '01:47:44pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(983, '2021-05-17', '02:26:11pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(984, '2021-05-17', '02:53:54pm', 29, 'Ing Carlos Vaca', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(985, '2021-05-17', '02:56:46pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(986, '2021-05-17', '03:07:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(987, '2021-05-17', '03:49:10pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(988, '2021-05-17', '03:50:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(989, '2021-05-17', '03:51:20pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(990, '2021-05-17', '03:57:27pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(991, '2021-05-17', '03:58:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(992, '2021-05-17', '04:03:12pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(993, '2021-05-17', '04:09:05pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(994, '2021-05-17', '04:29:42pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(995, '2021-05-17', '04:33:56pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(996, '2021-05-17', '04:35:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(997, '2021-05-17', '04:45:46pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(998, '2021-05-17', '04:48:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(999, '2021-05-18', '05:04:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1000, '2021-05-18', '05:06:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1001, '2021-05-18', '05:06:51pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1002, '2021-05-18', '05:07:33pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1003, '2021-05-18', '06:05:22pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1004, '2021-05-18', '08:50:15am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1005, '2021-05-18', '10:14:39am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1006, '2021-05-18', '10:56:49am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1007, '2021-05-18', '12:00:18pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1008, '2021-05-18', '12:10:03pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1009, '2021-05-18', '12:11:34pm', 29, 'Ing Carlos Vaca', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1010, '2021-05-18', '12:13:13pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1011, '2021-05-18', '12:47:42pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1012, '2021-05-18', '01:38:43pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1013, '2021-05-18', '02:30:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1014, '2021-05-18', '04:35:40pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1015, '2021-05-18', '04:46:52pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1016, '2021-05-18', '04:53:22pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1017, '2021-05-19', '06:06:46pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1018, '2021-05-19', '06:11:47pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1019, '2021-05-19', '08:51:06am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1020, '2021-05-19', '09:29:42am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1021, '2021-05-19', '09:34:11am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1022, '2021-05-19', '10:33:16am', 29, 'Ing Carlos Vaca', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1023, '2021-05-19', '10:35:56am', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1024, '2021-05-19', '10:56:29am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1025, '2021-05-19', '12:54:04pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1026, '2021-05-19', '02:58:07pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1027, '2021-05-19', '03:01:11pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1028, '2021-05-19', '03:16:56pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1029, '2021-05-19', '03:29:15pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1030, '2021-05-19', '03:37:04pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1031, '2021-05-19', '03:47:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1032, '2021-05-19', '03:54:04pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1033, '2021-05-20', '05:07:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1034, '2021-05-20', '05:36:34pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1035, '2021-05-20', '09:00:59am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1036, '2021-05-20', '10:01:12am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1037, '2021-05-20', '10:07:30am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1038, '2021-05-20', '10:08:10am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1039, '2021-05-20', '02:02:45pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1040, '2021-05-20', '02:08:04pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1041, '2021-05-20', '02:08:30pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1042, '2021-05-20', '03:34:46pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1043, '2021-05-21', '05:16:36pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1044, '2021-05-21', '05:20:51pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1045, '2021-05-21', '05:25:58pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1046, '2021-05-21', '05:49:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1047, '2021-05-21', '05:54:32pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1048, '2021-05-21', '10:13:07am', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1049, '2021-05-21', '10:14:37am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1050, '2021-05-21', '10:35:17am', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1051, '2021-05-21', '10:53:29am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1052, '2021-05-21', '11:05:26am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1053, '2021-05-21', '01:15:33pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1054, '2021-05-21', '02:41:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1055, '2021-05-21', '04:47:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1056, '2021-05-21', '04:48:01pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1057, '2021-05-21', '04:53:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1058, '2021-05-21', '04:54:57pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1059, '2021-05-21', '04:57:42pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1060, '2021-05-22', '05:00:11pm', 68, 'desarrollo Adrian', 'desarrollador@duramas.com.ec', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1061, '2021-05-22', '05:03:01pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1062, '2021-05-22', '05:03:19pm', 68, 'desarrollo Adrian', 'desarrollador@duramas.com.ec', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1063, '2021-05-22', '05:17:08pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1064, '2021-05-22', '05:43:46pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1065, '2021-05-22', '05:44:32pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1066, '2021-05-22', '05:56:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1067, '2021-05-22', '06:17:55pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1068, '2021-05-22', '06:18:37pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1069, '2021-05-22', '06:20:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1070, '2021-05-22', '06:26:29pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1071, '2021-05-22', '06:27:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1072, '2021-05-22', '10:42:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1073, '2021-05-22', '10:46:05pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1074, '2021-05-22', '10:54:10pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1075, '2021-05-22', '10:55:27pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1076, '2021-05-22', '10:59:26pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1077, '2021-05-22', '11:02:22pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1078, '2021-05-22', '11:05:43pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1079, '2021-05-22', '11:07:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1080, '2021-05-22', '11:08:08pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1081, '2021-05-22', '11:10:57pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1082, '2021-05-22', '11:11:49pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1083, '2021-05-22', '11:13:04pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1084, '2021-05-22', '11:14:41pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1085, '2021-05-22', '11:16:44pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1086, '2021-05-22', '11:20:40pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1087, '2021-05-22', '11:26:20pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1088, '2021-05-22', '11:29:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1089, '2021-05-22', '11:29:38pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1090, '2021-05-22', '11:33:15pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1091, '2021-05-22', '11:34:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1092, '2021-05-22', '11:35:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1093, '2021-05-22', '11:40:24pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1094, '2021-05-22', '11:41:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1095, '2021-05-22', '11:45:15pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1096, '2021-05-22', '11:47:28pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1097, '2021-05-22', '11:48:15pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1098, '2021-05-25', '09:05:25am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1099, '2021-05-25', '09:37:43am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1100, '2021-05-25', '09:59:37am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1101, '2021-05-25', '10:03:39am', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1102, '2021-05-25', '10:27:29am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1103, '2021-05-25', '10:31:21am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1104, '2021-05-25', '11:13:22am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1105, '2021-05-25', '02:15:59pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1106, '2021-05-25', '02:39:54pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1107, '2021-05-25', '02:44:00pm', 68, 'desarrollo Adrian', 'desarrollador@duramas.com.ec', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1108, '2021-05-25', '03:08:08pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1109, '2021-05-26', '09:27:11am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1110, '2021-05-26', '09:27:22am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1111, '2021-05-26', '11:04:35am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1112, '2021-05-26', '11:33:47am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1113, '2021-05-26', '01:04:19pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1114, '2021-05-26', '04:57:59pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1115, '2021-05-26', '04:59:42pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1116, '2021-05-27', '05:01:57pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1117, '2021-05-27', '05:11:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1118, '2021-05-27', '05:16:38pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1119, '2021-05-27', '05:25:47pm', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1120, '2021-05-27', '05:27:34pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1121, '2021-05-27', '05:50:36pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1122, '2021-05-27', '06:06:21pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1123, '2021-05-27', '09:13:19am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1124, '2021-05-27', '09:17:19am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1125, '2021-05-27', '10:29:36am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1126, '2021-05-27', '10:36:59am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1127, '2021-05-27', '10:46:47am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1128, '2021-05-27', '10:51:44am', 29, 'Ing Carlos Vacanngj', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1129, '2021-05-27', '10:55:25am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1130, '2021-05-27', '11:13:03am', 32, 'Juan Perez', 'jperez@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1131, '2021-05-27', '11:24:47am', 32, 'Juan Perez', 'jperez@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1132, '2021-05-27', '11:26:09am', 32, 'Juan Perez', 'jperez@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1133, '2021-05-27', '11:47:24am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1134, '2021-05-27', '11:58:57am', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1135, '2021-05-27', '01:45:27pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1136, '2021-05-27', '03:11:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1137, '2021-05-27', '03:18:59pm', 29, 'Ing Carlos Vaca', 'cvaca@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1138, '2021-05-28', '06:22:57pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1139, '2021-05-28', '10:06:56am', 72, 'Adrian Morales', 'armj19fghfgh23@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1140, '2021-05-28', '01:40:25pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1141, '2021-05-28', '01:42:36pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1142, '2021-05-28', '03:52:14pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1143, '2021-05-28', '03:53:53pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1144, '2021-05-28', '04:14:48pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1145, '2021-05-28', '04:33:06pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1146, '2021-05-28', '04:35:09pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1147, '2021-05-29', '05:06:20pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1148, '2021-05-29', '05:20:29pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1149, '2021-05-29', '05:48:29pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1150, '2021-05-29', '05:49:21pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1151, '2021-05-29', '11:25:35pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1152, '2021-05-29', '11:35:03pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1153, '2021-05-29', '11:44:42pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', ''),
(1154, '2021-05-29', '11:45:13pm', 28, 'Adrian Morales', 'armj1923@gmail.com', 0x3a3a31, 0x4e6f6d62726520646520686f73742e20, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_supervisor_warehouse`
--

CREATE TABLE `user_supervisor_warehouse` (
  `user_supervisor_warehouse_id` int(11) NOT NULL,
  `id_user_supervisor` int(10) NOT NULL,
  `name_warehouse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_supervisor_warehouse`
--

INSERT INTO `user_supervisor_warehouse` (`user_supervisor_warehouse_id`, `id_user_supervisor`, `name_warehouse`) VALUES
(18, 6, 'Ambato'),
(19, 6, 'Guayaquil - Juan Tanca Marengo'),
(20, 6, 'Quito - Sangolquí'),
(37, 5, 'Quito - 6 de diciembre'),
(38, 5, 'Quito - Cumbayá'),
(39, 5, 'Quito - Sangolquí');

-- --------------------------------------------------------

--
-- Table structure for table `user_warehouse`
--

CREATE TABLE `user_warehouse` (
  `id_user_warehouse_gen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `last_assignment` int(2) NOT NULL,
  `name_warehouse` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_warehouse`
--

INSERT INTO `user_warehouse` (`id_user_warehouse_gen`, `id_user`, `last_assignment`, `name_warehouse`) VALUES
(90, 31, 0, 'Cuenca - Parque Industrial'),
(91, 31, 1, 'Cuenca - Remigio Crespo'),
(124, 30, 1, 'Cuenca - Ordoñez Lasso'),
(125, 30, 0, 'Guayaquil - Juan Tanca Marengo'),
(145, 36, 0, 'Guayaquil - Juan Tanca Marengo'),
(146, 36, 0, 'Guayaquil - Dicentro'),
(159, 32, 0, 'Quito - 6 de diciembre'),
(160, 32, 0, 'Ambato'),
(161, 32, 0, 'Guayaquil - Juan Tanca Marengo'),
(374, 34, 1, 'Quito - Sangolquí'),
(375, 34, 0, 'Cuenca - Parque Industrial'),
(400, 29, 1, 'Quito - 6 de diciembre'),
(401, 29, 1, 'Ambato'),
(402, 29, 0, 'Cuenca - Ordoñez Lasso'),
(412, 69, 0, 'Cuenca - Ordoñez Lasso'),
(419, 33, 0, 'Guayaquil - Juan Tanca Marengo'),
(420, 33, 1, 'Quito - Sangolquí'),
(464, 68, 1, 'Cuenca - Parque Industrial'),
(467, 28, 0, 'Ambato'),
(468, 28, 0, 'Guayaquil - Juan Tanca Marengo');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `id_warehouse_gen` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `distribution` varchar(50) NOT NULL,
  `active` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`id_warehouse_gen`, `name`, `distribution`, `active`) VALUES
(44, 'Quito - 6 de diciembre', 'Naipe', 1),
(45, 'Ambato', 'Naipe', 1),
(46, 'Cuenca - Ordoñez Lasso', 'Naipe', 1),
(50, 'Guayaquil - Juan Tanca Marengo', 'Naipe', 1),
(55, 'Quito - Cumbayá', 'Naipe', 1),
(58, 'Quito - Sangolquí', 'Naipe', 1),
(71, 'Cuenca - Parque Industrial', 'Naipe', 1),
(76, 'Guayaquil - Dicentro', 'Naipe', 1),
(77, 'Cuenca - Remigio Crespo', 'Naipe', 1),
(139, 'Nacional', 'Shark Tank', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaing`
--
ALTER TABLE `campaing`
  ADD PRIMARY KEY (`campaing_id_gen`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id_gen`);

--
-- Indexes for table `history_lead_factura`
--
ALTER TABLE `history_lead_factura`
  ADD PRIMARY KEY (`history_lead_factura_id`);

--
-- Indexes for table `history_lead_notes`
--
ALTER TABLE `history_lead_notes`
  ADD PRIMARY KEY (`history_lead_notes_id`);

--
-- Indexes for table `history_lead_proforma`
--
ALTER TABLE `history_lead_proforma`
  ADD PRIMARY KEY (`history_lead_proforma_id`);

--
-- Indexes for table `history_lead_status`
--
ALTER TABLE `history_lead_status`
  ADD PRIMARY KEY (`history_lead_status_id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id_lead_gen`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id_gen`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id_gen`);

--
-- Indexes for table `tracking_lead`
--
ALTER TABLE `tracking_lead`
  ADD PRIMARY KEY (`tracking_lead_id_gen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercheck`
--
ALTER TABLE `usercheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_supervisor_warehouse`
--
ALTER TABLE `user_supervisor_warehouse`
  ADD PRIMARY KEY (`user_supervisor_warehouse_id`);

--
-- Indexes for table `user_warehouse`
--
ALTER TABLE `user_warehouse`
  ADD PRIMARY KEY (`id_user_warehouse_gen`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id_warehouse_gen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `campaing`
--
ALTER TABLE `campaing`
  MODIFY `campaing_id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `history_lead_factura`
--
ALTER TABLE `history_lead_factura`
  MODIFY `history_lead_factura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `history_lead_notes`
--
ALTER TABLE `history_lead_notes`
  MODIFY `history_lead_notes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=734;

--
-- AUTO_INCREMENT for table `history_lead_proforma`
--
ALTER TABLE `history_lead_proforma`
  MODIFY `history_lead_proforma_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `history_lead_status`
--
ALTER TABLE `history_lead_status`
  MODIFY `history_lead_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id_lead_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tracking_lead`
--
ALTER TABLE `tracking_lead`
  MODIFY `tracking_lead_id_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `usercheck`
--
ALTER TABLE `usercheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1155;

--
-- AUTO_INCREMENT for table `user_supervisor_warehouse`
--
ALTER TABLE `user_supervisor_warehouse`
  MODIFY `user_supervisor_warehouse_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_warehouse`
--
ALTER TABLE `user_warehouse`
  MODIFY `id_user_warehouse_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=486;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id_warehouse_gen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
