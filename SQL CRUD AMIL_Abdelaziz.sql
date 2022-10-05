--1)
UPDATE T_PROFIL_PFL SET PFL_VALIDITEPROFIL = 'A' where COM_PSEUDO = 'benjamin';
--2)
DELETE FROM T_PROFIL_PFL WHERE COM_PSEUDO = 'benjamin';
DELETE FROM T_COMPTE_COM where COM_PSEUDO = 'benjamin';
--3)
--a)
select pfl_nom, pfl_prenom, PFL_ROLE from T_PROFIL_PFL
order by PFL_NOM asc;
--b)
select pfl_nom, pfl_prenom, PFL_ROLE from T_PROFIL_PFL
order by PFL_ROLE;

--4)
select PFL_NOM, PFL_PRENOM,PFL_MAIL FROM T_PROFIL_PFL
where PFL_ROLE = 'O'
order by PFL_PRENOM desc;

--5)
select pfl_nom, pfl_prenom from t_profil_pfl
where YEAR(PFL_DATECREATION) = 2018;

--6)
INSERT INTO `T_ACTUALITE_ACT` (`ACT_NUMERO`, `ACT_TITRE`, `ACT_TEXTE`, `ACT_DATEDEPUBLICATION`, `COM_PSEUDO`) VALUES
('1', 'précommande ouverte chez aniplex', 'les Précommandes pour les figurines de Akaza et Nezuko sont ouvertes aux publics', CURRENT_DATE(), 'MILIAN'),

--7)
select act_numero, act_text from t_actualite_act
order by ACT_DATEDEPUBLICATION desc
limit 1;

--8)
select * from T_ACTUALITE_ACT
where ACT_DATEDEPUBLICATION between '2022-01-01' and '2022-12-31';

--9)
select PFL_ROLE, count(PFL_NOM) from T_PROFIL_PFL
group by PFL_ROLE;

--10)
select PFL_ROLE from T_PROFIL_PFL
group by PFL_ROLE;

--11)
select (sum(VIS_NUMERO)/(select sum(VIS_NUMERO) from T_VISITEUR_VIS))*100 as pourcentage from T_VISITEUR_VIS
where COM_PSEUDO = 'TOF';

--12)

select COUNT(*) from T_COMPTE_COM
join T_PROFIL_PFL using (T_COMPTE_COM)
where COM_PSEUDO = ''
and COM_MDP = md5('')
and PFL_VALIDITEPROFIL = 'A';

--13)
DELETE from T_PROFIL_PFL where COM_PSEUDO = 'benjamin';
DELETE from T_COMPTE_COM where COM_PSEUDO = 'benjamin';

Que faut-il faire si cet utilisateur a ajouté des actualités / exposants ?

DELETE from T_PROFIL_PFL where COM_PSEUDO = 'benjamin';
DELETE from T_COMPTE_COM where COM_PSEUDO = 'benjamin';
DELETE from T_ACTUALITE_ACT where COM_PSEUDO = 'benjamin';
DELETE from T_VISITEUR_VIS where COM_PSEUDO = 'benjamin';

--14)
select * from T_COMPTE_COM left outer join T_PROFIL_PFL using (cpt_pseudo);
--14)
select * from T_PROFIL_PFL right outer join T_COMPTE_COM using (cpt_pseudo);


--15)
delete from T_COMPTE_COM
left outer join T_PROFIL_PFL using (cpt_pseudo)
where pfl_nom is null

--16)
select * from T_COMPTE_COM
left outer join T_PROFIL_PFL using (com_pseudo)
left outer join T_EXPOSANT_EXP using (com_pseudo)
left outer join TJ_PRESENTE_PRE using (exp_id)
left outer join T_OEUVRE_OEU using (oeu_code);
