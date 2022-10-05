
/*==============================================================*/
/* Table : T_COMPTE_COM                                         */
/*==============================================================*/
create table T_COMPTE_COM  (
   COM_PSEUDO          VARCHAR(64) CHARACTER SET utf8 COLLATE utf8_bin not null,
   COM_MDP             CHAR(32)                                        not null,
   primary key (COM_PSEUDO)
) ENGINE=InnoDB default charset=utf8 ;

/*==============================================================*/
/* Table : T_PROFIL_PFL                                         */
/*==============================================================*/
create table T_PROFIL_PFL  (
   PFL_NOM               VARCHAR(64)                     not null,
   PFL_PRENOM            VARCHAR(64)                     not null,
   PFL_MAIL              VARCHAR(64)                     not null,
   PFL_VALIDITEPROFIL    CHAR(1)                                 ,
   PFL_ROLE              CHAR(1)                                 ,
   PFL_DATECREATION      DATE                            not null,
   COM_PSEUDO            VARCHAR(256)                    not null,
   primary key (COM_PSEUDO),
   foreign key (COM_PSEUDO) references T_COMPTE_COM (COM_PSEUDO)
) ;

/*==============================================================*/
/* Table : T_ACTUALITE_ACT                                      */
/*==============================================================*/
create table T_ACTUALITE_ACT  (
   ACT_NUMERO              INTEGER          AUTO_INCREMENT not null,
   ACT_TITRE               VARCHAR(256)                    not null,
   ACT_TEXTE               VARCHAR(256)                    not null,	
   ACT_DATEDEPUBLICATION   DATETIME                        not null,	
   COM_PSEUDO              VARCHAR(64)                     not null,
   primary key (ACT_NUMERO),
   foreign key (COM_PSEUDO) references T_COMPTE_COM (COM_PSEUDO)
) ;



/*==============================================================*/
/* Table : T_VISITEUR_VIS                                       */
/*==============================================================*/
create table T_VISITEUR_VIS  (
   VIS_NUMERO                INTEGER not null AUTO_INCREMENT PRIMARY KEY,
   VIS_MOTDEPASSE            CHAR(32)                           not null,
   VIS_DATEHEUREVISITE       DATETIME           		          not null,
   VIS_NOM                   VARCHAR(64)		                           ,
   VIS_PRENOM                VARCHAR(64)			                        ,	
   VIS_EMAIL                 VARCHAR(64)                                ,
   COM_PSEUDO                VARCHAR(64)                        not null,
   foreign key (COM_PSEUDO) references T_COMPTE_COM (COM_PSEUDO)
) ;


/*==============================================================*/
/* Table : T_COMMENTAIRE_CMT                                      */
/*==============================================================*/
create table T_COMMENTAIRE_CMT  (
   CMT_NUMERO                       INTEGER not null AUTO_INCREMENT PRIMARY KEY,
   CMT_DATEHEUREPUBLICATION         DATETIME                           not null,
   CMT_TEXTE			    VARCHAR(256)                       not null,
   VIS_NUMERO                       INTEGER                            not null,
   foreign key (VIS_NUMERO) references T_VISITEUR_VIS(VIS_NUMERO)
) ;

alter table T_COMMENTAIRE_CMT add CMT_ETAT char (1);

/*==============================================================*/
/* Table : T_EXPOSANT_EXP                                       */
/*==============================================================*/
create table T_EXPOSANT_EXP  (
   EXP_ID               	INTEGER                         not null,
   EXP_NOM			VARCHAR(64)			not null,
   EXP_PRENOM			VARCHAR(64)				,
   EXP_TEXTEBIO			VARCHAR(256)			not null,
   EXP_EMAIL			VARCHAR(64)			not null,
   EXP_URLWEB			VARCHAR(256)				,
   EXP_FIC_IMG			VARCHAR(256)			not null,
   COM_PSEUDO           	VARCHAR(64)    	    	        not null,
   primary key (EXP_ID),
   FOREIGN KEY (COM_PSEUDO) REFERENCES T_COMPTE_COM (COM_PSEUDO)
) ;

/*==============================================================*/
/* Table : T_OEUVRE_OEU                                         */
/*==============================================================*/
create table T_OEUVRE_OEU  (
   OEU_CODE               INTEGER                         not null,
   OEU_INTITULE           VARCHAR(256)                    not null,
   OEU_DATECREA           DATE                        not null,
   OEU_DESCRIPTION	  VARCHAR(256)			  not null,
   OEU_FICHIER_IMG        VARCHAR(256)                    not null,
   primary key (OEU_CODE)
) ;

/*==============================================================*/
/* Table de jointure : TJ_PRESENTE_PRE                          */
/*==============================================================*/
create table TJ_PRESENTE_PRE  (
   EXP_ID                 INTEGER                         not null,
   OEU_CODE               INTEGER                         not null,
   primary key (EXP_ID, OEU_CODE),
   foreign key (EXP_ID) references T_EXPOSANT_EXP (EXP_ID),
   foreign key (OEU_CODE) references T_OEUVRE_OEU (OEU_CODE)
) ;

/*==============================================================*/
/* Table : T_CONFIGURATION_CON                                  */
/*==============================================================*/
create table T_CONFIGURATION_CON  (
	CON_INTITULE         VARCHAR(256)             not null,
	CON_DATEDEDEBUT      DATE                             ,
	CON_DATEFIN	         DATE                             ,
	CON_PRESENTATION     VARCHAR(64)                      ,
	CON_LIEU             VARCHAR(64)                      ,
	CON_DATEVERNISSAGE   DATE                             ,
	CON_TEXTEBIENVENUE   VARCHAR(256)                     ,
	PRIMARY KEY (CON_INTITULE)
) ;


INSERT INTO T_COMPTE_COM VALUES ('AIMAD', '6fcde36e12ad819d11e82fef5c6d8a62');
INSERT INTO T_COMPTE_COM VALUES ('AMIL', '83323cd36d98e8fcf9ea879ae05a70c9');
INSERT INTO T_COMPTE_COM VALUES ('MILIAN', '534c27b63c2f7ec55ef1279ac3da53c2');
INSERT INTO T_COMPTE_COM VALUES ('SWANN', 'a692c529f241845ae00b47284e09e76a');
INSERT INTO T_COMPTE_COM VALUES ('TOF', '0c9a0eb44b31a2910d0d479add0435fd');
INSERT INTO T_COMPTE_COM VALUES ('alex', '7aea6958eece0479e4766b3a98449137');
INSERT INTO T_COMPTE_COM VALUES ('benjamin', 'dfb6bee218d40864c5c9f23d952bd301');
INSERT INTO T_COMPTE_COM VALUES ('gEstionnaire', '98abb15e560057e55e4e99187702ed4e');
INSERT INTO T_COMPTE_COM VALUES ('pierre', 'b351bb9b0af6e4fc678749675c53ad67');
INSERT INTO T_COMPTE_COM VALUES ('yanis', '979d5b78613520f02d4118968683fbbb');

INSERT INTO T_PROFIL_PFL VALUES('PERON','Benjamin','B.PERON@netgallery.fr','D','O',CURRENT_DATE,'benjamin');
INSERT INTO T_PROFIL_PFL VALUES('gestionnaire','gest','g.gestionnaire@netgallery.fr','A','A',CURRENT_DATE,'gEstionnaire');
INSERT INTO T_PROFIL_PFL VALUES('AITMHAMED','Aimad','A.AITMHAMED@netgallery.fr','D','O',CURRENT_DATE,'AIMAD');
INSERT INTO T_PROFIL_PFL VALUES('LEVENT','Alex','A.LEVENT@netgallery.fr','D','O',CURRENT_DATE,'alex');
INSERT INTO T_PROFIL_PFL VALUES('CROCE','Pierre','P.CROCE@netgallery.fr','D','O',CURRENT_DATE,'pierre');
INSERT INTO T_PROFIL_PFL VALUES('Le N','Swann','S.LeN@netgallery.fr','D','O',CURRENT_DATE,'SWANN');
INSERT INTO T_PROFIL_PFL VALUES('Le M','Milian','M.LeM@netgallery.fr','D','O',CURRENT_DATE,'MILIAN');
INSERT INTO T_PROFIL_PFL VALUES('Le C','Tof','T.LeC@netgallery.fr','D','A',CURRENT_DATE,'TOF');
INSERT INTO T_PROFIL_PFL VALUES('AMIL','Abdelaziz','A.AMIL@netgallery.fr','D','A',CURRENT_DATE,'AMIL');
INSERT INTO T_PROFIL_PFL VALUES('Le B','Yanis','Y.LeB@netgallery.fr','D','O',CURRENT_DATE,'yanis');

INSERT INTO `T_EXPOSANT_EXP` (`EXP_ID`, `EXP_NOM`, `EXP_PRENOM`, `EXP_TEXTEBIO`, `EXP_EMAIL`, `EXP_URLWEB`, `EXP_FIC_IMG`, `COM_PSEUDO`) VALUES
(1, 'TSUME', 'ART', 'Tsume S.A. est une société luxembourgeoise éditrice de figurines fondée en 2010 et spécialisée dans la création de statuettes en Résine, figurines en PVC, principalement issues des univers mangas, anime et jeux vidéo.', 'TSUME.ART@NETGALLERY.COM', 'https://www.tsume-art.com/fr/', 'images/demo/gallery/tsume.png', 'AMIL'),
(2, 'BANDAI', 'NAMCO', 'Bandai Namco Holdings Inc. (BNHD) , est une entreprise holding japonaise issue de la fusion de Bandai et de Namco le 29 septembre 2005. Elle est spécialisée dans les jouets, les jeux vidéo, les arcades, les animes et les parcs de loisirs.', 'BANDAI.NAMCO@NETGALLERY.COM', 'https://store.bandainamcoent.eu/fr/figurines', 'images/demo/gallery/bandai.png', 'AIMAD'),
(3, 'FUNKO', 'POP', 'Funko est un fabricant de jouets américain fondé en 1998.', 'FUNKO.POP@NETGALLERY.COM', 'https://www.funko.com/shop-all', 'images/demo/gallery/funko.png', 'benjamin'),
(4, 'ANIPLEX', 'INC.', 'Aniplex Inc. est une société de production et de distribution japonaise spécialisée dans les animes, également impliqué dans le merchandising de produits dérivées', 'ANIPLEX.INC@NETGALLERY.COM','https://aniplexusa.com','images/demo/gallery/aniplex.png', 'MILIAN'),
(5, 'ONIRI', 'CREATION', 'Oniri Créations est une société Française spécialisée dans la conception et la fabrication de statues de collection', 'ONIRI.CREATION@NETGALLERY.COM', 'https://oniri-creations.com/fr/produits/', 'images/demo/gallery/oniri.png', 'SWANN');


INSERT INTO `T_OEUVRE_OEU` (`OEU_CODE`, `OEU_INTITULE`, `OEU_DATECREA`, `OEU_DESCRIPTION`, `OEU_FICHIER_IMG`) VALUES 
('1', 'Shanks', '2021-11-17', 'Shanks faisant tomber des membres de l''é.jpgquipage de barbe blanche avec son kaki des rois', 'oeuvre/tsume/Shanks.jpg'),
('2', 'Toshiro', '2019-05-17', 'Toshiro entouré de glace', 'oeuvre/tsume/Toshiro.jpg'),
('3', 'Sasuke', '2020-12-19', 'Sasuke utilisant Susano', 'oeuvre/tsume/Sasuke.jpg'),
('4','Gaara', '2020-09-01', 'Gaara avec une statue de sable representant son pere le protegent', 'oeuvre/tsume/Gaara.jpg'),
('5', 'All Might', '2020-09-01', 'All Might assène le coup de grace à All For One', 'oeuvre/tsume/AllMight.jpg'),
('6','Broly', '2008-07-31', 'Broly super saiyan', 'oeuvre/bandai/Broly.jpg'),
('7', 'Lemon Jihen', '2021-12-24', 'Lemon Jihen', 'oeuvre/bandai/LemonJihen.jpg'),
('8', 'SanGoku', '2020-02-01', 'SanGoku enfant sur kintoun', 'oeuvre/bandai/Sangoku.jpg'),
('9', 'Limule Tempest', '2021-10-01', 'Limule Tempest qui degaine son sabre', 'oeuvre/bandai/LimuleTempest.jpg'),
('10', 'Akaza', '2022-09-01', 'Akaza en position de combat', 'oeuvre/aniplex/Akaza.jpg'),
('11', 'Nezuko', '2022-07-31', 'Nezuko utilisant son pouvoir sanguinaire', 'oeuvre/aniplex/Nezuko.jpg'),
('12', 'Asuna', '2019-06-12', 'Asuna avec le sol qui secroule sous ses pied en plein combat', 'oeuvre/aniplex/Asuna.jpg'),
('13', 'Alphonse Elric', '2019-10-01', 'Alphonse en position de combat', 'oeuvre/aniplex/AlphonseElric.jpg'),
('14', 'Luffy', '2022-12-31', 'Luffy assis sur un coffre au tresor remplit d''or', 'oeuvre/oniri/Luffy.jpg'),
('15', 'Guts and Zodd', '2018-10-30', 'Guts sur le dos de Zodd', 'oeuvre/oniri/GutsZodd.jpg'),
('16', 'Ichigo', '2022-02-15', 'Ichigo en position pour le mode Bankai', 'oeuvre/oniri/Ichigo.jpg'),
('17', 'Zoro Roronoa', '2017-12-12', 'Zoro post-elipse', 'oeuvre/funko/ZoroRoronoa.jpg'),
('18', 'Naruto Uzumaki', '2015-11-04', 'Naruto post-elipse', 'oeuvre/funko/NarutoUzumaki.jpg'),
('19', 'Izuku Midoriya', '2019-02-15', 'Izuku avec son tout premier costume de super-hero', 'oeuvre/funko/IzukuMidoriya.jpg'),
('20','Naruto et Sasuke', '2015-12-08','Scène final de Naruto contre Sasuke','oeuvre/tsumebandai/NarutoSasuke.jpg');




INSERT INTO `TJ_PRESENTE_PRE` (`EXP_ID`, `OEU_CODE`) VALUES
('1', '1'), ('1', '2'),('1', '3'), ('1', '4'), ('1', '5'),
('2', '6'), ('2', '7'), ('2', '8'), ('2', '9'),
('3', '17'), ('3', '18'), ('3', '19'),
('4', '10'), ('4', '11'), ('4', '12'), ('4', '13'),
('5', '14'), ('5', '15'), ('5', '16'),('1', '20'), ('2', '20');


INSERT INTO `T_ACTUALITE_ACT` (`ACT_NUMERO`, `ACT_TITRE`, `ACT_TEXTE`, `ACT_DATEDEPUBLICATION`, `COM_PSEUDO`) VALUES 
('1', 'précommande ouverte chez aniplex', 'les Précommandes pour les figurines de Akaza et Nezuko sont ouvertes aux publics', CURRENT_TIME(), 'MILIAN'), 
('2', 'precommande ouverte chez oniri', 'Les précommandes pour la Figurine de Luffy sont ouvertes serie limité 1000 exemplaires dans le monde', CURRENT_TIME(), 'AMIL'),
('3', 'Freezer arrive chez Bandai', 'Nouvelle figurine de Freezer qui arrive dans le catalogue de Bandai', CURRENT_TIME(), 'alex');


INSERT INTO `T_VISITEUR_VIS` (`VIS_NUMERO`, `VIS_MOTDEPASSE`, `VIS_DATEHEUREVISITE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_EMAIL`, `COM_PSEUDO`) VALUES
(NULL, MD5('yes'), CURRENT_TIME(), 'bebou', 'tof', 'bebou@netgallery.com', 'TOF');


INSERT INTO `T_CONFIGURATION_CON` (`CON_INTITULE`, `CON_DATEDEDEBUT`, `CON_DATEFIN`, `CON_PRESENTATION`, `CON_LIEU`, `CON_DATEVERNISSAGE`, `CON_TEXTEBIENVENUE`) VALUES 
('expo figurine anime', '2022-03-07', '2022-03-19', 'La plus grande exposition de figurine au monde', 'BREST', '2022-03-07', 'Bienvenu');