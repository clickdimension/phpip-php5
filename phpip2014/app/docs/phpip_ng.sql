-- Adminer 4.6.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DELIMITER ;;

DROP PROCEDURE IF EXISTS `sp_crear_rango_ip`;;
CREATE PROCEDURE `sp_crear_rango_ip`(IN `net_ip_rango` varchar(20))
begin

DECLARE ipdigit INT default 0;
DECLARE new_ipstring VARCHAR(255) default '';

/*
formato new_ipstring: 10.5.10
sin punto final !

// check si rango ya existe ?? ...
*/

INSERT INTO net_ips (netaddress) values (net_ip_rango );

   label1: WHILE ipdigit < 256 DO
     SET new_ipstring = CONCAT(net_ip_rango, '.', ipdigit)  ;
     INSERT INTO addresses (ip) values (new_ipstring );

     SET ipdigit = ipdigit + 1;
   END WHILE label1;

end;;

DROP PROCEDURE IF EXISTS `sp_limpiar_addresses_null`;;
CREATE PROCEDURE `sp_limpiar_addresses_null`()
BEGIN

update addresses
set celda = NULL
where celda = ''
;

update addresses
set client = NULL
where client = ''
;


END;;

DROP PROCEDURE IF EXISTS `sp_oldpasswd`;;
CREATE PROCEDURE `sp_oldpasswd`(IN `old_passwd` varchar(40))
BEGIN

/*
SET SESSION old_passwords=1;
SELECT PASSWORD(old_passwd);
*/

select old_password(old_passwd) as oldpass;

END;;

DELIMITER ;

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE `addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` varchar(36) DEFAULT NULL,
  `mask` varchar(16) DEFAULT NULL,
  `gateway` varchar(16) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL COMMENT '--obsolete',
  `client` varchar(250) DEFAULT NULL,
  `clientcontact` varchar(250) DEFAULT NULL,
  `phone` varchar(180) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `notes` mediumtext,
  `id_cliente` varchar(30) DEFAULT NULL COMMENT 'id conexion',
  `id_contabilidad` int(11) DEFAULT NULL COMMENT '+',
  `direccion` varchar(300) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `downlink` varchar(10) DEFAULT NULL COMMENT 'downlink/sector/PON',
  `uplink` varchar(10) DEFAULT NULL COMMENT '--obsolete',
  `celda` varchar(20) DEFAULT NULL COMMENT '+nombre de celda/OLT',
  `equipo` varchar(30) DEFAULT NULL,
  `marca` varchar(30) DEFAULT NULL COMMENT 'marca/plan',
  `modelo` varchar(30) DEFAULT NULL,
  `s_n` varchar(50) DEFAULT NULL,
  `ip_gw_lan` varchar(15) DEFAULT NULL,
  `downlink_nac` varchar(10) DEFAULT NULL COMMENT '--obsolete',
  `uplink_nac` varchar(10) DEFAULT NULL COMMENT '--obsolete',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `id_cliente` (`id_cliente`),
  KEY `celda` (`celda`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `date` datetime DEFAULT NULL,
  `id` int(10) DEFAULT '0',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `username` varchar(16) NOT NULL DEFAULT '',
  `hostaddress` varchar(16) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `net_ips`;
CREATE TABLE `net_ips` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `netaddress` varchar(36) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `netaddress` (`netaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `passwd` varchar(16) NOT NULL DEFAULT '0',
  `email` varchar(100) DEFAULT NULL,
  `access_level` varchar(10) DEFAULT 'read',
  `password` varchar(64) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `is_inactive` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP VIEW IF EXISTS `v_completar_celda`;
CREATE TABLE `v_completar_celda` (`id` int(10), `ip` varchar(36), `mask` varchar(16), `gateway` varchar(16), `description` varchar(300), `client` varchar(250), `clientcontact` varchar(250), `phone` varchar(180), `email` varchar(80), `notes` mediumtext, `id_cliente` varchar(30), `id_contabilidad` int(11), `direccion` varchar(300), `fecha_inicio` date, `downlink` varchar(10), `uplink` varchar(10), `celda` varchar(20), `equipo` varchar(30), `marca` varchar(30), `modelo` varchar(30), `s_n` varchar(50), `ip_gw_lan` varchar(15), `downlink_nac` varchar(10), `uplink_nac` varchar(10), `updated_at` datetime);


DROP VIEW IF EXISTS `v_nateados_no_olt_sin_bw`;
CREATE TABLE `v_nateados_no_olt_sin_bw` (`ip` varchar(36), `client` varchar(250), `id_cliente` varchar(30), `celda` varchar(20), `downlink` varchar(10));


DROP VIEW IF EXISTS `v_nateados_olt_verificar_bw`;
CREATE TABLE `v_nateados_olt_verificar_bw` (`Ip_Nateado` varchar(12), `Nombre` varchar(80), `phpip_celda` varchar(20));


DROP VIEW IF EXISTS `v_publicos_no_olt___completar_celda__sin_bw`;
CREATE TABLE `v_publicos_no_olt___completar_celda__sin_bw` (`id` int(10), `ip` varchar(36), `mask` varchar(16), `gateway` varchar(16), `description` varchar(300), `client` varchar(250), `clientcontact` varchar(250), `phone` varchar(180), `email` varchar(80), `notes` mediumtext, `id_cliente` varchar(30), `id_contabilidad` int(11), `direccion` varchar(300), `fecha_inicio` date, `downlink` varchar(10), `uplink` varchar(10), `celda` varchar(20), `equipo` varchar(30), `marca` varchar(30), `modelo` varchar(30), `s_n` varchar(50), `ip_gw_lan` varchar(15), `downlink_nac` varchar(10), `uplink_nac` varchar(10), `updated_at` datetime);


DROP VIEW IF EXISTS `v_resumen_ip_bw`;
CREATE TABLE `v_resumen_ip_bw` (`celda` varchar(20), `acceso` varchar(11), `total_ip` bigint(21), `total_nateado` decimal(23,0), `total_publico` decimal(23,0), `bw` decimal(32,0), `bw_public` decimal(32,0), `masknot252` decimal(23,0));

DROP TABLE IF EXISTS `v_publicos_no_olt___completar_celda__sin_bw`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_publicos_no_olt___completar_celda__sin_bw` AS select `addresses`.`id` AS `id`,`addresses`.`ip` AS `ip`,`addresses`.`mask` AS `mask`,`addresses`.`gateway` AS `gateway`,`addresses`.`description` AS `description`,`addresses`.`client` AS `client`,`addresses`.`clientcontact` AS `clientcontact`,`addresses`.`phone` AS `phone`,`addresses`.`email` AS `email`,`addresses`.`notes` AS `notes`,`addresses`.`id_cliente` AS `id_cliente`,`addresses`.`id_contabilidad` AS `id_contabilidad`,`addresses`.`direccion` AS `direccion`,`addresses`.`fecha_inicio` AS `fecha_inicio`,`addresses`.`downlink` AS `downlink`,`addresses`.`uplink` AS `uplink`,`addresses`.`celda` AS `celda`,`addresses`.`equipo` AS `equipo`,`addresses`.`marca` AS `marca`,`addresses`.`modelo` AS `modelo`,`addresses`.`s_n` AS `s_n`,`addresses`.`ip_gw_lan` AS `ip_gw_lan`,`addresses`.`downlink_nac` AS `downlink_nac`,`addresses`.`uplink_nac` AS `uplink_nac`,`addresses`.`updated_at` AS `updated_at` from `addresses` where ((`addresses`.`ip` like '%200.108.%') and (`addresses`.`client` not in ('BROADCAST','NETWORK','LIBRE','')) and (not((`addresses`.`client` like '%GATEWAY%'))) and ((`addresses`.`celda` = '') or isnull(`addresses`.`celda`))) order by `addresses`.`celda` desc,`addresses`.`client`;

DROP TABLE IF EXISTS `v_resumen_ip_bw`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_resumen_ip_bw` AS select `addresses`.`celda` AS `celda`,if((`addresses`.`celda` like '%OLT%'),'GPON',if((`addresses`.`celda` like 'C0%'),'WLL',if((`addresses`.`celda` like 'C1%'),'WLL',if(isnull(`addresses`.`celda`),'Desconocido',if((`addresses`.`celda` = ''),'Desconocido','DIRECTO'))))) AS `acceso`,count(0) AS `total_ip`,sum(if((`addresses`.`ip` like '10.%'),1,0)) AS `total_nateado`,sum(if((`addresses`.`ip` like '%200.108%'),1,0)) AS `total_publico`,sum(cast(trim(replace(lower(`addresses`.`downlink`),'kbps','')) as unsigned)) AS `bw`,sum(if((`addresses`.`ip` like '%200.108%'),cast(trim(replace(lower(`addresses`.`downlink`),'kbps','')) as unsigned),0)) AS `bw_public`,sum(if((`addresses`.`mask` like '%255.252%'),0,1)) AS `masknot252` from `addresses` where ((not((`addresses`.`ip` like '%192.168%'))) and (`addresses`.`client` is not null) and (`addresses`.`client` not in ('BROADCAST','NETWORK','LIBRE','')) and (not((`addresses`.`client` like '%GATEWAY%')))) group by `addresses`.`celda` order by `addresses`.`celda`;

-- 2018-03-06 18:19:14
