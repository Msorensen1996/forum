DROP DATABASE  IF exists `forum`;

CREATE DATABASE  `forum`;

USE `forum`;

CREATE TABLE `forum` (
                         `forum_id` int(11) UNSIGNED NOT NULL,
                         `forum_name` varchar(60) NOT NULL,
                         `body` longtext NOT NULL,
                         `time` datetime NOT NULL,
                         `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `replies` (
                           `post_id` int(11) UNSIGNED NOT NULL,
                           `forum_id` int(11) UNSIGNED NOT NULL,
                           `user_id` int(11) UNSIGNED NOT NULL,
                           `subject` varchar(60) NOT NULL,
                           `body` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
                         `id` int(11) UNSIGNED NOT NULL,
                         `username` varchar(30) NOT NULL,
                         `email` varchar(512) NOT NULL,
                         `password` char(60) NOT NULL,
                         `first_name` varchar(30) NOT NULL,
                         `last_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `forum`
    ADD PRIMARY KEY (`forum_id`);

ALTER TABLE `replies`
    ADD PRIMARY KEY (`post_id`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `forum_id` (`forum_id`);

ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `password` (`password`),
    ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `forum`
    MODIFY `forum_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `replies`
    MODIFY `post_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
    MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `replies`
    ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
    ADD CONSTRAINT `replies_ibfk_3` FOREIGN KEY (`forum_id`) REFERENCES `forum` (`forum_id`);
COMMIT;
