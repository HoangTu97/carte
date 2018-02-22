CREATE SEQUENCE user_id_seq;

CREATE TABLE "User"
(
  id        INTEGER DEFAULT nextval('user_id_seq' :: REGCLASS) NOT NULL
    CONSTRAINT "User_pkey"
    PRIMARY KEY,
  username  VARCHAR(20)                                        NOT NULL,
  password  VARCHAR(20)                                        NOT NULL,
  email     VARCHAR(50),
  firstname VARCHAR(50),
  lastname  VARCHAR(50),
  adress    VARCHAR(250),
  level     BIT
);

CREATE TABLE "Restaurant"
(
  id                SERIAL NOT NULL
    CONSTRAINT restaurant_pkey
    PRIMARY KEY,
  name              VARCHAR(50),
  category_id       INTEGER,
  address           VARCHAR(50),
  telephone         VARCHAR(50),
  email             VARCHAR(50),
  image             XML,
  website           VARCHAR(250),
  details           TEXT,
  meta_title        VARCHAR(50),
  meta_descriptions VARCHAR(250),
  created_date      DATE DEFAULT CURRENT_DATE,
  created_by        INTEGER,
  edited_date       DATE,
  edited_by         INTEGER,
  show_on_home      BIT,
  status            BIT,
  classement        SMALLINT,
  code_postal       INTEGER,
  telephonefax      VARCHAR(50),
  fax               VARCHAR(50),
  tarifmin          DOUBLE PRECISION,
  tarifmax          DOUBLE PRECISION,
  tarifenclair      TEXT,
  facebook          VARCHAR(50),
  type              VARCHAR(50),
  type_detail       VARCHAR(200),
  commune           VARCHAR(50),
  producteur        VARCHAR(50)
);

CREATE TABLE "Horaire"
(
  id           SERIAL NOT NULL
    CONSTRAINT "Horaire_pkey"
    PRIMARY KEY,
  idrestaurant INTEGER,
  date         TEXT,
  open         TEXT,
  close        TEXT
);

CREATE TABLE "Feedback"
(
  id          SERIAL NOT NULL
    CONSTRAINT "Feedback_pkey"
    PRIMARY KEY,
  iduser      INTEGER,
  content     TEXT,
  createddate DATE,
  createdby   INTEGER,
  editeddate  DATE,
  editedby    INTEGER,
  status      BIT
);

CREATE TABLE "Favorite"
(
  id            SERIAL NOT NULL
    CONSTRAINT "Favorite_pkey"
    PRIMARY KEY,
  idrestaurants INTEGER,
  iduser        INTEGER
);

CREATE TABLE "Contact"
(
  id            SERIAL       NOT NULL
    CONSTRAINT "Contact_pkey"
    PRIMARY KEY,
  username      VARCHAR(20)  NOT NULL,
  password      VARCHAR(20)  NOT NULL,
  email         VARCHAR(50),
  firstname     VARCHAR(50),
  lastname      VARCHAR(50),
  adress        VARCHAR(250),
  socialprofile VARCHAR(250) NOT NULL,
  content       TEXT
);

CREATE TABLE "Category"
(
  id               SERIAL NOT NULL
    CONSTRAINT "Category_pkey"
    PRIMARY KEY,
  name             VARCHAR(50),
  idparent         INTEGER,
  img              XML,
  details          TEXT,
  metatitle        VARCHAR(50),
  metadescriptions VARCHAR(250),
  createddate      DATE DEFAULT CURRENT_DATE,
  createdby        INTEGER,
  editeddate       DATE,
  editedby         INTEGER,
  showonhome       BIT
);


DROP TABLE "Category";
DROP TABLE "Contact";
DROP TABLE "Favorite";
DROP TABLE "Feedback";
DROP TABLE "Horaire";
DROP TABLE "Restaurant";
DROP TABLE "User";