create table centre(
    idCentre int unsigned auto_increment primary key,
    nomCentre varchar(50)
);

create entreprise_centre(
    idEC int unsigned auto_increment primary key,
    id_entreprises int,
    idCentre int,
    foreign key(id_entreprises) references entreprises(id)
)

create table Produit(
    idProduit int unsigned auto_increment primary key,
    nomProduit varchar(50)
);

create table type_charge(
    idTypeCharge int unsigned auto_increment primary key,
    typeCharge varchar(50)
);

create table different_charge(
    idDC int unsigned auto_increment primary key,
    nomDC varchar(50)
);

create table AchatAnalytique(
    idAchat int unsigned primary key,
    rubrique varchar(100),
    quantite decimal,
    prixUnitaire decimal,
    unite varchar(10),
    idDC int,
    idTypeCharge int,
    foreign key(idDC) references different_charge(idDC),
    foreign key(idTypeCharge) references type_charge(idTypeCharge)
);

create table produit_incorporable(
    idPI int unsigned primary key,
    idAchat int,
    idProduit int,
    pourcentage_produit decimal,
    foreign key(idAchat) references AchatAnalytique(idAchat),
    foreign key(idProduit) references Produit(idProduit)
);
insert into produit_incorporable values(null,1,1,100);

create table pourcentage_centre_par_produit(
    idPourcentage int unsigned primary key,
    idPI int,
    idCentre int,
    pourcentage decimal,
    foreign key(idCentre) references centre(idCentre),
    foreign key(idPI) references produit_incorporable(idPI)
);

insert into centre values(null,'USINE');
insert into centre values(null,'ADM/DIST');
insert into centre values(null,'PLANTATION');

insert into Produit values(null,'mais');

insert into type_charge values(null,'charge variable');
insert into type_charge values(null,'charge fixe');

insert into pourcentage_centre_par_produit values(null,1,1,40);
insert into pourcentage_centre_par_produit values(null,1,1,25);
insert into pourcentage_centre_par_produit values(null,1,1,35);

insert into different_charge values(null,'charges incorporable');
insert into different_charge values(null,'charges non incorporable');
insert into different_charge values(null,'charges suppletives');

insert into AchatAnalytique values(null,'Achat semence',10,'1200000','KG',1,1);
insert into AchatAnalytique values(null,'Eau et electricite',1000,'500000','KW',1,1);



