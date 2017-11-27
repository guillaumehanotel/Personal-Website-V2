
CREATE TABLE user(
        id        int (11) Auto_increment  NOT NULL ,
        firstname Varchar (255) ,
        lastname  Varchar (255) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE post(
        id      int (11) Auto_increment  NOT NULL ,
        title   Varchar (255) ,
        content Varchar (255) ,
        date    Datetime ,
        id_user Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE comment(
        id      int (11) Auto_increment  NOT NULL ,
        content Varchar (255) ,
        date    Datetime ,
        id_user Int ,
        id_post Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE intro(
        id      int (11) Auto_increment  NOT NULL ,
        titre   Varchar (255) ,
        content Text ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


CREATE TABLE competence(
        id       int (11) Auto_increment  NOT NULL ,
        intitule Varchar (50) ,
        image    Varchar (255) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE experience(
        id          int (11) Auto_increment  NOT NULL ,
        date_debut  Date ,
        date_fin    Date ,
        ville       Varchar (100) ,
        intitule    Varchar (255) ,
        entreprise  Varchar (255) ,
        type        Varchar (100) ,
        description Text ,
        ordre       Int ,
        codepostal  Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE formation(
        id             int (11) Auto_increment  NOT NULL ,
        annee_debut    Date ,
        annee_fin      Date ,
        annee_courante Varchar (25) ,
        intitule       Varchar (100) ,
        ecole          Varchar (255) ,
        ville          Varchar (100) ,
        codepostal     Int ,
        description    Text ,
        lien           Varchar (255) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;



CREATE TABLE realisation(
        id          int (11) Auto_increment  NOT NULL ,
        link        Varchar (255) ,
        titre       Varchar (255) ,
        description Text ,
        image       Varchar (255) ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;

ALTER TABLE post ADD CONSTRAINT FK_post_id_user FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE comment ADD CONSTRAINT FK_comment_id_user FOREIGN KEY (id_user) REFERENCES user(id);
ALTER TABLE comment ADD CONSTRAINT FK_comment_id_post FOREIGN KEY (id_post) REFERENCES post(id);