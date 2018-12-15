--DROP TABLE IF EXISTS Post;
--DROP TABLE IF EXISTS Comment;
--DROP TABLE IF EXISTS Vote;
--DROP TABLE IF EXISTS user;
--DROP TABLE IF EXISTS Category;
--DROP TABLE IF EXISTS SubscribeCategory;
--BEGIN TRANSACTION;

--Table: User
CREATE TABLE user (
    --UserID   INTEGER PRIMARY KEY,
    --Name   TEXT ,
    username VARCHAR PRIMARY KEY,
    password VARCHAR NOT NULL,
    nome TEXT,
    DataNascimento DATE,
    email TEXT

);

--Table: Category
CREATE TABLE Category (
    CategoryName   TEXT PRIMARY KEY 

);

CREATE TABLE SubscribeCategory (
    username TEXT REFERENCES user(username),
    CategoryName  TEXT REFERENCES Category(CategoryName)
);

--Table: Post
CREATE TABLE Post (
    Title VARCHAR,
    Dados VARCHAR,
    postID   INTEGER PRIMARY KEY,
    CategoryName TEXT REFERENCES Category(CategoryName),
    username TEXT REFERENCES user(username),
    up INTEGER,
    down INTEGER
    pDate Date

);


--Table: Comment
CREATE TABLE Comment (
    Dados TEXT,
    CommentID   INTEGER PRIMARY KEY,
    FatherCommentID INTEGER REFERENCES Comment(CommentID),
    PostID INTEGER REFERENCES Post(postID),
    username TEXT REFERENCES user(username),
    up INTEGER,
    down INTEGER

);



--Table: Vote
CREATE TABLE Vote (
    VoteID INTEGER PRIMARY KEY,
    PostID INTEGER REFERENCES Post(postID),
    username INTEGER REFERENCES user(username),
    CommentID INTEGER REFERENCES Comment(CommentID),
    typeVote CHAR NOT NULL


);


INSERT INTO user VALUES('up201606334','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);
INSERT INTO user VALUES('Miguel','$2y$12$0VmGwvHOaFV5rkhm2pcpwuIUM/QGVi5oVXWXOFvPtPhD3gQ3uQZTG', null, null, null);

INSERT INTO Category VALUES('Culinaria');
INSERT INTO Category VALUES('Desporto');
INSERT INTO Category VALUES('Comédia');
INSERT INTO Category VALUES('Saude');
INSERT INTO Category VALUES('Ensino');
INSERT INTO Category VALUES('Música');
INSERT INTO Category VALUES('Arte');
INSERT INTO Category VALUES('História');
INSERT INTO Category VALUES('Politica');
INSERT INTO Category VALUES('Metereologia');
INSERT INTO Category VALUES('Ciencia');
INSERT INTO Category VALUES('Economia');
INSERT INTO Category VALUES('Cinema');
INSERT INTO Category VALUES('Lazer');
INSERT INTO Category VALUES('Literatura');
INSERT INTO Category VALUES('Novas tecnologias');

INSERT INTO SubscribeCategory VALUES('up201606334','culinaria');
INSERT INTO SubscribeCategory VALUES('Miguel','desporto');



INSERT INTO Post VALUES('BLABLABLA','rgrihgirpgrhp \n iejhtoifhpfoe',NULL,'culinaria','up201606334',0,0);

INSERT INTO Post VALUES('BLA','rgVRVRVRVRVBRVfhpfoe',NULL,'desporto','Miguel',0,0);





--COMMIT TRANSACTION;
