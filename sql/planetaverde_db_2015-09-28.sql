/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.26 : Database - planetaverde_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`planetaverde_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `planetaverde_db`;

/*Table structure for table `area` */

DROP TABLE IF EXISTS `area`;

CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0: Draft, 1: Published; 2: Deleted',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '0: Branch, 1: Leaf',
  `coords_in_parent` varchar(2000) DEFAULT NULL,
  `map_image` int(11) DEFAULT NULL,
  `featured` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `area` */

insert  into `area`(`id`,`parent`,`name`,`description`,`state`,`type`,`coords_in_parent`,`map_image`,`featured`) values (1,0,'World Map','This is the map of the world, this will be the parent container of all continents',1,0,'',3,1),(2,1,'South America','South America Area Descripcion',1,0,'111,171,115,191,118,211,119,246,125,234,135,217,144,202,150,188,154,179,142,174,136,164,124,158,112,160',3,0),(3,1,'Africa','African Continent Descripcion',1,0,'184,127,182,132,175,140,175,145,175,151,178,162,180,167,186,165,191,162,196,165,200,166,200,171,203,182,203,187,203,193,208,206,210,214,215,215,218,210,222,206,225,201,227,200,227,193,232,189,231,177,234,170,239,167,243,157,226,138,222,130,213,129,210,130,200,126,201,123,196,123,190,125',5,0),(5,1,'Asia','Asian Continent Descripcion',1,0,'250,114,245,128,254,138,264,141,264,148,268,156,272,152,274,147,281,142,289,149,288,164,298,176,305,179,316,179,317,171,322,159,319,140,319,132,322,128,331,128,334,122,338,116,340,111,337,99,338,90,349,90,353,100,360,91,361,88,369,84,376,79,383,74,379,68,362,63,340,59,335,52,313,51,302,44,288,41,268,53,249,68,242,76,242,93,243,105',NULL,1),(6,1,'Antartica','Antartica continent',1,1,'149,255,178,250,217,258,183,264',NULL,0),(7,1,'Europe','europe',1,0,'111,171, 115,191, 118,211, 119,246, 125,234, 135,217, 144,202, 150,188, 154,179, 142,174, 136,164, 124,158, 112,160 ',NULL,1),(8,3,'Madagascar','An island country in the Indian Ocean, Madagascar is located off the southeastern coast of Africa. The nation comprises the island of Madagascar (the 4th largest island of the world), as well as numerous smaller peripheral islands.',1,0,'249,182,247,190,241,199,247,205,251,209,255,210,258,205,264,198,265,191,263,181,266,179,266,171,262,170',7,1);

/*Table structure for table `budget` */

DROP TABLE IF EXISTS `budget`;

CREATE TABLE `budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_type` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `comments` varchar(5000) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `state` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `notes` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `budget` */

/*Table structure for table `cms_category` */

DROP TABLE IF EXISTS `cms_category`;

CREATE TABLE `cms_category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARENT_CATEGORY` int(11) DEFAULT NULL,
  `TITLE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `UK_category_ID` (`ID`),
  KEY `FK_parent_category` (`PARENT_CATEGORY`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cms_category` */

insert  into `cms_category`(`ID`,`PARENT_CATEGORY`,`TITLE`) values (1,NULL,'Uncategorized'),(2,NULL,'About Us');

/*Table structure for table `cms_images` */

DROP TABLE IF EXISTS `cms_images`;

CREATE TABLE `cms_images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MIME` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `WIDTH` int(11) DEFAULT NULL,
  `HEIGHT` int(11) DEFAULT NULL,
  `OWNER` int(11) DEFAULT NULL,
  `META` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESCRIPTION` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UPDATED` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_images` */

insert  into `cms_images`(`ID`,`NAME`,`MIME`,`URL`,`WIDTH`,`HEIGHT`,`OWNER`,`META`,`DESCRIPTION`,`CREATED`,`UPDATED`) values (3,'mapToggle.jpg','image/jpeg','uploads/mapToggle.jpg',400,270,NULL,NULL,NULL,'2015-09-04 13:15:57','2015-09-04 13:15:57'),(4,'africa.png','image/png','uploads/africa.png',400,270,NULL,NULL,NULL,'2015-09-04 13:37:41','2015-09-04 13:37:41'),(5,'africa.png','image/png','uploads/africa.png',382,259,NULL,NULL,NULL,'2015-09-04 13:44:02','2015-09-04 13:44:02'),(6,'mapToggle.jpg','image/jpeg','uploads/mapToggle.jpg',400,270,NULL,NULL,NULL,'2015-09-25 16:55:05','2015-09-25 16:55:05'),(7,'madagascar.png','image/png','uploads/madagascar.png',400,270,NULL,NULL,NULL,'2015-09-27 03:16:04','2015-09-27 03:16:04'),(8,'madagascar.png','image/png','uploads/madagascar.png',400,270,NULL,NULL,NULL,'2015-09-28 10:12:17','2015-09-28 10:12:17'),(9,'madagascar.png','image/png','uploads/madagascar.png',400,270,NULL,NULL,NULL,'2015-09-28 10:13:13','2015-09-28 10:13:13'),(10,'madagascar.png','image/png','uploads/madagascar.png',400,270,NULL,NULL,NULL,'2015-09-28 12:42:47','2015-09-28 12:42:47');

/*Table structure for table `cms_layout` */

DROP TABLE IF EXISTS `cms_layout`;

CREATE TABLE `cms_layout` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LAYOUT` varchar(255) DEFAULT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `cms_layout` */

insert  into `cms_layout`(`ID`,`LAYOUT`,`TITLE`) values (1,'main','Main layout');

/*Table structure for table `cms_layout_section` */

DROP TABLE IF EXISTS `cms_layout_section`;

CREATE TABLE `cms_layout_section` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) DEFAULT NULL,
  `LAYOUT` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_layout_section_layout_ID` (`LAYOUT`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cms_layout_section` */

insert  into `cms_layout_section`(`ID`,`NAME`,`LAYOUT`) values (1,'header',1),(2,'footer',1),(3,'main-nav',1);

/*Table structure for table `cms_menu` */

DROP TABLE IF EXISTS `cms_menu`;

CREATE TABLE `cms_menu` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `POSITION` varchar(255) DEFAULT NULL,
  `TEMPLATE` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Menus for CMS';

/*Data for the table `cms_menu` */

insert  into `cms_menu`(`ID`,`NAME`,`POSITION`,`TEMPLATE`) values (1,'Main Menu','',NULL);

/*Table structure for table `cms_menu_item` */

DROP TABLE IF EXISTS `cms_menu_item`;

CREATE TABLE `cms_menu_item` (
  `MENU` int(11) NOT NULL DEFAULT '0',
  `TITLE` varchar(255) NOT NULL,
  `STATE` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAGE` int(11) DEFAULT NULL,
  `ORDER` int(11) NOT NULL,
  `PARENT_MENU` int(11) DEFAULT NULL,
  `TYPE` int(11) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `IS_HOME` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_menu_item_menu_ID` (`MENU`),
  KEY `FK_cms_menu_item_cms_page_ID` (`PAGE`),
  KEY `FK_cms_menu_item_cms_menu_item_ID` (`PARENT_MENU`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `cms_menu_item` */

insert  into `cms_menu_item`(`MENU`,`TITLE`,`STATE`,`ID`,`PAGE`,`ORDER`,`PARENT_MENU`,`TYPE`,`URL`,`IS_HOME`) values (1,'Home',1,1,1,1,NULL,0,'',1),(1,'Destinations',1,2,8,2,NULL,0,'',0),(1,'Wishlist',1,3,10,4,NULL,0,'',0),(1,'Contact Us',1,9,11,5,NULL,0,'',0),(1,'About Us',1,10,9,3,NULL,0,'',0),(1,'Philosophy',1,11,7,1,10,0,'',0),(1,'Our Story',1,12,12,2,10,0,'',0),(1,'Team',1,13,13,3,10,0,'',0),(1,'Why',1,14,14,4,10,0,'',0),(1,'Feedback',1,15,15,5,10,0,'',0);

/*Table structure for table `cms_page` */

DROP TABLE IF EXISTS `cms_page`;

CREATE TABLE `cms_page` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) NOT NULL,
  `CONTENT_ID` int(11) DEFAULT NULL,
  `TYPE` tinyint(4) NOT NULL COMMENT '0:PAGE; 1:POST_CATEGORY',
  `ORDER` int(11) DEFAULT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `CONTROLLER` varchar(255) DEFAULT NULL,
  `METHOD` varchar(255) DEFAULT NULL,
  `LAYOUT` int(11) DEFAULT NULL,
  `IS_HOME` tinyint(1) DEFAULT '0',
  `STATE` int(11) DEFAULT NULL,
  `POST_CATEGORY` int(11) DEFAULT NULL,
  `POST_ID` int(11) DEFAULT NULL,
  `HEADER_IMAGE` int(11) DEFAULT NULL,
  `HEADER_TEXT` varchar(255) DEFAULT NULL,
  `SHOW_BREAD_CRUMBS` tinyint(1) DEFAULT NULL,
  `INTRO_TEXT` varchar(255) DEFAULT NULL,
  `INTRO_IMAGE` int(11) DEFAULT NULL,
  `HEADER_MASK` int(11) DEFAULT NULL,
  `PARENT_PAGE` int(11) DEFAULT NULL,
  `WRAP_CONTENT` tinyint(1) DEFAULT '1',
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `OWNER` int(11) DEFAULT NULL,
  `MODIFIED_BY` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_menu_item_post_ID` (`CONTENT_ID`),
  KEY `FK_page_layout_ID` (`LAYOUT`),
  KEY `FK_page_post_content_ID` (`POST_CATEGORY`),
  KEY `FK_cms_page_cms_post_content_ID` (`POST_ID`),
  KEY `FK_cms_page_cms_page_ID` (`PARENT_PAGE`),
  KEY `FK_cms_page_cms_images_ID` (`HEADER_IMAGE`),
  KEY `FK_cms_page_cms_images_intro_ID` (`INTRO_IMAGE`),
  KEY `FK_cms_page_header_mask_images_ID` (`HEADER_MASK`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `cms_page` */

insert  into `cms_page`(`ID`,`TITLE`,`CONTENT_ID`,`TYPE`,`ORDER`,`URL`,`CONTROLLER`,`METHOD`,`LAYOUT`,`IS_HOME`,`STATE`,`POST_CATEGORY`,`POST_ID`,`HEADER_IMAGE`,`HEADER_TEXT`,`SHOW_BREAD_CRUMBS`,`INTRO_TEXT`,`INTRO_IMAGE`,`HEADER_MASK`,`PARENT_PAGE`,`WRAP_CONTENT`,`CREATED_AT`,`UPDATED_AT`,`OWNER`,`MODIFIED_BY`) values (1,'Home',1,4,NULL,NULL,NULL,NULL,1,1,1,NULL,NULL,2,'Organiza y comparte tus<br>proyectos en la <strong>nube</strong><br><br>Tus archivos estarán centralizados y al alcance de todos',0,'',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(2,'FAQ´s',2,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(3,'Términos de uso',3,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(4,'Condiciones generales de contratación',4,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(5,'Acerca de Amazon Web Services',5,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(6,'Política de cookies',6,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(7,'Philosophy',7,0,NULL,NULL,NULL,NULL,1,0,0,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(8,'Destinations',9,0,NULL,NULL,NULL,NULL,1,0,0,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(9,'About Us',12,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(10,'Wishlist',9,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(11,'Contact',9,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL),(12,'Our Story',8,0,NULL,NULL,NULL,NULL,1,0,0,NULL,NULL,NULL,'',0,'',NULL,NULL,9,0,NULL,NULL,NULL,NULL),(13,'Team',9,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,9,0,NULL,NULL,NULL,NULL),(14,'Why to travel with us',10,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,9,0,NULL,NULL,NULL,NULL),(15,'Feedback',11,0,NULL,NULL,NULL,NULL,1,0,1,NULL,NULL,NULL,'',0,'',NULL,NULL,9,0,NULL,NULL,NULL,NULL);

/*Table structure for table `cms_post_content` */

DROP TABLE IF EXISTS `cms_post_content`;

CREATE TABLE `cms_post_content` (
  `ID` int(11) NOT NULL,
  `TITLE` varchar(255) DEFAULT NULL,
  `CONTENT` longtext,
  `area_id` int(11) DEFAULT NULL,
  `STATE` smallint(6) DEFAULT '0' COMMENT '0-UNPUBLISHED; 1-PUBLISHED; 3-TRASHED; 4-VERSIONED/UPTATED',
  `CREATION_DATE` timestamp NULL DEFAULT NULL,
  `LAST_MODIFIED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `OWNER` int(11) DEFAULT NULL,
  `PERMALINK` varchar(255) DEFAULT NULL,
  `CATEGORY` int(11) DEFAULT NULL,
  `VERSION_ID` int(11) DEFAULT NULL,
  `FEATURED_IMG` int(11) DEFAULT NULL,
  `META_DATA` varchar(255) DEFAULT NULL,
  `MODIFIED_BY` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_post_content` */

insert  into `cms_post_content`(`ID`,`TITLE`,`CONTENT`,`area_id`,`STATE`,`CREATION_DATE`,`LAST_MODIFIED`,`OWNER`,`PERMALINK`,`CATEGORY`,`VERSION_ID`,`FEATURED_IMG`,`META_DATA`,`MODIFIED_BY`) values (1,'How to use','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt at leo et euismod. Fusce sem nulla, sollicitudin sit amet elit vel, eleifend varius sem. Fusce vitae interdum urna, sed bibendum ligula. Vivamus pellentesque felis quis ante convallis molestie. Phasellus a blandit ante. Pellentesque eget viverra nibh. Donec vulputate dignissim venenatis. Curabitur varius vulputate metus sed luctus. In sed eleifend nisi.</p><p>Quisque ultricies magna sed magna malesuada euismod. Vestibulum vestibulum maximus mauris sed aliquam. In sit amet dictum eros. Ut mollis nulla eu est tristique, a tempus nisi ornare. Nunc ut iaculis elit, et dictum augue. Pellentesque vulputate egestas mauris eget pharetra. Morbi consectetur euismod est, quis pharetra orci viverra eget. Vestibulum congue porta ultrices. Suspendisse eget tortor sit amet neque molestie pretium quis a tellus. Etiam vitae pharetra leo, non tempor diam. Maecenas at quam ultrices, laoreet dui ut, facilisis augue. Etiam maximus euismod tristique.</p><p>Morbi nec mauris non justo cursus finibus a ut elit. Donec eget vestibulum nisl. Nulla metus nibh, bibendum sed sem nec, vestibulum lacinia ipsum. Morbi interdum elit diam, sit amet tempus mauris aliquet non. Duis dolor mauris, tincidunt sit amet aliquam vel, accumsan non nunc. Proin molestie mi ut rutrum porta. Aenean placerat risus nisi, quis interdum lacus cursus sed. Phasellus nec neque vitae risus tempor imperdiet. Etiam et nisl leo. Donec eget ipsum sem. Praesent vel dui non arcu vulputate finibus. Nulla bibendum orci vel enim placerat, sit amet lacinia sapien iaculis. Phasellus non sem tellus. Duis faucibus diam ex, vel ultricies nisl ullamcorper quis.</p>',NULL,1,'2015-03-31 09:08:28','2015-09-04 10:05:24',NULL,'',1,NULL,NULL,'',5),(2,'FAQ´s','<div class=\"main\">\r\n	<div class=\"accordion\">\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-1\">¿El plan gratuito dispone de todas las funcionalidades?</a>\r\n			<div id=\"accordion-1\" class=\"accordion-section-content\">\r\n				<p>Sí, el plan gratuito tiene las mismas funciones que una cuenta de pago, pero está limitada a único proyecto y a un espacio de almacenamiento más limitado.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-2\">¿Pueden invitarme a un proyecto si ya tengo un plan gratuito?</a>\r\n			<div id=\"accordion-2\" class=\"accordion-section-content\">\r\n				<p>Al registrarte en Myprojectt, se activa automáticamente tu plan gratuito que te permite crear tus propios proyectos.</p>\r\n				<p>\r\n					Estar registrado en Myprojectt te permite tres roles distintos dentro del sistema:\r\n					</p><ul>\r\n						<li>Puedes ser el administrador de tus propios proyectos a través de un plan gratuito o de pago.</li>\r\n						<li>Puedes pertenecer al Equipo del proyecto de otro usuario.</li>\r\n						<li>Puedes recibir invitaciones a una carpeta concreta del proyecto de otro usuario.</li>\r\n					</ul>\r\n				\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-3\">¿Cuánto tiempo puedo usar el plan gratuito?</a>\r\n			<div id=\"accordion-3\" class=\"accordion-section-content\">\r\n				<p>Puedes usar el plan gratuito durante todo el tiempo que desees. Lo único que te pedimos es que realmente aproveches la oportunidad que te brindamos de probar y utilizar nuestra aplicación gratuitamente. Por ello, si tu proyecto está más de 60 días sin actividad, liberaremos el espacio de almacenamiento y todos tus archivos serán borrados.\r\n				</p>\r\n				<p>Recibirás varios correos antes de proceder al borrado de tus archivos.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-4\">¿Perderé mis archivos si cambio mi plan gratuito por un plan de pago?</a>\r\n			<div id=\"accordion-4\" class=\"accordion-section-content\">\r\n				<p>No perderás nada. Tu cuenta es la misma solo que ahora tendrás mayor capacidad de almacenamiento y podrás crear más proyectos.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-5\">¿Perderé mis archivos si cambio a un plan de pago menor?</a>\r\n			<div id=\"accordion-5\" class=\"accordion-section-content\">\r\n				<p>Si quieres cambiar a un plan menor no hay problema. Cuando lo solicites, te mostraremos una información en la que podrás ver si tus archivos caben en el nuevo plan que has elegido. En el caso de no caber, te daremos una indicación de cuanto espacio debes liberar antes de bajar de plan.\r\n				</p>\r\n				<p>Éste es un trabajo que no podemos hacer por ti, ya que sólo tú gestionas tus documentos.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-6\">¿El pago del plan mensual es automático?</a>\r\n			<div id=\"accordion-6\" class=\"accordion-section-content\">\r\n				<p>Sí, cuando realices la contratación, la orden quedará almacenada en los servicios informáticos del banco y el pago se realizará mensualmente en el mismo día de cada mes en el que iniciaste la suscripción.\r\n				</p>\r\n				<p>\r\n				Myprojectt no tiene en ningún momento acceso a tu información económica. La transacción se realiza íntegramente entre tú y el banco.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-7\">¿Dónde se guardan los datos de mi tarjeta para el pago mensual?</a>\r\n			<div id=\"accordion-7\" class=\"accordion-section-content\">\r\n				<p>Cuando realizas el pago por primera vez, verás que todo el proceso se realiza en los sistemas informáticos del banco, a través de un TPV virtual. Es el banco el que almacena tus datos de pago para utilizarlos cada mes, mientras no reciba una orden contraria.\r\n				</p>\r\n				<p>\r\n				Myprojectt no tiene en ningún momento acceso a tu información económica. La transacción se realiza íntegramente entre tú y el banco.				\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-8\">¿Cómo cancelo mi plan mensual?</a>\r\n			<div id=\"accordion-8\" class=\"accordion-section-content\">\r\n				<p>Cancelar tu suscripción es muy sencillo y podrás hacerlo en cualquier momento y sin coste alguno. Sólo tendrás que ir a “cambiar plan” y elegir nuevamente el plan gratuito.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-9\">¿Existe algún compromiso de permanencia?</a>\r\n			<div id=\"accordion-9\" class=\"accordion-section-content\">\r\n				<p>No. No tienes ningún tipo de atadura con nosotros. Puedes cancelar tu plan mensual siempre que lo desees. \r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-10\">¿Qué ocurre si cancelo mi plan antes de acabar el mes que he pagado?</a>\r\n			<div id=\"accordion-10\" class=\"accordion-section-content\">\r\n				<p>Puedes cancelar tu plan cualquier día del mes y los servicios seguirán estando disponibles hasta finalizar el periodo pagado.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-11\">Necesito la factura mensual</a>\r\n			<div id=\"accordion-11\" class=\"accordion-section-content\">\r\n				<p>En tu área de usuario podrá descargar la correspondiente factura mensual.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-12\">¿Puedo usar Myprojectt para realizar copias de seguridad de mis archivos?</a>\r\n			<div id=\"accordion-12\" class=\"accordion-section-content\">\r\n				<p>Claro y además es una opción que utilizan muchas empresas. Tener una segunda copia de la documentación nunca está de más.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-13\">¿Cómo puedo dejar de recibir avisos cada vez que se suba un nuevo archivo?</a>\r\n			<div id=\"accordion-13\" class=\"accordion-section-content\">\r\n				<p>En la configuración de tu cuenta puedes definir los parámetros de los avisos que quieres recibir.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-14\">¿Es verdad que mis archivos se almacenan en Amazon?</a>\r\n			<div id=\"accordion-14\" class=\"accordion-section-content\">\r\n				<p>Sí, es verdad. Nosotros no almacenamos ni uno solo de tus archivos en nuestros propios servidores. Amazon es líder mundial en sistemas de almacenamiento online, por eso confiamos en ellos para la correcta custodia de tus archivos y documentos.\r\n				</p>\r\n				<p>\r\n				Puedes leer acerca de las políticas de almacenamiento de Amazon en el siguiente enlace: <a href=\"http://aws.amazon.com/es/agreement/\">http://aws.amazon.com/es/agreement/</a>\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-15\">¿Qué es un uso razonable de los recursos?</a>\r\n			<div id=\"accordion-15\" class=\"accordion-section-content\">\r\n				<p>Myprojectt es una herramienta diseñada para empresas y despachos profesionales. Las cargas y descargas que realizan todos estos profesionales forman un promedio de uso de la aplicación. Si tu uso rebasa en mucho las tasas promedio de trasferencia de todos los usuarios, porque estés realizando un mal uso de Myprojectt, tu cuenta será eliminada de nuestro sistema.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-16\">¿Qué diferencias hay entre los usuarios de MI EQUIPO y los INVITADOS?</a>\r\n			<div id=\"accordion-16\" class=\"accordion-section-content\">\r\n				<p>Los integrantes de tu EQUIPO tendrán acceso al proyecto completo. Todas las carpetas que crees o archivos que subas, estarán automáticamente compartidos con ellos.\r\n				</p>\r\n				<p>\r\n				Lo INVITADOS, en cambio, solo tendrán acceso a aquellas carpetas concretas a las que los hayas invitado. No tendrán acceso ni verán el resto de carpetas.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-17\">¿Cómo funciona la papelera de reciclaje?</a>\r\n			<div id=\"accordion-17\" class=\"accordion-section-content\">\r\n				<p>La papelera funciona igual que la de tu ordenador. Cuando elimines algún archivo, quedará almacenado en la papelera de reciclaje para poder recuperarlo más tarde. \r\n				</p>\r\n				Cuando vacíes la papelera, tus archivos quedarán eliminados definitivamente de nuestro sistema y ya no se podrán recuperar.\r\n				\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-18\">¿La papelera de reciclaje ocupa espacio de almacenamiento?</a>\r\n			<div id=\"accordion-18\" class=\"accordion-section-content\">\r\n				<p>Sí, todo lo que esté en la papelera te está restando capacidad de almacenamiento para tus proyectos. Vacía la papelera y el espacio quedará liberado.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-19\">¿A cuántos usuarios puedo invitar a mis proyectos?</a>\r\n			<div id=\"accordion-19\" class=\"accordion-section-content\">\r\n				<p>El número de usuarios con quien compartir tus proyectos es ilimitado.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-20\">¿Mis datos son visibles para el resto de usuarios?</a>\r\n			<div id=\"accordion-20\" class=\"accordion-section-content\">\r\n				<p>Myprojectt es un buen medio para que todos los participantes de un proyecto se conozcan. Todos los participantes podrán ver la información personal y de contacto que hayas introducido.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-21\">¿Hay un tamaño máximo para mis archivos?</a>\r\n			<div id=\"accordion-21\" class=\"accordion-section-content\">\r\n				<p>Amazon tiene especificado que el tamaño máximo para un solo archivo es de 5 GB.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-22\">¿Puedo compartir cualquier tipo de archivo con Myprojectt?</a>\r\n			<div id=\"accordion-22\" class=\"accordion-section-content\">\r\n				<p>Sí, puedes compartir la documentación que quieras siempre de acuerdo con las políticas internacionalmente reconocidas sobre la propiedad intelectual y los derechos de autor.\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->\r\n		<!--end .accordion-section-->\r\n		<div class=\"accordion-section\">\r\n			<a class=\"accordion-section-title\" href=\"#accordion-23\">¿Puedo utilizar todo el espacio de mi plan en un solo proyecto?</a>\r\n			<div id=\"accordion-23\" class=\"accordion-section-content\">\r\n				<p>Cada plan te da derecho a crear un número determinado de proyectos y a disponer de un espacio de almacenamiento.\r\n				</p>\r\n				<p>\r\n				Puedes utilizar el espacio como necesites, sin tener que realizar ninguna acción. Simplemente sube tus archivos al proyecto que más te convenga.\r\n\r\n				</p>\r\n			</div>\r\n			<!--end .accordion-section-content-->\r\n		</div>\r\n		<!--end .accordion-section-->		\r\n	</div>\r\n	<!--end .accordion-->\r\n</div>',NULL,1,'2015-03-31 17:17:13','2015-07-09 08:45:24',NULL,'',1,NULL,NULL,'',6),(3,'Términos de uso','<p>Contenido de Términos de uso<span></span></p>',NULL,1,'2015-03-31 17:17:41','2015-03-31 17:17:41',NULL,'',1,NULL,NULL,'',0),(4,'Condiciones generales de contratación','<p>Contenido de Condiciones generales de contratación<span></span></p>',NULL,1,'2015-03-31 17:18:08','2015-03-31 17:18:08',NULL,'',1,NULL,NULL,'',0),(6,'Política de cookies','<p>Utilizamos cookies para facilitar el uso de nuestra página web. Las cookies son pequeños ficheros de texto que su navegador almacena en el disco duro de su ordenador y que son necesarias para\r\nutilizar nuestra página web. Las utilizamos para entender mejor la manera en la que se usa nuestra página web y de esta manera poder mejorar consecuentemente el proceso de navegación. \r\n</p>\r\n<p>\r\nLas cookies son el referente que nos indica, por ejemplo, si una página de nuestra web ha sido vista con anterioridad, o si su visita es nueva o recurrente. Las cookies que utilizamos no almacenan datos personal alguno, ni ningún tipo de información que pueda identificarle. En caso de no querer recibir cookies, por favor configure su navegador de Internet para que las borre del disco duro de su ordenador, las bloquee o le avise en caso de instalación de las mismas.\r\n</p>',NULL,1,NULL,'2015-04-06 14:20:05',NULL,'',1,NULL,NULL,'',0),(7,'Philosophy','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus tincidunt at leo et euismod. Fusce sem nulla, sollicitudin sit amet elit vel, eleifend varius sem. Fusce vitae interdum urna, sed bibendum ligula. Vivamus pellentesque felis quis ante convallis molestie. Phasellus a blandit ante. Pellentesque eget viverra nibh. Donec vulputate dignissim venenatis. Curabitur varius vulputate metus sed luctus. In sed eleifend nisi.</p><p>Quisque ultricies magna sed magna malesuada euismod. Vestibulum vestibulum maximus mauris sed aliquam. In sit amet dictum eros. Ut mollis nulla eu est tristique, a tempus nisi ornare. Nunc ut iaculis elit, et dictum augue. Pellentesque vulputate egestas mauris eget pharetra. Morbi consectetur euismod est, quis pharetra orci viverra eget. Vestibulum congue porta ultrices. Suspendisse eget tortor sit amet neque molestie pretium quis a tellus. Etiam vitae pharetra leo, non tempor diam. Maecenas at quam ultrices, laoreet dui ut, facilisis augue. Etiam maximus euismod tristique.</p><p>Morbi nec mauris non justo cursus finibus a ut elit. Donec eget vestibulum nisl. Nulla metus nibh, bibendum sed sem nec, vestibulum lacinia ipsum. Morbi interdum elit diam, sit amet tempus mauris aliquet non. Duis dolor mauris, tincidunt sit amet aliquam vel, accumsan non nunc. Proin molestie mi ut rutrum porta. Aenean placerat risus nisi, quis interdum lacus cursus sed. Phasellus nec neque vitae risus tempor imperdiet. Etiam et nisl leo. Donec eget ipsum sem. Praesent vel dui non arcu vulputate finibus. Nulla bibendum orci vel enim placerat, sit amet lacinia sapien iaculis. Phasellus non sem tellus. Duis faucibus diam ex, vel ultricies nisl ullamcorper quis.</p><p>Aliquam odio risus, interdum vel vehicula vitae, molestie sed lacus. Cras lobortis lobortis euismod. Maecenas sapien ante, faucibus ut turpis nec, feugiat fermentum ante. Aenean ac feugiat ipsum. Nam sed felis vitae quam rhoncus sodales. Aenean orci arcu, maximus pulvinar pulvinar aliquam, accumsan a dui. Aenean lacinia, diam ac vehicula maximus, mi nulla consequat diam, eu imperdiet turpis tortor accumsan ante.</p><p>Nulla vel sodales lorem. Nulla non velit ac magna euismod luctus. Vivamus finibus, purus ac interdum laoreet, leo nunc fringilla leo, ut ultrices urna nisi vitae elit. Sed suscipit dolor sed risus vehicula, eu maximus lorem suscipit. Vestibulum fringilla dolor vel ante tristique, tincidunt eleifend velit sagittis. Cras in mauris a sem aliquet maximus. Etiam suscipit ex ex, eget porta neque pretium nec. Vivamus commodo dolor vitae aliquam efficitur. Nulla consequat et diam quis tempor. Vivamus a justo sit amet sapien iaculis sodales.</p>',NULL,1,'2015-09-03 13:28:13','2015-09-28 10:14:03',5,'',2,NULL,6,'',6),(8,'Our Story','Our Story<p> content....</p>',NULL,1,'2015-09-03 13:29:43','2015-09-03 13:29:43',5,'',2,NULL,NULL,'',5),(9,'Team','<p>Team content</p>',NULL,1,'2015-09-03 13:29:59','2015-09-03 13:29:59',5,'',2,NULL,NULL,'',5),(10,'Why travel with us','Why travel with us<p>, Why travel with us, Why travel with usWhy travel with usWhy travel with usWhy travel with usWhy travel with usWhy travel with usWhy travel with usWhy travel with usWhy travel with us</p>',NULL,1,'2015-09-03 13:30:37','2015-09-04 11:06:03',5,'',2,NULL,NULL,'',5),(11,'Feedback','Feedback content',NULL,1,'2015-09-03 13:30:58','2015-09-03 13:30:58',5,'',2,NULL,NULL,'',5),(12,'About us','<p>About us content</p>',NULL,1,'2015-09-04 11:04:22','2015-09-04 11:04:22',5,'',2,NULL,NULL,'',5),(13,'Nation Parks in Africa','Nation Parks in Africa. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,',3,1,'2015-09-28 11:18:10','2015-09-28 11:24:28',6,'',2,NULL,NULL,'National Park',6);

/*Table structure for table `cms_slide` */

DROP TABLE IF EXISTS `cms_slide`;

CREATE TABLE `cms_slide` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(255) DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  `INTRO_TEXT` varchar(255) DEFAULT NULL,
  `BG_IMAGE` varchar(255) DEFAULT NULL,
  `BG_COLOR` int(11) DEFAULT NULL,
  `SLIDER` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_slide_slider_ID` (`SLIDER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_slide` */

/*Table structure for table `cms_slider` */

DROP TABLE IF EXISTS `cms_slider`;

CREATE TABLE `cms_slider` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) DEFAULT NULL,
  `BG_COLOR` int(11) DEFAULT NULL,
  `BG_IMAGE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `cms_slider` */

/*Table structure for table `cms_states` */

DROP TABLE IF EXISTS `cms_states`;

CREATE TABLE `cms_states` (
  `STATE` int(11) NOT NULL DEFAULT '0',
  `STATE_NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`STATE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cms_states` */

insert  into `cms_states`(`STATE`,`STATE_NAME`) values (0,'DRAFT'),(1,'PUBLISHED'),(2,'DELETED');

/*Table structure for table `cms_widget_position` */

DROP TABLE IF EXISTS `cms_widget_position`;

CREATE TABLE `cms_widget_position` (
  `WIDGET_ID` int(11) NOT NULL DEFAULT '0',
  `ORDER` int(11) DEFAULT NULL,
  `TYPE` smallint(6) DEFAULT NULL,
  `LAYOUT_SECTION` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PAGE` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_cms_widget_position_cms_layout_section_ID` (`LAYOUT_SECTION`),
  KEY `FK_cms_widget_id_slider` (`WIDGET_ID`),
  KEY `FK_cms_widget_position_cms_page_ID` (`PAGE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `cms_widget_position` */

insert  into `cms_widget_position`(`WIDGET_ID`,`ORDER`,`TYPE`,`LAYOUT_SECTION`,`ID`,`PAGE`) values (1,NULL,0,3,1,1),(2,NULL,0,1,2,1),(3,2,0,2,3,1);

/*Table structure for table `custom_trip` */

DROP TABLE IF EXISTS `custom_trip`;

CREATE TABLE `custom_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `base_trip` int(11) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `airport_transfers` tinyint(1) NOT NULL DEFAULT '0',
  `airport` int(11) DEFAULT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `custom_trip` */

/*Table structure for table `custom_trip_extension` */

DROP TABLE IF EXISTS `custom_trip_extension`;

CREATE TABLE `custom_trip_extension` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_type` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `nights` int(11) NOT NULL DEFAULT '1',
  `people` int(11) NOT NULL DEFAULT '1',
  `rooms` int(11) NOT NULL DEFAULT '1',
  `meals` int(11) NOT NULL DEFAULT '0',
  `german_guide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `custom_trip_extension` */

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `rate` decimal(2,2) NOT NULL DEFAULT '0.00',
  `comment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `friendship` */

DROP TABLE IF EXISTS `friendship`;

CREATE TABLE `friendship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1` int(11) NOT NULL,
  `user2` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `friendship` */

/*Table structure for table `group_trip` */

DROP TABLE IF EXISTS `group_trip`;

CREATE TABLE `group_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `group_trip_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `group_trip` */

/*Table structure for table `lodge` */

DROP TABLE IF EXISTS `lodge`;

CREATE TABLE `lodge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(1200) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0: Draft, 1: Published; 2: Deleted',
  `notes` varchar(2000) DEFAULT NULL,
  `img` int(11) DEFAULT NULL,
  `poll_rate` decimal(2,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `area_id` (`area_id`),
  CONSTRAINT `lodge_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `lodge` */

insert  into `lodge`(`id`,`area_id`,`name`,`description`,`state`,`notes`,`img`,`poll_rate`) values (1,8,'Lifes Hotel','Lifes Hotel in Madagascar',1,'',NULL,NULL);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  `sent_at` datetime DEFAULT NULL,
  `read_at` datetime DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message` */

/*Table structure for table `news` */

DROP TABLE IF EXISTS `news`;

CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0: Draft, 1: Published, 2: Deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `news` */

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `group_name` varchar(255) NOT NULL,
  `param_name` varchar(255) NOT NULL,
  `param_type` int(11) NOT NULL,
  `param_int_value` int(11) DEFAULT NULL,
  `param_varchar_value` varchar(255) DEFAULT NULL,
  `param_long_value` varchar(1020) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`param_name`,`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`group_name`,`param_name`,`param_type`,`param_int_value`,`param_varchar_value`,`param_long_value`,`description`) values ('areas-settings','area-worldmap-id',1,1,'','','This is the ID of the Word Wide map. This is the ancestor for every other map and this variable is used to show the right map in the Destination entry page and at the Home.'),('front-page','facebook-link',2,NULL,'http://www.facebook.com','','Enlace para Facebook en el pie'),('front-page','google-analytics',3,NULL,'','<script>\r\n  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){\r\n  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),\r\n  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)\r\n  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');\r\n \r\n  ga(\'create\', \'UA-63585728-1\', \'auto\');\r\n  ga(\'send\', \'pageview\');\r\n \r\n</script>','Códido de seguimiento de google analitycs proporcionado por google.'),('admin-emails','info-address',2,NULL,'info@myprojectt.com','','Dirección de correo dónde se enviaran las comunicaciones al adminsitrador de la aplicación.'),('tasks-module','log-file-path',2,NULL,'./tasks.log','','Path para el fichero de logs del módulo de tareas ejecutadas diariamente.'),('front-page','meta-description',2,NULL,'Comparte tus proyectos online. Tus documentos centralizados y al alcance de todos. Recibe avisos automáticos con cada revisión de tus archivos o planos','','Meta descripción del sitio en la front page'),('front-page','meta-words',3,NULL,'','Software gestión de proyectos, Compartir proyectos online, Compartir proyectos nube, Gestión proyectos online, Gestión proyectos nube, Proyectos online, Programa compartir proyectos, Web compartir proyectos, Gestión documentos online, Gestión documental online','Meta tags para la portada');

/*Table structure for table `trip_album` */

DROP TABLE IF EXISTS `trip_album`;

CREATE TABLE `trip_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `trip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trip_album` */

/*Table structure for table `trip_documents` */

DROP TABLE IF EXISTS `trip_documents`;

CREATE TABLE `trip_documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `internal_path` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `trip` int(11) NOT NULL,
  `passenger_name` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trip_documents` */

/*Table structure for table `trip_pictures` */

DROP TABLE IF EXISTS `trip_pictures`;

CREATE TABLE `trip_pictures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album` int(11) NOT NULL,
  `trip` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL,
  `share` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `trip_pictures` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `email` varchar(150) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `state` smallint(6) DEFAULT NULL COMMENT '0-UNACTIVE; 1-ACTIVATED; 2-BANNED; 3-LOCKED',
  `creation_date` timestamp NULL DEFAULT NULL,
  `last_acces` datetime DEFAULT NULL,
  `status` smallint(6) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `picture_url` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `about_me` varchar(1000) NOT NULL,
  `professional_experience` varchar(1000) NOT NULL,
  `studies` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `job_position` varchar(255) NOT NULL,
  `employment` varchar(255) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `province` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `gender_male` tinyint(1) NOT NULL,
  `website` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `github` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`type`,`email`,`name`,`surname`,`password`,`state`,`creation_date`,`last_acces`,`status`,`username`,`created_at`,`updated_at`,`auth_key`,`password_hash`,`password_reset_token`,`picture_url`,`company`,`about_me`,`professional_experience`,`studies`,`birthday`,`job_position`,`employment`,`zip_code`,`province`,`address`,`telephone`,`skype`,`gender_male`,`website`,`city`,`twitter`,`linkedin`,`google_plus`,`github`,`facebook`) values (1,2,'diego2.sanz@gmail.com','Diego','Sanz Prieto',NULL,NULL,NULL,NULL,10,'diego2',1422706304,2147483647,'tcBJgvmk0PAL6Xa_qR-ztS5VfbsnMfZI','$2y$13$pp742knvvpkcaIji2UYex.cI3j2vfsoH/TcgDSoBNozlfDvFSvlba',NULL,'/uploads/1/diego.jpg','My company','Soy un tipo listo','','Ingneniero informático','1979-12-13','','','47140','Valladolid','avenida de la ronda, 83','3245245254','diesan100',0,'','Laguna de Duero','tttttttttt','linkedin','gggggggggggggg','gigit','https://www.facebook.com/diego.sanz.75'),(5,2,'diego.sanz@gmail.com','','',NULL,10,'2015-09-03 19:44:31',NULL,10,'diego.sanz@gmail.com',NULL,2147483647,'OHkiD5VmJi_zwr2j_aWpuzfK9lkUazCv','$2y$13$M2532EoWgF/eS0Z0EBOcZeWVBtuyFuXfdsfxXlwcu96yYWtLdZmiy',NULL,'/uploads/5/diego.sanz@gmail.com.jpg','','','','','0000-00-00','','','','','','','',0,'','','','','','',''),(6,2,'riguang48@163.com','','',NULL,10,'2015-09-25 16:35:06',NULL,10,'riguang48@163.com',NULL,2147483647,'GcfI7FzJcVjkuVPItEyRm4wQMSeTHG7V','$2y$13$QHPnqYNFj0o12mX09oIdYeiFq9kLX09rZPgfu4iNww65Zk0bV.WXe',NULL,'','','','','','0000-00-00','','','','','','','',0,'','','','','','','');

/*Table structure for table `user_trip` */

DROP TABLE IF EXISTS `user_trip`;

CREATE TABLE `user_trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0: Created, 1: budgeted, 3: Rejected, 4: Booked, 5: In progress, 6: Completed, 7: Rated',
  `created_at` datetime NOT NULL,
  `budgeted_at` datetime DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `booked_at` datetime DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_trip` */

/*Table structure for table `wishlist` */

DROP TABLE IF EXISTS `wishlist`;

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `item_type` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `wishlist` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
