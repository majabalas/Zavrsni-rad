drop database if exists mbzavrsnirad;
create database mbzavrsnirad character set utf8 collate utf8_general_ci;
# c:\xampp\mysql\bin\mysql -umajab -pmajab --default_character_set=utf8 < c:\Users\majab\Desktop\EdunovaPP18\Edunova\ZavrsniRad\mbzavrsnirad.sql
use mbzavrsnirad;

create table dvorana(
sifra int not null primary key auto_increment,
naziv varchar(100) not null,
redSjedaloSlobodno varchar(50) not null,
redSjedaloZauzeto varchar(50) not null,
rezervacija int not null,
termin int not null
);

create table rezervacija(
sifra int not null primary key auto_increment,
komentar varchar(500),
korisnik int not null,
dogadaj int not null
);

create table korisnik(
sifra int not null primary key auto_increment,
ime varchar(50) not null,
prezime varchar(50) not null,
kontakt varchar(50) not null,
email varchar(50) not null,
gdprSuglasnost boolean,
registracija int not null
);

create table registracija(
sifra int not null primary key auto_increment,
korisnickoIme varchar(50) not null,
lozinka varchar(50) not null,
registracijaGoogle varchar(100),
registracijaFacebook varchar(100)
);

create table termin(
sifra int not null primary key auto_increment,
datum varchar(50) not null,
sat varchar(50) not null,
dogadaj int not null
);

create table dogadaj(
sifra int not null primary key auto_increment,
naziv varchar(100) not null
);

alter table dvorana add foreign key (rezervacija) references rezervacija(sifra);
alter table dvorana add foreign key (termin) references termin(sifra);

alter table rezervacija add foreign key (korisnik) references korisnik(sifra);
alter table rezervacija add foreign key (dogadaj) references dogadaj(sifra);

alter table korisnik add foreign key (registracija) references registracija(sifra);

alter table termin add foreign key (dogadaj) references dogadaj(sifra);

