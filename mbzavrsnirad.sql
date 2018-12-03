drop database if exists mbzavrsnirad;
create database mbzavrsnirad character set utf8 collate utf8_general_ci;
# c:\xampp\mysql\bin\mysql -umajab -pmajab --default_character_set=utf8 < c:\Users\majab\Desktop\EdunovaPP18\Edunova\ZavrsniRad\mbzavrsnirad.sql
use mbzavrsnirad;

create table rezervacija(
sifra int not null primary key auto_increment,
komentar varchar(500),
korisnik int,
termin int not null
);

create table termin(
sifra int not null primary key auto_increment,
datum varchar(50) not null,
sat varchar(50) not null,
dogadaj int not null
);

create table dogadaj(
sifra int not null primary key auto_increment,
naziv varchar(150) not null
);

create table korisnik(
sifra int not null primary key auto_increment,
korisnickoIme varchar(50) not null,
lozinka varchar(50) not null
);

create table mjesto(
sifra int not null primary key auto_increment,
brojReda varchar(50) not null,
brojSjedala varchar(50) not null
);

create table rezervacijaMjesto(
rezervacija int not null,
mjesto int not null
);

create table dvorana(
sifra int not null primary key auto_increment,
naziv varchar(150) not null,
mjesto int not null
);


alter table termin add foreign key (dogadaj) references dogadaj(sifra);


alter table rezervacija add foreign key (korisnik) references korisnik(sifra);
alter table rezervacija add foreign key (termin) references termin(sifra);

alter table rezervacijaMjesto add foreign key (rezervacija) references rezervacija(sifra);
alter table rezervacijaMjesto add foreign key (mjesto) references mjesto(sifra);

alter table dvorana add foreign key (mjesto) references mjesto(sifra);