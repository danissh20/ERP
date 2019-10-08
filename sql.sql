CREATE TABLE `admin` (
 `admin_username` varchar(10) NOT NULL,
 `admin_password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `employee` (
 `id` int(10) NOT NULL AUTO_INCREMENT,
 `e_name` varchar(20) NOT NULL,
 `e_password` varchar(20) NOT NULL DEFAULT 'password',
 `e_department` varchar(30) NOT NULL,
 `e_feedback` int(1) NOT NULL DEFAULT '1',
 `feedback` varchar(50) NOT NULL,
 `warn` tinyint(1) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `manager` (
 `m_username` varchar(20) NOT NULL,
 `m_password` varchar(20) NOT NULL,
 `Department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1