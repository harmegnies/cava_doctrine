-- *********************************************
-- * Standard SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 9.1.6              
-- * Generator date: Feb 25 2013              
-- * Generation date: Thu Oct 17 19:11:12 2013 
-- * LUN file: D:\wamp\www\cava\analyse\Merise\cava.lun 
-- * Schema: sql/1-1-1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database sql;


-- DBSpace Section
-- _______________


-- Tables Section
-- _____________ 

create table Client (
     idClient numeric(1) not null,
     nomClient varchar(1) not null,
     prenomClient varchar(1) not null,
     emailClient varchar(1) not null,
     sexeClient varchar(1) not null,
     dateNaissanceClient date not null,
     societeClient varchar(1) not null,
     nTVA varchar(1) not null,
     dateInscription date not null,
     idAdresse numeric(1) not null,
     constraint ID_Client_ID primary key (idClient));

create table Adresse (
     idAdresse numeric(1) not null,
     rue varchar(1) not null,
     nr varchar(1) not null,
     codePostal varchar(1) not null,
     localite varchar(1) not null,
     idPays numeric(1) not null,
     constraint ID_Adresse_ID primary key (idAdresse));

create table Commande (
     idCommande numeric(1) not null,
     reference varchar(1) not null,
     dateCommande date not null,
     modePaiement varchar(1) not null,
     idAdresse numeric(1),
     idClient numeric(1) not null,
     constraint ID_Commande_ID primary key (idCommande));

create table TypeProduit (
     idTypeProduit numeric(1) not null,
     typeProduit varchar(1) not null,
     constraint ID_TypeProduit_ID primary key (idTypeProduit));

create table Produit (
     idProduit numeric(1) not null,
     nomProduit varchar(1) not null,
     refProduit varchar(1) not null,
     prixHTVA float(1) not null,
     tauxTVA float(1) not null,
     millesime varchar(1) not null,
     contenant varchar(1) not null,
     idTypeProduit numeric(1) not null,
     constraint ID_Produit_ID primary key (idProduit));

create table Pays (
     idPays numeric(1) not null,
     nomPays varchar(1) not null,
     constraint ID_Pays_ID primary key (idPays));

create table contient (
     idCommande numeric(1) not null,
     idProduit numeric(1) not null,
     quantite numeric(1) not null,
     prixHTVA float(1) not null,
     tauxTVA numeric(1) not null,
     constraint ID_contient_ID primary key (idProduit, idCommande));


-- Constraints Section
-- ___________________ 

alter table Client add constraint ID_Client_CHK
     check(exists(select * from Commande
                  where Commande.idClient = idClient)); 

alter table Client add constraint FKhabite_FK
     foreign key (idAdresse)
     references Adresse;

alter table Adresse add constraint ID_Adresse_CHK
     check(exists(select * from Client
                  where Client.idAdresse = idAdresse)); 

alter table Adresse add constraint FKfait_partie_FK
     foreign key (idPays)
     references Pays;

alter table Commande add constraint ID_Commande_CHK
     check(exists(select * from contient
                  where contient.idCommande = idCommande)); 

alter table Commande add constraint FKest_livree_FK
     foreign key (idAdresse)
     references Adresse;

alter table Commande add constraint FKpasse_FK
     foreign key (idClient)
     references Client;

alter table Produit add constraint FKappartient_FK
     foreign key (idTypeProduit)
     references TypeProduit;

alter table contient add constraint FKcon_Pro
     foreign key (idProduit)
     references Produit;

alter table contient add constraint FKcon_Com_FK
     foreign key (idCommande)
     references Commande;


-- Index Section
-- _____________ 

create unique index ID_Client_IND
     on Client (idClient);

create index FKhabite_IND
     on Client (idAdresse);

create unique index ID_Adresse_IND
     on Adresse (idAdresse);

create index FKfait_partie_IND
     on Adresse (idPays);

create unique index ID_Commande_IND
     on Commande (idCommande);

create index FKest_livree_IND
     on Commande (idAdresse);

create index FKpasse_IND
     on Commande (idClient);

create unique index ID_TypeProduit_IND
     on TypeProduit (idTypeProduit);

create unique index ID_Produit_IND
     on Produit (idProduit);

create index FKappartient_IND
     on Produit (idTypeProduit);

create unique index ID_Pays_IND
     on Pays (idPays);

create unique index ID_contient_IND
     on contient (idProduit, idCommande);

create index FKcon_Com_IND
     on contient (idCommande);

