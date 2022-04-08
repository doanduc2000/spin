<?php
require 'bootstrap.php';

$statement = <<<EOS
CREATE TABLE IF NOT EXISTS vongquay (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    count INT NOT NULL,
    total INT NOT NULL,
    url VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
   
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4;

INSERT INTO vongquay 
(id, name, count, total, url) 
VALUES
(1, 'Voucher chăm sóc nha chu', 100, 300, 'media/images/cham-soc-nha-chu.png'),
(2, 'Voucher chăm sóc da', 80, 13, 'media/images/cham-soc-da.png'),
(5, 'Vali du lịch', 50, 14, 'media/images/Vali.png'),
(6, 'Máy lọc không khí', 5, 1, 'media/images/may-loc-khong-khi.png'),
(8, 'Voucher Phun xăm -50%', 30, 6, 'media/images/phun-xam.png'),
(9, 'Vé lột xác -100%', 1, 1, 'media/images/lot-xac.png'),
(10, 'Mất lượt', 3, 1, 'media/images/chia-buon.png'),
(11, 'Giảm 60% gói extra', 100, 21, 'media/images/extra.png'),
(12, 'Voucher 100.000Đ', 100, 90, 'media/images/100k.png');
EOS;
try {
    $createTable = $dbConnection->exec($statement);
} catch (\PDOException $e) {
    exit($e->getMessage());
}
