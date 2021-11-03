-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2021 às 02:09
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecommerce_tenis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `user_id`, `price`, `color`, `size`, `created`) VALUES
(50, 43, 4, '99.00', 'red', '38', '2021-11-02'),
(51, 50, 3, '119.99', '#c2e59c', '49', '2021-11-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `date_valid` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `payments`
--

INSERT INTO `payments` (`id`, `product_id`, `user_id`, `payment_id`, `card_number`, `date_valid`, `cvv`, `amount`, `created`) VALUES
(31, '42', '1', '618131c2e8ff2', '4631 1379 0553 1819', '02/09/2023', '681', '99.99', '2021-11-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_transparent` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`, `image_transparent`, `color`, `size`, `quantity`) VALUES
(42, 'Nike Air Vapor Max 2020 FK', 'Men\'s Shoe | 7 Colors | Design Advanced', '99.99', 'itemTwo.jpg', 'itemTwoBg.png', '#333,#eee,#73b8f2,#c2e59c,#feca20', '34,35,37,38,39,41,43,47,50', 1),
(43, 'Nike Free Metcon 3', 'Men\'s Shoe | 2 Colors | Design Advanced', '99.00', 'itemOne.jpg', 'itemOneBg.png', '#999,#333,#eee,#fff,red,#666,#ddd,yellow', '29,32,35,37,38,39,40,42,47,49,50', 1),
(50, 'Skechers Virtual Sample Concept', 'Proin dolor sem, ultricies vel aliquam vel, volutpat nec nunc. Nunc eu feugiat enim, nec fermentum lacus. Vestibulum dolor ipsum, sodales a tristique in, tempor eu arcu. Nam et leo viverra, egestas urna non, placerat metus.', '119.99', 'itemFour.jpg', 'itemFourBg.png', '#fff,#ddd,#ccc,#333,#111,#c2e59c,#f1f904,#73b8f2', '29,31,32,35,39,41,42,46,49', 1),
(51, 'Shoe Advanced Design', 'Nam et leo viverra, egestas urna non, placerat metus. Praesent in sapien sit amet urna congue tempor et a eros. Maecenas facilisis metus sapien, ac aliquam mauris commodo blandit.', '99.99', 'itemFive.jpg', 'itemFiveBg.png', '#fff,#ddd,#ccc,#333,#73b8f2,#111,#000,#f1f904,#c2e59c,#feca20', '23,27,29,31,33,35,37,39,40,41', 1),
(52, 'Ninja Turtle Shoes', 'Nam gravida nisl lacinia tempus malesuada. Nulla non nisl facilisis eros laoreet scelerisque in vitae est. Ut consectetur sem sit amet odio iaculis euismod. Donec vulputate molestie tristique. Vivamus in pharetra nisi, sit amet tincidunt enim. Duis sit am', '99.99', 'itemSix.jpg', 'itemSixBg.png', '#fff,#f9f9f9,#eee,#ddd,#333,#111,pink,yellow', '21,23,28,31,33,36,39,41,43,47', 1),
(53, 'Adidas Air Max', 'Aliquam in volutpat neque. Aliquam non fringilla orci. Vivamus aliquet lorem ultricies dapibus condimentum. Nullam posuere ultricies gravida. Phasellus eu dui non augue placerat blandit. Cras dui lectus, semper et varius id, dapibus ac mi. Donec imperdiet', '99.99', 'itemSeven.jpg', 'itemSevenBg.png', '#333,#111,#fff,#ddd,#f1f904,#999,#666', '27,29,31,34,37,39,40,41', 1),
(54, 'Shoes For Astronaut', 'Fusce quis enim et odio venenatis imperdiet. Etiam vitae tincidunt lacus. Pellentesque bibendum magna quam, in euismod dui vulputate eu. Quisque lacinia ornare ante, non aliquet purus congue sit amet. Maecenas fermentum augue ut nisl convallis, ac condime', '99.99', 'itemEight.jpg', 'itemEightBg.png', '#fff,#ccc,#ddd,#333,#111,#f9f804,yellow', '29,32,33,34,37,38,41,42,45,48', 1),
(55, 'Nike Concept Shoe', 'Curabitur efficitur purus eget odio dignissim, vel fringilla mi pretium. Integer pellentesque eleifend diam sit amet tristique. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nullam et turpis purus. Fusce mag', '119.99', 'itemNine.jpg', 'itemNineBg.png', '#fff,#f9f9f9,#ddd,#ccc,#999,#333,#73b8f2,#feca20,#c2e59c,', '29,32,35,37,38,40,41,43,45,48', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `feedback` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ratings`
--

INSERT INTO `ratings` (`id`, `product_id`, `user_id`, `stars`, `feedback`) VALUES
(1, 42, 1, 5, 'Muito bom!'),
(2, 43, 1, 4, 'Produto Excelente!');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `cep` varchar(255) NOT NULL,
  `road` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `latitude`, `longitude`, `cep`, `road`, `type`) VALUES
(1, 'RaissaDev', 'raissa.fullstack@gmail.com', '123456', 'myImg.gif', '-31.0998787', '-50.9134895', '96270000', 'Vila norte, 506', 'admin'),
(3, 'Amanda Doe', 'amanda@doe.com', '123456', 'profile.png', '', '', '01153000', '', 'user'),
(4, 'Jhon Doe', 'jhon@doe.com', '123456', 'user.png', '-31.0998837', '-50.9134793', '96270000', '', 'user');

-- --------------------------------------------------------

--
-- Estrutura da tabela `visits`
--

CREATE TABLE `visits` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `visits`
--

INSERT INTO `visits` (`id`, `ip`, `date`) VALUES
(30, '192.168.0.107', '2021-11-02'),
(41, '192.168.0.100', '2021-11-02');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
