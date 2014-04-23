-- *********************************************
-- * Academic SQL generation                   
-- *--------------------------------------------
-- * DB-MAIN version: 9.1.6              
-- * Generator date: Feb 25 2013              
-- * Generation date: Thu Oct 17 19:11:40 2013 
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
     primary key (idClient) ,
     check(exists(select * from Commande
                  where Commande.idClient = idClient)),
     foreign key (idAdresse) references Adresse);

create table Adresse (
     idAdresse numeric(1) not null,
     rue varchar(1) not null,
     nr varchar(1) not null,
     codePostal varchar(1) not null,
     localite varchar(1) not null,
     idPays numeric(1) not null,
     primary key (idAdresse) ,
     check(exists(select * from Client
                  where Client.idAdresse = idAdresse)),
     foreign key (idPays) references Pays);

create table Commande (
     idCommande numeric(1) not null,
     reference varchar(1) not null,
     dateCommande date not null,
     modePaiement varchar(1) not null,
     idAdresse numeric(1),
     idClient numeric(1) not null,
     primary key (idCommande) ,
     check(exists(select * from contient
                  where contient.idCommande = idCommande)),
     foreign key (idAdresse) references Adresse,
     foreign key (idClient) references Client);

create table TypeProduit (
     idTypeProduit numeric(1) not null,
     typeProduit varchar(1) not null,
     primary key (idTypeProduit));

create table Produit (
     idProduit numeric(1) not null,
     nomProduit varchar(1) not null,
     refProduit varchar(1) not null,
     prixHTVA float(1) not null,
     tauxTVA float(1) not null,
     millesime varchar(1) not null,
     contenant varchar(1) not null,
     idTypeProduit numeric(1) not null,
     primary key (idProduit),
     foreign key (idTypeProduit) references TypeProduit);

create table Pays (
     idPays numeric(1) not null,
     nomPays varchar(1) not null,
     primary key (idPays));

create table contient (
     idCommande numeric(1) not null,
     idProduit numeric(1) not null,
     quantite numeric(1) not null,
     prixHTVA float(1) not null,
     tauxTVA numeric(1) not null,
     primary key (idProduit, idCommande),
     foreign key (idProduit) references Produit,
     foreign key (idCommande) references Commande);


-- Index Section
-- _____________ 

create unique index ID_Client
     on Client (idClient);

create index FKhabite
     on Client (idAdresse);

create unique index ID_Adresse
     on Adresse (idAdresse);

create index FKfait_partie
     on Adresse (idPays);

create unique index ID_Commande
     on Commande (idCommande);

create index FKest_livree
     on Commande (idAdresse);

create index FKpasse
     on Commande (idClient);

create unique index ID_TypeProduit
     on TypeProduit (idTypeProduit);

create unique index ID_Produit
     on Produit (idProduit);

create index FKappartient
     on Produit (idTypeProduit);

create unique index ID_Pays
     on Pays (idPays);

create unique index ID_contient
     on contient (idProduit, idCommande);

create index FKcon_Com
     on contient (idCommande);

