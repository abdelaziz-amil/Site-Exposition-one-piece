--------------------------------------------------------------------------------------------------------------------------------------------------------------
/*REQUETE SQL*/
--------------------------------------------------------------------------------------------------------------------------------------------------------------
--1)
INSERT INTO `T_ACTUALITE_ACT` (`ACT_NUMERO`, `ACT_TITRE`, `ACT_TEXTE`, `ACT_DATEDEPUBLICATION`, `COM_PSEUDO`) VALUES
('1', 'précommande ouverte chez aniplex', 'les Précommandes pour les figurines de Akaza et Nezuko sont ouvertes aux publics', CURRENT_TIME(), 'MILIAN');
--2)
SELECT * from T_ACTUALITE_ACT
where ACT_DATEDEPUBLICATION = (SELECT max(ACT_DATEDEPUBLICATION) from T_ACTUALITE_ACT);
--3)
SELECT ACT_TEXTE, COM_PSEUDO from T_ACTUALITE_ACT;
--4)
SELECT ACT_TEXTE, COM_PSEUDO from T_ACTUALITE_ACT
SELECT ACT_TEXTE, COM_PSEUDO from T_ACTUALITE_ACT
ORDER BY ACT_DATEDEPUBLICATION desc
limit 5;
--5)
UPDATE T_ACTUALITE_ACT
SET ACT_TITRE = 'Fin des Précommandes chez aniplex', ACT_TEXTE = 'les précommandes sont desormées fermée pour les figurines de Akaza et Nezuko', ACT_DATEDEPUBLICATION = CURRENT_DATE()
where ACT_NUMERO = 1;
--6)
delete from T_ACTUALITE_ACT where ACT_NUMERO = ;
--7)
delete from T_ACTUALITE_ACT where ACT_DATEDEPUBLICATION <Now()-150;
--8)
INSERT INTO T_COMPTE_COM VALUES ('martin', md5('aller'));
INSERT INTO T_PROFIL_PFL VALUES('PERON','martin','M.PERON@netgallery.fr','D','O',CURRENT_DATE,'martin');

--9)
select COUNT(*) from T_COMPTE_COM
join T_PROFIL_PFL using (COM_PSEUDO)
where COM_PSEUDO = ''
and COM_MDP = md5('')
and PFL_VALIDITEPROFIL = 'A';

--10)
SELECT * from T_PROFIL_PFL
where COM_PSEUDO = 'TOF';

--11)
select PFL_ROLE from T_PROFIL_PFL
where UPPER(PFL_NOM) = 'PERON'
and UPPER(PFL_PRENOM) = 'BENJAMIN';

--12)
UPDATE T_PROFIL_PFL set PFL_NOM = 'flo', PFL_PRENOM = 'bert' where COM_PSEUDO = 'benjamin';

--13)
UPDATE T_COMPTE_COM set COM_MDP = md5('nouveau mot de passe') where COM_PSEUDO = 'benjamin';

--14)
select * from T_COMPTE_COM
join T_PROFIL_PFL using (COM_PSEUDO);

--15)
UPDATE T_PROFIL_PFL set PFL_VALIDITEPROFIL = 'A' where COM_PSEUDO = 'benjamin';
UPDATE T_PROFIL_PFL set PFL_VALIDITEPROFIL = 'D' where COM_PSEUDO = 'benjamin';

--16)
INSERT INTO `T_CONFIGURATION_CON`('CON_INTITULE', 'CON_DATEDEDEBUT', 'CON_DATEFIN', 'CON_PRESENTATION', 'CON_LIEU', 'CON_DATEVERNISSAGE', 'CON_TEXTEBIENVENUE', 'CON_INTITULE') VALUES
('');

--17)
select count(*) as nbligne from T_CONFIGURATION_CON;

--18)
select *, DATEDIFF(CON_DATEVERNISSAGE,CURRENT_DATE()) as nbjours from T_CONFIGURATION_CON;

--19)
update T_CONFIGURATION_CON set CON_INTITULE = '', CON_DATEVERNISSAGE = '', CON_LIEU = '';

--20)
delete * from T_CONFIGURATION_CON;

--21)
INSERT INTO `T_VISITEUR_VIS` (`VIS_NUMERO`, `VIS_MOTDEPASSE`, `VIS_DATEHEUREVISITE`, `VIS_NOM`, `VIS_PRENOM`, `VIS_EMAIL`, `COM_PSEUDO`) VALUES
(NULL, MD5('yes'), CURRENT_TIME(), 'bouffard', 'benj', 'bebou@netgallery.com', 'TOF');

--22)
select VIS_NUMERO, VIS_EMAIL, CMT_TEXTE from T_VISITEUR_VIS 
JOIN T_COMMENTAIRE_CMT USING (VIS_NUMERO) 
group by COM_PSEUDO;

--23)
DELETE FROM T_VISITEUR_VIS WHERE VIS_NUMERO = 5;

--24)

set @total_visiteur = (select count(*) from T_VISITEUR_VIS);

set @nb_visiteur_sans_commentaire = (select count(*) from T_VISITEUR_VIS left outer join T_COMMENTAIRE_CMT using (VIS_NUMERO) where CMT_TEXTE is NULL);

SELECT @nb_visiteur_sans_commentaire/@total_visiteur *100 as pourcentage;

--25)
set @autorisation_cmt = (select VIS_NUMERO from T_VISITEUR_VIS
                         where VIS_DATEHEUREVISITE <= NOW()
                         AND NOW()<= timestampadd(hour,3,VIS_DATEHEUREVISITE)
                         AND VIS_NUMERO = 2);

select @autorisation_cmt;
update t_visiteur_vis set VIS_NOM = '', VIS_PRENOM = '', VIS_EMAIL = ''
where VIS_NUMERO = 2;
INSERT INTO `T_COMMENTAIRE_CMT` (`CMT_NUMERO`, `CMT_DATEHEUREPUBLICATION`, `CMT_TEXTE`, `VIS_NUMERO`) VALUES
(NULL, CURRENT_TIME(),'',2);
--26)
update T_COMMENTAIRE_CMT set cmt_etat = 'C' WHERE CMT_NUMERO = '';
--27)
select CMT_TEXTE from T_COMMENTAIRE_CMT where cmt_etat = 'P';
--28)
SELECT CMT_TEXTE, VIS_EMAIL from T_COMMENTAIRE_CMT join T_VISITEUR_VIS using (VIS_NUMERO);
--29)
DELETE FROM T_COMMENTAIRE_CMT 
WHERE CMT_NUMERO in (select CMT_NUMERO from T_COMMENTAIRE_CMT 
                     join T_VISITEUR_VIS using (vis_numero) 
                     where VIS_NUMERO =  AND VIS_MOTDEPASSE = md5(''));
UPDATE T_COMMENTAIRE_CMT set com_text = '' 
                     where CMT_NUMERO in (select CMT_NUMERO from T_COMMENTAIRE_CMT 
                     join T_VISITEUR_VIS using (vis_numero) 
                     where VIS_NUMERO =  AND VIS_MOTDEPASSE = md5(''));
--30)
INSERT INTO `T_OEUVRE_OEU` (`OEU_CODE`, `OEU_INTITULE`, `OEU_DATECREA`, `OEU_DESCRIPTION`, `OEU_FICHIER_IMG`) VALUES 
('','','','','');
--31)
SELECT OEU_INTITULE, OEU_DESCRIPTION FROM T_OEUVRE_OEU;
--32)
SELECT * FROM T_OEUVRE_OEU WHERE OEU_CODE = '';
--33)
SELECT EXP_NOM, EXP_TEXTEBIO, EXP_URLWEB, OEU_INTITULE FROM T_EXPOSANT_EXP
JOIN TJ_PRESENTE_PRE USING (EXP_ID)
JOIN T_OEUVRE_OEU USING (OEU_CODE);
--34)
SELECT * FROM T_EXPOSANT_EXP WHERE EXP_ID = '';
--35)
SELECT DISTINCT OEU_INTITULE, OEU_FICHIER_IMG FROM T_OEUVRE_OEU
WHERE OEU_INTITULE = (SELECT OEU_INTITULE FROM T_OEUVRE_OEU
GROUP BY OEU_INTITULE
HAVING COUNT(OEU_INTITULE) > 1);
--36)
SELECT * FROM T_OEUVRE_OEU;
--37)
select exp_id from TJ_PRESENTE_PRE
where oeu_id in (select oeu_id from TJ_PRESENTE_PRE group by oeu_id HAVING count(exp_id > 1));
--38)
DELETE FROM TJ_PRESENTE_PRE where exp_id = ''
and OEU_CODE not in (select oeu_id from TJ_PRESENTE_PRE group by oeu_id HAVING count(exp_id > 1));
delete from t_exposant_exp where exp_id = '';
--39)
DELETE FROM T_OEUVRE_OEU WHERE OEU_CODE = ''
--40)
update T_OEUVRE_OEU set OEU_CODE = '', OEU_DATECREA = '', OEU_DESCRIPTION = '', OEU_FICHIER_IMG = '',OEU_INTITULE = '';
update T_EXPOSANT_EXP set EXP_ID = '', EXP_NOM = '', EXP_PRENOM = '', EXP_EMAIL = '', EXP_TEXTEBIO = '', EXP_TEXTEBIO = '', EXP_FIC_IMG = '';

--41)
insert into `TJ_PRESENTE_PRE` (`exp_id`,`oeu_code`) VALUES ('','');
delete from TJ_PRESENTE_PRE where EXP_ID = ;
--42)
delete from T_OEUVRE_OEU where oeu_code = (select oeu_code from TJ_PRESENTE_PRE where EXP_ID is NULL)