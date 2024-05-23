
CREATE TABLE `results` (
  `id`  int(11) PRIMARY KEY NOT NULL,
  `prn_no` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `mse_marks` decimal(5,2) DEFAULT NULL,
  `ese_marks` decimal(5,2) DEFAULT NULL,
  `max_marks_mse` decimal(5,2) DEFAULT NULL,
  `max_marks_ese` decimal(5,2) DEFAULT NULL
);

INSERT INTO `results` (`id`, `prn_no`, `subject`, `mse_marks`, `ese_marks`, `max_marks_mse`, `max_marks_ese`) VALUES
(9, '12220122', 'SDM', '28.00', '69.00', '30.00', '70.00'),
(10, '12220122', 'DAA', '25.00', '65.00', '30.00', '70.00'),
(11, '12220122', 'CN', '22.00', '68.00', '30.00', '70.00'),
(12, '12220122', 'WT', '27.00', '61.00', '30.00', '70.00');

ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;