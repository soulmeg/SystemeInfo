Create database gestAntit;
use gestantit;

Create table entreprises(
    id int unsigned auto_increment primary key,
    nom varchar(20),
    adresse varchar(100),
    mdp varchar(100),
    tel varchar(14),
    telecopie varchar(14)
);

insert into entreprises values (null, 'MCM', 'Ivandry', '123', '0388906408', '093847');

Create table comptables(
    id int unsigned auto_increment primary key,
    id_entreprises int references entreprises (id),
    date_deb_exo date,
    date_fin_exo date,
    devise_tenue_compte varchar(50),
    devise_equivalence varchar(50)
);

insert into comptables values (null, 1, '2023-01-01', '2023-12-31', 'Ariary', 'Euro');

Create table code_journaux(
    id int unsigned auto_increment primary key,
    code varchar(5),
    type varchar(30)
);

Create table plan_compte_tiers(
    id int unsigned auto_increment primary key,
    code varchar(3),
    nom varchar(30)
);

Create table plan_comptable(
    numero int primary key,
    compte varchar(60)
);

Create table journal(
    id int unsigned auto_increment primary key,
    id_entreprises int references entreprises (id),
    daty date,
    ref_piece varchar(40),
    compte int references plan_comptable (numero),
    motifs varchar(40),
    quantite double,
    compte_tiers int references plan_comptable (numero),
    tiers varchar(70),
    libelle varchar(40),
    prix double,
    devise varchar(30),
    dc varchar(35)
);

insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-03-02','AN2023',10100,'Capital',NULL,NULL,NULL,'AN 2023',24890000,'Ariary','Credit');

insert into code_journaux (code,type) values ('AC','ACHAT');
insert into code_journaux (code,type) values ('AN','A NOUVEAU');
insert into code_journaux (code,type) values ('BN','BANQUE BNI');
insert into code_journaux (code,type) values ('BO','BANQUE BOA');
insert into code_journaux (code,type) values ('CA','CAISSE');
insert into code_journaux (code,type) values ('OD','OPERATION DIVERSES');
insert into code_journaux (code,type) values ('VE','VENTE EXPORT');
insert into code_journaux (code,type) values ('VL','VENTE LOCALE');

insert into plan_comptable values (10100,'CAPITAL');
insert into plan_comptable values (10610,'RESERVE LEGALE');
insert into plan_comptable values (10620,'RESERVES STATUTAIRES');
insert into plan_comptable values (11000,'REPORT A NOUVEAU');
insert into plan_comptable values (11010,'REPORT A NOUVEAU SOLDE CREDITEUR');
insert into plan_comptable values (11200,'AUTRES PRODUITS ET CHARGES');
insert into plan_comptable values (11900,'REPORT A NOUVEAU SOLDE DEBITEUR');
insert into plan_comptable values (12800,'RESULTAT EN INSTANCE');
insert into plan_comptable values (13100,'SUBVENTION EQUIPEMENT');
insert into plan_comptable values (13300,'IMPOTS DIFFERES ACTIFS');
insert into plan_comptable values (16110,'EMPRUNT ALT');
insert into plan_comptable values (16510,'EMPRUNT A MOYEN TERME');
insert into plan_comptable values (20124,'FRAIS DE REHABILITATION');
insert into plan_comptable values (20900,'AUTRES IMMOB INCORPORELLES');
insert into plan_comptable values (21100,'TERRAINS');
insert into plan_comptable values (21200,'CONSTRUCTION');
insert into plan_comptable values (21300,'MATERIEL ET OUTILLAGE');
insert into plan_comptable values (21510,'MATERIEL AUTOMOBILE');
insert into plan_comptable values (21520,'MATERIEL MOTO');
insert into plan_comptable values (21600,'AGENCEMENT.AM.INST');
insert into plan_comptable values (21810,'MATERIELS ET MOBILIERS DE BUREAU');
insert into plan_comptable values (21819,'MATERIELS INFORMATIQUES ET AUTRES');
insert into plan_comptable values (21820,'MAT.MOB DE LOGEMENT');
insert into plan_comptable values (21880,'AUTRES IMMOBILISATIONS CORP');
insert into plan_comptable values (23000,'IMMOBILISATION EN COURS');
insert into plan_comptable values (28000,'AMORT IMMOB INCORP');
insert into plan_comptable values (28120,'AMORTISSEMENT DES CONSTRUCTIONS');
insert into plan_comptable values (28130,'AMORT MACH-MATER-OUTIL');
insert into plan_comptable values (28150,'AMORT MAT DE TRANSPORT');
insert into plan_comptable values (28160,'AMORT A.A.I');
insert into plan_comptable values (28181,'AMORT MATERIEL&MOB');
insert into plan_comptable values (28182,'AMORTISSEMNTS MATERIELS INFORMATIQUES');
insert into plan_comptable values (28183,'AMORT MATER&MOB');
insert into plan_comptable values (32110,'STOCK MATIERES PREMIERES');
insert into plan_comptable values (32120,'PETITES FOURNITURES');

insert into plan_compte_tiers (code,nom) values ('F0','JIRAMA');
insert into plan_compte_tiers (code,nom) values ('F0','JOHN');
insert into plan_compte_tiers (code,nom) values ('C1','LAMBERT');
insert into plan_compte_tiers (code,nom) values ('F0','LOVASOA');
insert into plan_compte_tiers (code,nom) values ('F0','MENDRIKA');
insert into plan_compte_tiers (code,nom) values ('C1','NORO');
insert into plan_compte_tiers (code,nom) values ('F0','ORIMBATO');
insert into plan_compte_tiers (code,nom) values ('F0','PAPANGO');
insert into plan_compte_tiers (code,nom) values ('C1','RABE');
insert into plan_compte_tiers (code,nom) values ('C1','RANDRIA');
insert into plan_compte_tiers (code,nom) values ('F0','RAVINALA');
insert into plan_compte_tiers (code,nom) values ('C1','RIAKA');
insert into plan_compte_tiers (code,nom) values ('F0','RONDRO');
insert into plan_compte_tiers (code,nom) values ('C1','SOLO');
insert into plan_compte_tiers (code,nom) values ('F0','TELMA');

insert into plan_comptable values  (41120,'CLIENTS ETRANGERS');
insert into plan_comptable values  (41400,'CLIENTS DOUTEUX');
insert into plan_comptable values  (41800,'CLIENTS FACTURE A RETABLIR');
insert into plan_comptable values  (42100,'PERSONNEL: SALAIRES A PAYER');
insert into plan_comptable values  (42510, 'PERSONNEL: AVANCES QUINZAINES');
insert into plan_comptable values  (42520, 'PERSONNEL: AVANCES SPECIALES');
insert into plan_comptable values  (42860,'PERS:CHARGES  A PAYER');
insert into plan_comptable values  (43100,'CNAPS');
insert into plan_comptable values  (43120,'OSTIE');
insert into plan_comptable values  (44200,'ETAT IBS');
insert into plan_comptable values  (44210,'ACOMPTE IBS');
insert into plan_comptable values  (44321,'TVA … IMPUTER:DEC ULTERIEURE');
insert into plan_comptable values  (44500,'ETAT:IRSA VERSER');
insert into plan_comptable values  (44560,'ETAT: TVA DEDUCTIBLE');
insert into plan_comptable values  (44570,'ETAT: TVA COLLECTEE');
insert into plan_comptable values  (44571,'TVA A VERSER');
insert into plan_comptable values  (45100,'COMPTE  COURANT ASSOC');
insert into plan_comptable values  (46700,'DEB/CRED DIVERS');
insert into plan_comptable values  (46800,'CHARGES A PAYER DEB/CRED DIVERS');
insert into plan_comptable values  (48610,'CHARGE CONSTATES DAVANCE');
insert into plan_comptable values  (49100,'PERTE/CLIENTS');
insert into plan_comptable values  (51200,'BOA ANKORONDRANO');
insert into plan_comptable values  (51201,'BOA DOLLARS');
insert into plan_comptable values  (51202,'BNI MADAGASCAR');
insert into plan_comptable values  (51203,'BNI DOLLARS');
insert into plan_comptable values  (53100,'CAISSE');
insert into plan_comptable values  (58110,'VIREMENTINTERNE:BANQ/CAISSE');
insert into plan_comptable values  (58130,'VIREMENT INTERNE:BANQ/BANQ');
insert into plan_comptable values  (58140,'VIREMENT INTERNE CAISSE/CAISSE');
insert into plan_comptable values  (60100,'ACHAT MATIERES PREMIERESS');
insert into plan_comptable values  (60200,'FOURNIT DE MAGASIN');
insert into plan_comptable values  (60210,'FOURNIT BUR');
insert into plan_comptable values  (60220,'FOURNIT DE LOGT');
insert into plan_comptable values  (60230,'EMBALLAGES(PLAST-CARTON....');
insert into plan_comptable values  (60240,'PIEC RECH VOITURES ADMINISTRATIVES');
insert into plan_comptable values  (60241,'PIEC RECH CAMIONS');
insert into plan_comptable values  (60242,'PIEC RECH MOTO');
insert into plan_comptable values  (60250,'AUTRES ACHATS');
insert into plan_comptable values  (60300,'VARIATION  STOCK MAT PREM');
insert into plan_comptable values  (60610,'EAU ET ELECTRICITE');
insert into plan_comptable values  (60620,'GAZ,COMBUST,CARBURANT,LUBRIF');
insert into plan_comptable values  (61300,'LOC IMMOBILIERES');
insert into plan_comptable values  (61380,'AUTRES LOCATIONS');
insert into plan_comptable values  (61550,'ENTRET & REP VEHICULE');
insert into plan_comptable values  (61560,'MAINTENANCE');
insert into plan_comptable values  (61610,'ASSURANCE GLOBALE DOMMAGES');
insert into plan_comptable values  (61611,'ASSURANCE FLOTTE AUTOMOBILE');
insert into plan_comptable values  (61800,'PHOTOCOPIE ET ASSIMILES');
insert into plan_comptable values  (61810,'ENVOI COLIS(LETTRE&DOC...');
insert into plan_comptable values  (62100,'PERSONNEL EXTER');
insert into plan_comptable values  (62210,'HONORAIRE');
insert into plan_comptable values  (62220,'REMUNERATION DES TRANSITAIRES');
insert into plan_comptable values  (62230,'CATALOGUES ET IMPRIMES');
insert into plan_comptable values  (62240,'PUBLICATION');
insert into plan_comptable values  (62250,'SPONSORING-MECENAT...');
insert into plan_comptable values  (62260,'TS DOUANE ET ASSIMILES');
insert into plan_comptable values  (62400,'FRAIS DE TRANSPORT');
insert into plan_comptable values  (62510,'VOYAGES ET DEPLACEMENT');
insert into plan_comptable values  (62520,'MISSION(DEPL+HEBERGT+RESTO)');
insert into plan_comptable values  (62530,'RECEPTION');
insert into plan_comptable values  (62610,'SERVICES POSTAUX');
insert into plan_comptable values  (62620,'TEL&FAX');
insert into plan_comptable values  (62630,'INTERNET TANA');
insert into plan_comptable values  (62740,'COMMISSIONS BANCAIRE INTERNATIONALE');
insert into plan_comptable values  (62760,'COMMISSIONS BNI');
insert into plan_comptable values  (62770,'COMMISSIONS BOA');
insert into plan_comptable values  (62880,'AUTRES  CHARGES EXTERNES');
insert into plan_comptable values  (63680,'AUTRES IMPOTS/TAXES/DROITS DIV');
insert into plan_comptable values  (64100,'REMUNERATION PERSONNEL');
insert into plan_comptable values  (64120,'DROIT DE CONGES');
insert into plan_comptable values  (64511,'CNAPS:COTISATION  PATRONALE');
insert into plan_comptable values  (64512,'OSTIE : COTISATION PATRONALE');
insert into plan_comptable values  (64750,'MED ET ASSIM PERS');
insert into plan_comptable values  (65800,'AUTRES CHARGES DIVERSES');
insert into plan_comptable values  (65810,'ECART/PAIEMENT');
insert into plan_comptable values  (65811,'PERTE/TVA NON RECUPERABLE');
insert into plan_comptable values  (66200,'INTERETS  BANCAIRES BNI');
insert into plan_comptable values  (66300,'INTERETS  BANCAIRES BOA');
insert into plan_comptable values  (66600,'DIFFF  DE  CHANGE  PERTE');
insert into plan_comptable values  (66680,'AGIOS/TRAITES');
insert into plan_comptable values  (68110,'D.A.P  IMMO INCORPORELLES');
insert into plan_comptable values  (68120,'D.A.P  IMMO  CORPORELLE');
insert into plan_comptable values  (70110,'VENTE LOCALE');
insert into plan_comptable values  (70120,'VENTES  A  L EXPORTATION');
insert into plan_comptable values  (70800,'AUTRES PROD  DES ACT ANNEX&ACS');
insert into plan_comptable values  (71300,'VARIATION DE STOCK  P.F');
insert into plan_comptable values  (75800,'AUTRES PRODUITS D EXPLOITATION');
insert into plan_comptable values  (75810,'ECART/ENCAISSEMENT');
insert into plan_comptable values  (76200,'INTERET CREDITEUR BANQUES BNI');
insert into plan_comptable values  (76300,'INTERET CREDITEUR BANQUES BOA');
insert into plan_comptable values  (76600,'DIFFERENCE DE  CHANGE:PROFIT');

insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',10100,'CAPITAL',	NULL,NULL,NULL,'A NOUVEAU 2023' ,	 1400000.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',10610,'RESERVE LEGALE',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 27920.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',11000,'REPORT A NOUVEAU',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 177080.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',12800,'RESULTAT EN INSTANCE',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 322480.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',16110,'EMPRUNT A LT',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 1819280.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',16510,'ENMPRUNT A MOYEN TERME',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 180720.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',20124,'FRAIS DE REHABILITATION',	NULL,NULL,NULL,'A NOUVEAU 2023',	 71600.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',20800,	'AUTRES IMMOB INCORPORELLES',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 86500.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21100,	'TERRAINS',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 450000.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21200,	'CONSTRUCTION',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 846200.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21300,	'MATERIEL ET OUTILLAGE',	NULL,NULL,NULL,'A NOUVEAU 2023',	 1265500.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21510,	'MATERIEL AUTOMOBILE',	NULL,NULL,NULL,'A NOUVEAU 2023',	 1346400.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21810,	'MATERIELS ET MOBILIERS DE BUREAU',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 783800.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',21880,	'AUTRES IMMOBILISATIONS CORP',	NULL,NULL,NULL,'A NOUVEAU 2023',	 121800.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',23000,	'IMMOBILISATION EN COURS',	NULL,NULL,NULL,'A NOUVEAU 2023',	 120000.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',28000,	'AMORT IMMOB INCORP',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 94500.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',28120,	'AMORTISSEMENT DES CONSTRUCTIONS',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 186600.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',28130,	'AMORT MACH-MATER-OUTIL',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 597250.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',28150,	'AMORT MAT DE TRANSPORT',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 681480.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',28181,	'AMORT MATERIEL&MOB',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 459660.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',32110,	'STOCK MATIERES PREMIERES',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 276130.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',35500,	'STOCK PRODUITS FINIS',	NULL,NULL,NULL,'A NOUVEAU 2023',	 1075600.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',37000,	'STOCK MARCHANDISES',	NULL,NULL,NULL,'A NOUVEAU 2023',	 1173180.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',39700,	'PROVISIONS/DEPRECIATIONS STOCKS',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	346580.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40110,	'FOURNISSEURS DEXPLOITATIONS LOCAUX',	NULL,NULL,'RAVINALA','A NOUVEAU 2023'	,	 865400.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40110,	'FOURNISSEURS DEXPLOITATIONS LOCAUX',	NULL,NULL,'LOVASOA','A NOUVEAU 2023'	,	 1236300.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40110,	'FOURNISSEURS DEXPLOITATIONS LOCAUX',	NULL,NULL,'PAPANGO','A NOUVEAU 2023'	,	 748000.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40110,	'FOURNISSEURS DEXPLOITATIONS LOCAUX',	NULL,NULL,'ORIMBATO','A NOUVEAU 2023'	,	 750850.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40810,	'FRNS: FACTURE A RECEVOIR',	NULL,NULL,NULL,'A NOUVEAU 2023'	,	 288650.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',40980,	'FRNS: RABAIS A OBTENIR',	NULL,NULL,NULL,'A NOUVEAU 2023',	 26450.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41110,	'CLIENTS LOCAUX',	NULL,NULL,'SOLO','A NOUVEAU 2023'	, 418000.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41110,	'CLIENTS LOCAUX',	NULL,NULL,'RABE','A NOUVEAU 2023'	, 1012500.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41110,	'CLIENTS LOCAUX',	NULL,NULL,'NORO','A NOUVEAU 2023'	, 852900.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41120,	'CLIENTS ETRANGERS',	NULL,NULL,NULL,'A NOUVEAU 2023',	 720000.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41400,	'CLIENTS DOUTEUX',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 160000.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',41800,	'CLIENTS FACTURE A RETABLIR',	NULL,NULL,NULL,'A NOUVEAU 2023'	, 57500.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',42100,	'PERSONNEL: SALAIRES A PAYER',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 455560.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',43100,	'CNAPS',NULL,NULL,NULL, 	'A NOUVEAU 2023'	,	 42380.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',43120,	'OSTIE',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 28260.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',44200,	'ETAT IBS',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 270000.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',44560,	'ETAT: TVA DEDUCTIBLE',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 203370.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',44571,	'TVA A VERSER',NULL,NULL,NULL,	'A NOUVEAU 2023',	 26700.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',46700,	'DEB/CRED DIVERS',NULL,NULL,NULL,	'A NOUVEAU 2023',	 172500.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',49100,	'PERTE/CLIENTS',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 80000.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',51200,	'BOA ANKORONDRANO',NULL,NULL,NULL,	'A NOUVEAU 2023',	 300300.00,'Ariary','Debit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',51202,	'BNI MADAGASCAR',NULL,NULL,NULL,	'A NOUVEAU 2023'	,	 119560.00,'Ariary','Credit');
insert into journal (id_entreprises,daty,ref_piece,compte,motifs,quantite,compte_tiers,tiers,libelle,prix,devise,dc) values (1,'2023-01-01','AN2023',53100,	'CAISSE', NULL,NULL,NULL,	'A NOUVEAU 2023'	, 18320.00,'Ariary','Debit');

create view v_debit as
select sum(prix) as total
from journal
where dc = 'Debit';

create view v_credit as
select sum(prix) as total
from journal
where dc = 'Credit';

create table centre(
    idCentre int unsigned auto_increment primary key,
    nomCentre varchar(50)
);

create table entreprise_centre(
    idEC int unsigned auto_increment primary key,
    id_entreprises int,
    idCentre int,
    foreign key(id_entreprises) references entreprises(id),
    foreign key(idCentre) references centre(idCentre)
);

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
    idAchat int unsigned auto_increment primary key,
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
    idPI int unsigned auto_increment primary key,
    idAchat int,
    idProduit int,
    pourcentage_produit decimal,
    foreign key(idAchat) references AchatAnalytique(idAchat),
    foreign key(idProduit) references Produit(idProduit)
);
insert into produit_incorporable values(null,1,1,100);

create table pourcentage_centre_par_produit(
    idPourcentage int unsigned auto_increment primary key,
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

insert into type_charge values(null,'variable');
insert into type_charge values(null,'fixe');

insert into pourcentage_centre_par_produit values(null,1,1,40);
insert into pourcentage_centre_par_produit values(null,1,1,25);
insert into pourcentage_centre_par_produit values(null,1,1,35);

insert into different_charge values(null,'incorporable');
insert into different_charge values(null,'non incorporable');
insert into different_charge values(null,'suppletives');

insert into AchatAnalytique values(null,'Achat semence',10,'1200000','KG',1,1);
insert into AchatAnalytique values(null,'Eau et electricite',1000,'500000','KW',1,1);


insert into entreprise_centre values(NULL,1,1);
insert into entreprise_centre values(NULL,1,2);
insert into entreprise_centre values(NULL,1,3);

create or replace view v_centreEntreprise as
select idEC,id_entreprises,Centre.idCentre,Centre.nomCentre
from entreprise_centre 
join centre
on centre.idCentre=entreprise_centre.idCentre;



-- create or replace view v_analytique as
select rubrique,prixUnitaire,quantite,(prixUnitaire*quantite) as TOTAL,unite,type_charge.typeCharge
from produit_incorporable as PI
join AchatAnalytique as AA
on AA.idAchat=PI.idAchat
join pourcentage_centre_par_produit as PCP
on PI.idPI= PCP.idPI
join centre
on centre.idCentre=PCP.idCentre
join Produit 
on Produit.idProduit= PI.idProduit
join type_charge 
on type_charge.idTypeCharge=AA.idTypeCharge;
