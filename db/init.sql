create table studente (
    matricola int primary key,
    nome varchar(100),
    cognome varchar(100),
    pass varchar(100)
);

create table indirizzo (
    studente int primary key,
    citta char(100),
    via char(100),

    FOREIGN KEY (studente) REFERENCES studente(matricola)
);

create table corso (
    nome varchar(100) primary key,
    cfu int
);

create table esame (
    studente int,
    corso varchar(100),
    valutazione int,

    FOREIGN KEY (studente) REFERENCES studente(matricola),
    FOREIGN KEY (corso) REFERENCES corso(nome),

    primary key (studente, corso),
    check (valutazione >= 18 and valutazione <= 31)
);



insert into studente(matricola, nome, cognome, pass) values (1, 'simone', 'turco', 'sapienza');
insert into studente(matricola, nome, cognome, pass) values (2, 'mario', 'rossi', 'sapienza');
insert into studente(matricola, nome, cognome, pass) values (3, 'nikola', 'krstovic', 'gol');
insert into studente(matricola, nome, cognome, pass) values (4, 'federico', 'baschirotto', 'lecce');
insert into studente(matricola, nome, cognome, pass) values (5, 'wladmiro', 'falcone', 'muro');

insert into corso(nome, cfu) values ('sistemi operativi 1', 6);
insert into corso(nome, cfu) values ('sistemi operativi 2', 6);
insert into corso(nome, cfu) values ('basi di dati 2', 6);
insert into corso(nome, cfu) values ('algoritmi 2', 9);
insert into corso(nome, cfu) values ('anatomia 1', 14);

insert into esame(studente, corso, valutazione) values (1, 'sistemi operativi 1', 18);
insert into esame(studente, corso, valutazione) values (2, 'sistemi operativi 1', 27);
insert into esame(studente, corso, valutazione) values (5, 'sistemi operativi 1', 25);
insert into esame(studente, corso, valutazione) values (1, 'basi di dati 2', 18);
insert into esame(studente, corso, valutazione) values (3, 'basi di dati 2', 28);
insert into esame(studente, corso, valutazione) values (5, 'basi di dati 2', 19);
insert into esame(studente, corso, valutazione) values (2, 'basi di dati 2', 24);
insert into esame(studente, corso, valutazione) values (1, 'algoritmi 2', 18);
insert into esame(studente, corso, valutazione) values (2, 'algoritmi 2', 28);
insert into esame(studente, corso, valutazione) values (3, 'algoritmi 2', 19);
insert into esame(studente, corso, valutazione) values (4, 'algoritmi 2', 30);
insert into esame(studente, corso, valutazione) values (5, 'algoritmi 2', 23);
insert into esame(studente, corso, valutazione) values (1, 'anatomia 1', 18);

insert into indirizzo(studente, citta, via) values (1, 'Roma', 'via nazionale 6');
insert into indirizzo(studente, citta, via) values (2, 'Lecce', 'via del mare 3');
insert into indirizzo(studente, citta, via) values (3, 'Lecce', 'viale romania 7');
insert into indirizzo(studente, citta, via) values (4, 'Milano', 'via rossi 4');
insert into indirizzo(studente, citta, via) values (5, 'Milano', 'via bianchi 77');



