<?php
    require 'db_connection.php';

    function is_table($conn){
        $sql = 'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
            SET AUTOCOMMIT = 0;
            START TRANSACTION;
            SET time_zone = "+02:00";
    
            CREATE TABLE `users` (
                `id` int(11) UNSIGNED NOT NULL,
                `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
                `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    
            ALTER TABLE `users`
                ADD PRIMARY KEY (`id`),
                ADD UNIQUE KEY `user_email` (`user_email`);
    
            ALTER TABLE `users`
                MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
            COMMIT;';

        $table_exist = $conn->query('SHOW TABLES LIKE "users"');

        if($table_exist->rowCount()){
            
        } else{
            $resault = $conn->exec($sql);
            if($resault){
                echo"Таблиці створені";
            }
        }
    }

?>