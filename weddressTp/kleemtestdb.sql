-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 01:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kleemtestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` varchar(255) NOT NULL,
  `customerID` varchar(255) NOT NULL,
  `dressid` varchar(255) NOT NULL,
  `unitPrice` int(10) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `TotalPrice` int(10) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Bridal'),
(2, 'Groom'),
(3, 'Party'),
(4, 'Man'),
(5, 'Woman'),
(6, 'Boys'),
(7, 'Girls'),
(8, 'kids'),
(9, 'kids');

-- --------------------------------------------------------

--
-- Table structure for table `dress`
--

CREATE TABLE `dress` (
  `dressid` int(11) NOT NULL,
  `image` longblob NOT NULL,
  `uploaded` datetime NOT NULL,
  `dresstype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dress`
--

INSERT INTO `dress` (`dressid`, `image`, `uploaded`, `dresstype`, `category`, `price`) VALUES
(1, 0x89504e470d0a1a0a0000000d494844520000003d0000003508020000007d5374d3000000017352474200aece1ce90000000467414d410000b18f0bfc6105000000097048597300000ec300000ec301c76fa8640000078d494441546843ed99f96f4e5918c7dfbfc236a369d556aa1b2aa58ad1d0a9a4441362ecfa8b35c432a808152496d829332124042111bf35d134fc209356a9b12f33b535a12ab4f66da6f379eff7bec7f5de7ba76f67e63591bc9fc475de739e73cef73ce739cf5d1a78f5ea557373f3dbb76fdfbd7b470128343535bd78f142655562a0c21fad44bd3cf9f0e10357a6d0e06fdebcb1aa232260ff1fc208d528efdfbf77cecd7aecd23fe5cf1094b530d4cb47cca595444250379d3f7efc48c1744334355cebebeb1b1b1b594ce4238621718c261847d0c4f80d0d0d14506cd9b6824ffe662cc54c7575754949c937161d3b764c4848888f8fe79a9898d8ae5d3bd5474e5c088612df5ab469d3263535b5a0a0e0d4a9531280d723dfcfcfe24441525a5a9a9c9cdcb76fdf8c8c0cae3d7bf6ecd6ad5bfffefdb3b3b3bb76ed9ad24ad22dd242a055646666666565b19e9933673e7dfa9479d90d4b45440475b350732628ac58b102adb9b9b949494939393963c68c292c2c1c3972645e5e1e9578a8558c1831223fc4f70e5803bec02318d4d6d612f14c6d4e578bd8fe366b65e973e6ccc1df80e8c3870f9ba6c80775e28c69e2d8805cbcc37e8e1e3dbaaeae4e27357202ea8026c6d2d00b172e647f7bf5ea555c5cfcfcf9735a5fbe7c69197fca86ff9e63c78e112dddbb77671feedebdaba3c509566b8bd8f9c47440fa82050b7af4e88133d6ac59231fabb5b52e11f4f2e4e8d1a39c96debd7b1333f7eedd3302dcc8defe1122a6db07cdea26a6db22a6db46b3ba89e9b6f86a74d3c1d452e6663b7ffe7c6e3aff976ebbd9855a0d31dd3e58937a10d31dd3edc49ad48398eeaf4b37ffe863ba99fb0e83ae5ebd9a1afa50f9faf56b19f8c18275d51cee97456af002f06a42f9e4c9935dba74c141e87ef2e4896d1431bebaf1c4f2e5cb1991971d6632baadc507512f14085522cb0cc54f4653190306a1951a191c397224212101ddbcb0e16fc6c75ec691e0abbb4f9f3e6bd7ae6526d58bbf7f4f439cae663453b016f5992cde5c3b75ea4434f2c6cd7b5a8bfb1986af6e3671d5aa55bcf6311fea352b3e939925c376b9a052ba1941efa3185016740495b530fccdcb25eff3bc17d7d7d7070775acb3457c75032fc8f7efdf573d60a3b7574f245a98d1c2a09ef1f102fbb671e3c6e4e4e4a4a4a4ff5837230e1a3468d3a64de7ce9d631f6fdfbe7dfdfa750abf5bfc16827a81d983070fae5dbb76f1e2452c6fdebc79e7ce9d5bb76ed97696e58d1b37ae5cb982c1850b17c68d1b979292929696565050505b5bab83c11649468bf8ea1e3c78302985f863682d833dcdc8c86073053f0566307bf6ec65cb96a5a7a7b76ddb96cac4c4443aca92be8c038c4353e7ce9d39919c7b8e506666667e7e3eba8922938b22c15737e3424e4e0e577e666767f7ebd78fe32ff46108240870585353d3f4e9d369c512b95ce9880d7ed5273b402b6596c402060c1880eebcbcbc478f1e696a23a34582ba893602579f78e0c48913c3860db33ee2a5ea0390d1870e4bb6077bf7eeddb56bd7e4c993258b1d888f8f67b576b30b16c03e3020a188a77572f441199ca7c5087312500262ada8379f4389bf9f1dfce4a0d4872d5bb660b975eb560e1c853d7bf66cdfbefdc0810376b38b9d3b77723f3e7ffe3c3e4637429d875e6163f2989ba0bf31d20f8c2a2a2a885432e08f168b172f5eb264c9d2a54b8b2d88606a3c99376fdea2458b30c6861b1657ba536337bbd050c4248f15070f1e647616809230a1d266f6c11078fcf8b14a64031cc0c1222e098c5f2c2a2b2b4914d5d5d5ec404d4d0da9e0571fc818972f5f2693005e042ae9ae563718f088422812f48456515111599f6d97d08686069c4dc17c9a0c23e8efc6c6c6b2b2b251a34611709c270eca993367e8cf286c5f84679c6d651c954d172a55f0042fb280810307c6c5c511e870fcf87193cb05ea4d3838093c7cf870e5ca95a42d7c4c86ead0a1c3b469d308538e0b6cdebc99c0e5e7b66ddb8857a0c613ccd6ad5bb763c70e4539f61cd3f5ebd7dbcd2e68dabd7b37113274e8509c45d6e2b6dfbe7d7b62acaaaa0ab9ac19c72151d73002e5e5e5dc7239404cc395c706e6debf7fbf7d0c1d70d400334fc8279c36a460c399e3ca20fbf6edb39b5db03060859a8e2efc3c74e810eb27a12948c8246cb8ca6104b86f1516164e9a3489d4abbf2b4c9d3a75fcf8f164342a61e2c48913264ca0e6070bca9ec852a8c6143c615e269a32650a1ee168625c5252c2951a9e104f9f3e6d0bf421c09d85244d6ed67d812d23f57250ec341b3598342b2b8b9b3c2e277dcd983163c3860d63c78e25d6c90d1c305ba0cf1f1f036ce5dcb973b9d10c19328447f8e1c3877f674121aa301d8f12b9b9b9b366cdc2fdf818e908200b1330baab289978c737ffeaeaea48769c06d21c90ce781e52b68a1e3c81915849944cc7ec67cf9ebd7af52ac9f1d2a54b7afd41ae4982ee9c16d46d6a29b050cfbc130d34afb9a53b1f4e4826e646eebce71b82ba69304987cecad95ca30ab248144cc4d45a8092bd64e0696c283c7bf6ccf3a13fa85bcf55616ed6e8d1c39ec6bab3c8d328d632282346365cbdf3a0532eddf8c932b44751457e55c14877ba16192ad0a4c538b1ff7e095a19bab13395d1837b8ab43a413753ab9eab0e9bb7bfedffbf3662babf2c31dd5f92e6e6bf0082ba6aef5a931a5a0000000049454e44ae426082, '2021-08-01 12:32:13', 'party', 'Man', 4500);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `cusId` text NOT NULL,
  `dressid` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `date` text NOT NULL,
  `status` text NOT NULL,
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `orderid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) NOT NULL,
  `cusID` text NOT NULL,
  `method` text NOT NULL,
  `amount` int(10) NOT NULL,
  `date` text DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `accountNumber` text DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` text NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `usertype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dress`
--
ALTER TABLE `dress`
  ADD PRIMARY KEY (`dressid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`(255));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dress`
--
ALTER TABLE `dress`
  MODIFY `dressid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
