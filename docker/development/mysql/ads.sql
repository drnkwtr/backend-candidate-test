CREATE TABLE IF NOT EXISTS `campaigns`
(
    `id`   BIGINT(20)   NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `sets`
(
    `id`   BIGINT(20) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` INT(11)    NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE IF NOT EXISTS `ads`
(
    `id`          BIGINT(20)   NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name`        VARCHAR(255) NOT NULL,
    `campaign_id` BIGINT(20)   NOT NULL,
    `set_id`      BIGINT(20)   NOT NULL,
    `cost`        DOUBLE       NOT NULL,
    `impressions` INT          NOT NULL,
    `clicks`      INT          NOT NULL,
    `date`        DATE         NOT NULL,
    FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`set_id`) REFERENCES `sets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;
