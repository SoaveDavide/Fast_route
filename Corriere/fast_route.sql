create database fast_route;
use fast_route;

create table fast_route.Personale(
                                     nome varchar(50),
                                     email varchar(50) primary key,
                                     password varchar(50),
                                     sede varchar(50),
                                     foreign key(sede) references sedi(indirizzo)
);
create table fast_route.sedi(
                                indirizzo varchar(50) primary key,
                                citta varchar(50)
);
create table fast_route.plichi(
                                  codice_numerico int primary key,
                                  email varchar(50),
                                  stato varchar(50),
                                  numero_telefono varchar(100),
                                  cf_destinatario varchar(50),
                                  data_consegna date,
                                  data_ritiro date,
                                  data_spedizione date,
                                  foreign key(numero_telefono) references clienti(numero_telefono),
                                  foreign key(cf_destinatario) references destinatari(cf),
                                  foreign key(stato) references stati(nome),
                                  foreign key(email) references Personale(email)
);

create table fast_route.risiedere(
                                     indirizzo varchar(50),
                                     codice_numerico int,
                                     foreign key(indirizzo) references sedi(indirizzo),
                                     foreign key(codice_numerico) references plichi(codice_numerico)
);

create table fast_route.stati(
    nome varchar(50) primary key
);

create table fast_route.clienti(
                                   numero_telefono varchar(100) primary key,
                                   nome varchar(50),
                                   cognome varchar(50),
                                   email varchar(50),
                                   punteggio int
);

create table fast_route.destinatari(
                                       cf varchar(50) primary key,
                                       nome varchar(50),
                                       cognome varchar(50)
);


create table fast_route.consegnare(
                                      numero_telefono varchar(100),
                                      codice_numerico int,
                                      data_consegna date,
                                      foreign key(numero_telefono) references clienti(numero_telefono),
                                      foreign key(codice_numerico) references plichi(codice_numerico)
);

create table fast_route.spedire(
                                   numero_plico int,
                                   email varchar(50),
                                   data_spedizione date,
                                   foreign key(email) references Personale(email),
                                   foreign key(numero_plico) references plichi(codice_numerico)
);

create table fast_route.ritirare(
                                    numero_plico int,
                                    data_ritiro date,
                                    cf varchar(50),
                                    foreign key(numero_plico) references plichi(codice_numerico),
                                    foreign key(cf) references destinatari(cf)
);

insert into fast_route.stati(nome) values ('consegnato'), ('spedito'), ('ritirato');

insert into fast_route.sedi(indirizzo, citta ) values('via montegrappa 31', 'Rovigo');

insert into fast_route.personale(nome, email, password, sede) values('Davide', 'dvdsoave@gmail.com', 'Davide2006?', 'via montegrappa 31');

insert into fast_route.destinatari (cf, nome, cognome) values ('ciao', 'Luca', 'Buttini');